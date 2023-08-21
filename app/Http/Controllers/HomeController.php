<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Auditor;
use App\Models\Bank;
use App\Models\Banker;
use App\Models\Company;
use App\Models\ConfirmationRequest;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Administrator::where('id', auth()->id())->first();
        $number_of_companies = Company::count();
        $number_of_unverified_companies = Company::where('is_verified', 0)->count();
        $number_of_users = Auditor::count();
        $number_of_banks = Bank::count();
        $number_of_unverified_banks = Bank::where('is_verified', 0)->count();
        $number_of_bankers = Banker::count();
        $number_of_requests = ConfirmationRequest::count();
        $number_of_pending_request = ConfirmationRequest::where('confirmation_status', 0)->count();
        $number_of_completed_request = ConfirmationRequest::where('confirmation_status', 1)->count();
        return view('home', compact('user', 'number_of_companies', 'number_of_unverified_companies', 'number_of_users', 'number_of_banks', 'number_of_bankers', 'number_of_requests', 'number_of_pending_request', 'number_of_completed_request', 'number_of_unverified_banks' ));
    }
}
