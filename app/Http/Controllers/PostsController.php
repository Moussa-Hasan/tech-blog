<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(6);
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = [
            'general',
            'programming',
            'web-development',
            'mobile-development',
            'data-science',
            'machine-learning',
            'artificial-intelligence',
            'hardware',
            'cybersecurity',
            'networking',
            'cloud-computing',
            'blockchain',
            'robotics',
            'ui-ux',
            'virtual-reality',
            'augmented-reality',
            'iot',
            'big-data',
            'nanotechnology'
        ];

        return view('blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'category' => 'required',
        ], [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'image.required' => 'Please upload an image.',
            'image.mimes' => 'The image must be a file of type: jpg, png, jpeg.',
            'image.max' => 'The image may not be greater than 5 MB in size.',
            'category.required' => 'Please select a category.',
        ]);

        // Generate the initial slug
        $slug = Str::slug($request->title, '-');

        // Check if the slug already exists in the database
        if (Post::where('slug', $slug)->exists()) {
            // Modify it if exists
            $suffix = 1;
            while (Post::where('slug', $slug)->exists()) {
                $slug = Str::slug($request->title, '-') . '-' . $suffix;
                $suffix++;
            }
        }

        $newImageName = uniqid() . '-' . $slug . '-' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'image_path' => $newImageName,
            'category' => $request->input('category'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Post created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return view('blog.show')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $categories = [
            'general',
            'programming',
            'web-development',
            'mobile-development',
            'data-science',
            'machine-learning',
            'artificial-intelligence',
            'hardware',
            'cybersecurity',
            'networking',
            'cloud-computing',
            'blockchain',
            'robotics',
            'ui-ux',
            'virtual-reality',
            'augmented-reality',
            'iot',
            'big-data',
            'nanotechnology'
        ];

        $post = Post::where('slug', $slug)->first();
        return view('blog.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048',
            'category' => 'required',
        ], [
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'image.required' => 'Please upload an image.',
            'image.mimes' => 'The image must be a file of type: jpg, png, jpeg.',
            'image.max' => 'The image may not be greater than 5 MB in size.',
            'category.required' => 'Please select a category.',
        ]);

        $newImageName = null;

        if ($request->hasFile('image')) {
            $newImageName = uniqid() . '-' . $slug . '-' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        }

        $postData = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'category' => $request->input('category'),
            'user_id' => auth()->user()->id
        ];

        if ($newImageName !== null) {
            $postData['image_path'] = $newImageName;
        }

        Post::where('slug', $slug)
            ->update($postData);

        return redirect('/blog/' . $slug)->with('message', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        Post::where('slug', $slug)->delete();

        return redirect('/blog')->with('message', 'Delete Success');
    }
}
