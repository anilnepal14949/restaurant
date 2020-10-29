<?php

namespace App\Repositories;

interface CustomerRepositoryInterface {
    public function all();

    public function findById($customerId);

    public function updateById($customerId);

    public function deleteById($customerId);
}
