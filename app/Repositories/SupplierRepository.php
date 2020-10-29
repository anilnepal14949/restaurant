<?php

namespace App\Repositories;

use App\Supplier;

class SupplierRepository implements SupplierRepositoryInterface {

    public function all() {
        return Supplier::with('customer')
        ->get()
        ->map
        ->format();
    }

    public function findById($supplierId) {
        return Supplier::with('customer')
        ->findOrFail($supplierId)
        ->format();
    }

    public function updateById($supplierId) {
        return Supplier::findOrFail($supplierId)
            ->update(request()->only('supplier_name'));
    }

    public function deleteById($supplierId) {
        return Supplier::findOrFail($supplierId)
            ->delete();
    }
}
