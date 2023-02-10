<?php

namespace App\Http\Controllers;

use App\Models\CashLoanProduct;
use App\Models\HomeLoanProduct;

class ReportController extends Controller
{
    /**
     * Show the reports view with a list of loans.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cashLoan = CashLoanProduct::whereAdviserId(auth()->user()->id)->get();
        $homeLoan = HomeLoanProduct::whereAdviserId(auth()->user()->id)->get();
        $data = $cashLoan->concat($homeLoan);
        return view('reports', ['loans' => $data->sortByDesc('created_at')]);
    }
}
