<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\HasAccountData;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{
    use HasAccountData;

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request, TransactionService $service): Response
    {
        return Inertia::render('Main/Main',
            [
                'account' => $this->getAccount(),
                'transactions' => $this->getTransactions(),
            ]
        );
    }
}
