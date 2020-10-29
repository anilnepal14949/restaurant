<?php

namespace App\Repositories;

use App\Customer;

class CustomerRepository implements CustomerRepositoryInterface {

    public function all() {
        // return Customer::with('user')->orderBy('name')
        //     ->where('active', 1)
        //     ->get()
        //     ->map(function($customer) {
        //         return $customer->format();
        //     });

        return Customer::with('user')->orderBy('name')
            ->where('active', 1)
            ->get()
            ->map->format();
    }

    public function findById($customerId) {
        return Customer::where('id', $customerId)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail()
            ->format();
    }

    public function updateById($customerId) {
        $customer = Customer::where('id', $customerId)->firstOrFail();

        $customer->update(request()->only('name'));
    }

    public function deleteById($customerId) {
        $customer = Customer::find($customerId)->delete();
    }
}
