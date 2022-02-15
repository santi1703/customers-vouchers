<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function fetch(Request $request, int $id)
    {
        $customer = Customer::with('vouchers')->find($id);

        if (!$customer) {
            return response(null, 404);
        }

        return response()->json([
            'data' => $customer,
        ]);
    }
}
