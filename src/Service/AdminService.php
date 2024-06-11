<?php
// src/Service/AdminService.php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

class AdminService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}
