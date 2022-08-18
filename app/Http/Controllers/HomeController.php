<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    public function profit_calculation()
    {
        $today_transactions = Transaction::where(['transaction_type' => 'foreign'])->whereDate('created_at',  \Carbon\Carbon::today())->where('transactoion_with','>',0);
        $week_transactions = Transaction::where(['transaction_type' => 'foreign'])->whereBetween('created_at' , [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->where('transactoion_with','>',0);
        $monthly_transactions = Transaction::where(['transaction_type' => 'foreign'])->whereMonth('created_at', \Carbon\Carbon::now()->month)->where('transactoion_with','>',0);
        return view('pages.profit-calculation', compact('today_transactions', 'week_transactions', 'monthly_transactions'));
    }
}
