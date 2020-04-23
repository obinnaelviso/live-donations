<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Carousel::all();
        return view('admin.carousels', compact('slides'));
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
        if($request->hasFile('img')) {
            $file_url = $request->file('img')->store('public/slideshow');
            $file_name = str_replace("public/", "", $file_url);
        } else return back()->with('danger', 'Please choose an image');
        Carousel::create($request->all() + ['image' => $file_name]);
        return back()->with('success', 'Slide added to slideshow successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $slideshow)
    {
        Storage::delete('public/'.$slideshow->image);
        $slideshow->delete();
        return response('Slide removed from slideshow successfully!', 200);
    }

    protected function validator(array $data)
    {
    	return Validator::make($data, [
    		'title' => 'required|max:200',
    		'description' => 'max:200',
    		'img' => 'required',
        ]);
    }
}
