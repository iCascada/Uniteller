<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\HasAccountData;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TransactionController extends Controller
{
    use HasAccountData;

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return Inertia::render('Transaction/Transaction', [
            'transactions' => $this->getTransactions(INF, ['created_at', 'desc']),
        ]);
    }
}
