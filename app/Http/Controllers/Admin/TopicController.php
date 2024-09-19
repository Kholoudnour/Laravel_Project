<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;

use App\Traits\Uploadfiletrait;

class TopicController extends Controller
{
    use UploadFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $categories = Category::with('topics')->get();

        // return view('topics.index', compact('categories'));
        $topics = topic::all();
            return view('admin.topic',  compact('topics'));
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
            $categories = Category::get();
            return view('admin.Add_topic', compact('categories')) ;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'trending' => 'nullable|boolean',
            'published' => 'nullable|boolean',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id' => 'nullable|exists:categories,id',
          
        ]);
            $data['image'] = $this->uploadFile($request->image, 'admin/assests/images/topics');
            $data['trending'] = $request->has('trending');
            $data['published'] = $request->has('published');
            Topic::create($data);
            return redirect()->route('topic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::findOrFail($id);
        return view('admin.topic_show', compact('topic')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {          
        $categories = Category::get();
        // $categories = Category::select('id', 'name')->get();
        $topic = Topic::findOrFail($id);
        return view('admin.edit_topic', compact('topic', 'categories', ));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'trending' => 'nullable|boolean',
            'published' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'admin/assests/images/topics');
            }
        $data['published'] = isset($request->published);
        Topic::where('id', $id)->update($data);
        return redirect()->route('topic.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        Topic::where('id', $id)->delete(); 
        return redirect()->route('topic.index'); 
    }

}
