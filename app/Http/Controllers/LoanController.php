<?php

namespace App\Http\Controllers;

use App\Http\Requests\CashLoanRequest;
use App\Http\Requests\HomeLoanRequest;
use App\Models\CashLoanProduct;
use App\Models\HomeLoanProduct;

class LoanController extends Controller
{
    /**
     * Update or create a new home loan product for the given client.
     *
     * @param HomeLoanRequest $request
     * @param int $clientId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOrCreateHome(HomeLoanRequest $request, int $clientId)
    {
        HomeLoanProduct::updateOrCreate(
            ['client_id' => $clientId, 'adviser_id' => auth()->user()->id],
            $request->all()
        );
        return redirect('client/' . $clientId . '/edit')
            ->with('homeloan', 'Home Loan Product saved successfully!');
    }

    /**
     * Update or create a new cash loan product for the given client.
     *
     * @param CashLoanRequest $request
     * @param int $clientId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOrCreateCash(CashLoanRequest $request, int $clientId)
    {
        CashLoanProduct::updateOrCreate(
            ['client_id' => $clientId, 'adviser_id' => auth()->user()->id],
            $request->all()
        );
        return redirect('client/' . $clientId . '/edit')
            ->with('cashloan', 'Cash Loan Product saved successfully!');
    }
    
}
