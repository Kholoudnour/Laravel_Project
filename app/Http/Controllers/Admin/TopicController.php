<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\UploadFileTrait;

class TopicController extends Controller
{
    use UploadFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            // dd(config('view.paths'));
           return view('admin.topic');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
            // $categories = Category::get();
            // $page = "Add Job";
            // $current_user_fullname = "Engy";
            return view('admin.Add_topic') ;
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // {
        //     $data = $request->validate([
        //         'title' => 'required|string|max:255',
        //         'location' => 'required|string|max:255',
        //         'company_name' => 'required|string|max:255',
        //         'job_nature' => 'required|string',
        //         'Vacancy' => 'required|integer|max:255',
        //         'description' => 'required|string|max:1000',
        //         'min_salary' => 'nullable|numeric',
        //         'max_salary' => 'nullable|numeric',
        //         // 'salary' => 'required|numeric',
        //         'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //         'category_id' => 'required|exists:categories,id',
        //     ]);
        //     $data['published'] = isset($request->published);
        //     $data['img'] = $this->uploadFile($request->img, 'assets/img/job/');
    
        //     Job::create($data);
        //     // return redirect()->route('jobs');
        //     return redirect()->route('jobs.index');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // {
        //     // $job = Job::findOrFail($id);
         return view('topic_details');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // {
        //     $job = Job::findOrFail($id);
        //     $categories = Category::select('id', 'name')->get();
        //     $page = "Add Category";
        //     $current_user_fullname = "Engy";
            return view('admin.Edit_topic');
        //     // $categories = Category::all();
    
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // {
        //     $data = $request->validate([
        //         'title' => 'required|string|max:255',
        //         'location' => 'required|string|max:255',
        //         'company_name' => 'required|string|max:255',
        //         'job_nature' => 'required|string',
        //         'Vacancy' => 'required|integer|max:255',
        //         'description' => 'required|string|max:1000',
        //         'min_salary' => 'nullable|numeric',
        //         'max_salary' => 'nullable|numeric',
        //         // 'salary' => 'required|numeric',
        //         'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //         'category_id' => 'required|exists:categories,id',
        //     ]);
        //     $data['published'] = isset($request->published);
    
        //     ///
        //     if ($request->hasFile('img')) {
        //         $data['img'] = $this->uploadFile($request->img, 'assets/img/job/');
        //     }
        //     Job::where('id', $id)->update($data);
    
        //     return redirect()->route('jobs.index');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // {
        //     Job::where('id', $id)->delete();
        //     return redirect()->route('jobs.index');
        // }
    }
}
