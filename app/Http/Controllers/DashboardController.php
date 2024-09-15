<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Partner;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
        $total_campaigns = Campaign::all()->count();
        $open_campaigns = Campaign::where('status', 'open')->count();
        $closed_campaigns = Campaign::where('status', 'closed')->count();
        $total_partners = Partner::all()->count();
        $donations = Donation::orderBy('amount', 'desc')->get();
        return view('admin.home', compact('total_campaigns', 'open_campaigns', 'closed_campaigns', 'total_partners', 'donations'));
    }
}
