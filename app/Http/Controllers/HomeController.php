<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Carousel;
use App\Donation;
use App\Partner;
use App\Setting;
use App\MailingList;
use App\ContactForm;
use App\Mail\ContactUs;
use App\Mail\ContactUsCallBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index() {
        $featured_campaigns = Campaign::where('status', 'open')->where('is_featured', 1)->latest()->paginate(6);
        $random_campaigns = Campaign::where('status', 'open')->paginate(6)->shuffle();
        $closed_campaigns = Campaign::where('status', 'closed')->count();
        $partners = Partner::all();
        $donations = Donation::orderBy('amount', 'desc')->get();

        $homepage_settings = Setting::where('key', 'home')->first();
        if($homepage_settings)
            $homepage = json_decode($homepage_settings->value, true);
        else
            $homepage = [];

        $about_settings = Setting::where('key', 'about')->first();
        if($about_settings)
            $about = json_decode($about_settings->value, true);
        else
            $about = [];

        $slideshow = Carousel::all();
        return view('index', compact('featured_campaigns', 'random_campaigns', 'donations', 'closed_campaigns', 'partners', 'homepage', 'about', 'slideshow'));
    }

    public function about() {
        $about_settings = Setting::where('key', 'about')->first();
        if($about_settings)
            $about = json_decode($about_settings->value, true);
        else
            $about = [];
        return view('about', compact('about'));
    }

    public function contact() {
        $about_settings = Setting::where('key', 'about')->first();
        if($about_settings)
            $about = json_decode($about_settings->value, true);
        else
            $about = [];
        return view('contact', compact('about'));
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

    public function send_mail(Request $request) {
        $this->validate_contact($request->all())->validate();
        $mailing_list = MailingList::where('email', $request->email)->first();
        if(!$mailing_list) {
            // Mail::to($request->email)->send(new ContactUs($request));
            // Mail::to('info@royalimperialbank.com')->send(new ContactUsCallBack($request));
            $new_mailing_list = MailingList::create($request->all());
            $new_mailing_list->forms()->create($request->all());
        } else {
            // Mail::to($request->email)->send(new ContactUs($request));
            // Mail::to(config('mail.from.address'))->send(new ContactUsCallBack($request));
            $mailing_list->forms()->create($request->all());
        }
        return back()->with('success', "We've received your message, and we'll kindly get back to you shortly");
    }

    protected function validate_contact(array $data)
    {
    	return Validator::make($data, [
    		'name' => 'required',
    		'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
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
