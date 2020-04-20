<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index() {
        $featured_campaigns = Campaign::where('status', 'open')->where('is_featured', 1)->latest()->paginate(6);
        $random_campaigns = Campaign::where('status', 'open')->paginate(6)->shuffle();
        $closed_campaigns = Campaign::where('status', 'closed')->count();
        $donations = Donation::orderBy('amount', 'desc')->get();
        return view('index', compact('featured_campaigns', 'random_campaigns', 'donations', 'closed_campaigns'));
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }

    public function donate() {
        $campaigns = Campaign::where('status', 'open')->latest()->get();
        return view('donate', compact('campaigns'));
    }

    public function makeDonation(Campaign $campaign) {
        return view('make-donation', compact('campaign'));
    }

    public function processDonation(Campaign $campaign, Request $request)
    {
        $this->validator($request->all() + ['campaign_id' => $campaign->id])->validate();
        Donation::create($request->all() + ['campaign_id' => $campaign->id]);
        return redirect()->route('make-donation', $campaign->id)->with('success', 'Your Donation is being processed! Please chat with our customer care representative using the button below to receive your secure payment link and make payment!');
    }

    protected function validator(array $data)
    {
    	return Validator::make($data, [
    		'firstname' => 'required',
    		'lastname' => 'required',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:0',
            'campaign_id' => 'required',
        ], ['campaign_id.required' => 'A campaign needs to be selected.']);
    }
}
