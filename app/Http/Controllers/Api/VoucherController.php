<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function checkValidity(Request $request, int $id)
    {
        $voucher = Voucher::find($id);

        if (!$voucher) {
            return response(null, 404);
        }

        return response()->json([
           'success' => true,
           'data' => [
               'is_valid' => $voucher->isValid,
           ],
        ]);
    }
}
