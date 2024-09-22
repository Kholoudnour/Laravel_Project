<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Topic;
use App\Models\Category;

class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::limit(5)->with('latest_topic')->get();
        // dd($categories);
        $topics = Topic::with('category')
                ->latest()
                ->take(3)
                ->get();
        //  dd($topics);
        $featuredtopics = Topic::with('category')
                ->where('trending', true)
                ->limit(2)
                ->get();
                
        $testimonials = Testimonial::where('published', 1)
                ->latest()
                ->take(3)
                ->get();
                
            return view('index', compact('testimonials', 'topics', 'categories', 'featuredtopics'));
        }

    public function testimonials()
    {  
        $testimonials = Testimonial::all(); 
        $testimonials = Testimonial::where('published', 1)
            ->latest()
            ->take('3')
            ->get();
        return view('testimonials', compact('testimonials'));
    }

    public function topicslisting()
    {
        $topics = Topic::paginate(4);
        $trendingtopics = Topic::orderBy('trending')->limit(2)->get();
        return view('topics-listing',compact('topics', 'trendingtopics'));
    }

    public function category()
    {
        return view('category');
    }


    public function topicsdetail($id)
    {
        $topic = Topic::findOrFail($id);
        $topics = Topic::all() ;   
        // dd($topic);   
        $categories = Category::all();
        
        return view('topics-detail',compact('topics', 'categories', 'topic'));
    }

    public function contact()
    {
        return view('contact');
    }

    /**
     *
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

