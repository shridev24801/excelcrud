<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class CustomersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

         // Check if the email already exists
         $existingCustomer = Customer::where('email', $row['email'])->first();

         if ($existingCustomer) {
             // Log or handle the duplicate entry case
             Log::info('Duplicate entry found: ' . $row['email']);
             return null; // Skip this row
         }

        return new Customer([
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
        ]);
    }

   
}
