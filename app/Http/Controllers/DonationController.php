<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $campaigns = Campaign::latest()->get();
        $donations = Donation::latest()->get();
        $query = $request->campaign;
        return view('admin.donations', compact('campaigns', 'donations', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        Donation::create($request->all());
        return response('New Donation created successfully!', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return response('Donation deleted successfully!', 200);
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
