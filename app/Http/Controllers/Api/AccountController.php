<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\HasAccountData;
use App\Services\TransactionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    use HasAccountData;

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request, TransactionService $service)
    {
        return response()->json(
            [
                'account' => $this->getAccount(),
                'transactions' => $this->getTransactions(),
            ]
        );
    }
}
