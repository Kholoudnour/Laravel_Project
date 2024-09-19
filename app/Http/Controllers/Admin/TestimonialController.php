<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

use App\Traits\UploadFileTrait;


class TestimonialController extends Controller
{
    use UploadFileTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all(); 
        return view('admin.testimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function testimonial()
    {   
        return view('testimonial', compact('testimonials'));
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
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'published' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data['image'] = $this->uploadFile($request->image, 'admin/assests/images/testimonials');

        Testimonial::create($data);
        return redirect()->route('testimonials.index');
    }
    
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.edit_testimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'published' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    if ($request->hasFile('image')) {
        $data['image'] = $this->uploadFile($request->image,'admin/assests/images/testimonials');
    }
         Testimonial::where('id', $id)->update($data);  
         return redirect()->route('testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->delete(); 
        return redirect()->route('testimonials.index'); 
    }
}
