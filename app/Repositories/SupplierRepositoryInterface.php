<?php

namespace App\Repositories;

interface SupplierRepositoryInterface {
    public function all();

    public function findById($supplierId);

    public function updateById($supplierId);

    public function deleteById($supplierId);
}
