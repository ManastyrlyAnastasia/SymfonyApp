<?php

namespace App\Controller;

use App\Entity\ReportHistory;
use App\Repository\ReportRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Enqueue\RdKafka\RdKafkaConnectionFactory;

#[Route('/admin/report', name: 'report_')]
class ReportController extends AbstractController
{
    private $reportRepository;
    private $context;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    #[Route('/', name: 'index')]
    public function index(EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $reportHistory = $entityManager->getRepository(ReportHistory::class)->findAll();
        $reports = $this->reportRepository->findAll();
        $users = $this->reportRepository->findAll();
        $logger->info('Report History:', ['data' => $reportHistory]);

        return $this->render('report/index.html.twig', [
            'reportHistory' => $reportHistory,
            'reports' => $reports,
        ]);
    }

    private function sendMessageToKafka(array $students): void
    {
        $queue = $this->context->createQueue('student_report');
        $message = $this->context->createMessage(json_encode($students));

        $producer = $this->context->createProducer();
        $producer->send($queue, $message);
    }

    private function receiveMessageFromKafka(): string
    {
        $queue = $this->context->createQueue('student_report');
        $consumer = $this->context->createConsumer($queue);

        $message = $consumer->receive(1000);

        if ($message) {
            $consumer->acknowledge($message);

            return 'Отчет о студентах: ' . $message->getBody();
        }
        return 'Отчет не найден.';
    }
    // #[Route('/download/{id}', name: 'report_download')]
// public function download(int $id, EntityManagerInterface $entityManager): Response
// {
    
//     $reportHistory = $entityManager->getRepository(ReportHistory::class)->find($id);

//     if (!$reportHistory) {
//         throw $this->createNotFoundException('The report does not exist');
//     }

//     $filePath = './download_repors' . $reportHistory->getFilename();
    
//     return $this->file($filePath);
// }

#[Route('/delete/{id}', name: 'report_delete')]
public function delete(int $id, EntityManagerInterface $entityManager): Response
{
   
    $reportHistory = $entityManager->getRepository(ReportHistory::class)->find($id);

    if ($reportHistory) {
        $entityManager->remove($reportHistory);
        $entityManager->flush();
    }

    return $this->redirectToRoute('report_index');
}

}
