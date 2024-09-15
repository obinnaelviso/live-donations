<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $campaigns = Campaign::latest()->get();
        $query = $request->campaign;
        return view('admin.manage-campaigns', compact('campaigns', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new-campaign');
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
        if($request->hasFile('image')) {
            $file_url = $request->file('image')->store('public/campaigns');
            $file_name = str_replace("public/", "", $file_url);
        } else return back()->with('danger', 'Please choose an image');
        $this->user()->campaigns()->create($request->all() + ['featured_image' => $file_name]);
        return back()->with('success', 'New Campaign created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        return view('admin.edit-campaign', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        $this->validator($request->all())->validate();
        if($request->hasFile('image')) {
            Storage::delete('public/'.$campaign->featured_image);
            $file_url = $request->file('image')->store('public/campaigns');
            $campaign->featured_image = str_replace("public/", "", $file_url);
            $campaign->save();
        }
        $campaign->update($request->all());
        return redirect()->route('campaigns.index')->with('success', $campaign->title.' campaign updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        Storage::delete('public/'.$campaign->featured_image);
        $campaign->delete();
        return response('Campaign deleted successfully!', 200);
    }

    protected function validator(array $data)
    {
    	return Validator::make($data, [
    		'title' => 'required',
    		'description' => 'required',
            'target' => 'required|numeric|min:0',
        ]);
    }

    protected function user()
    {
        return Auth::user();
    }
}
