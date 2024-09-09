<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\UploadFileTrait;


class TestimonialController extends Controller
{
    use UploadFileTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.testimonials');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function testimonial()
    {   
        return view('testimonial', compact('tests'));
    }
    public function create()
    {
        return view('admin.add_testimonial'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('testimonials.index');    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.edit_testimonial');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('testimonials.index');    }
}
