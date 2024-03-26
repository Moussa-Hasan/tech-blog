<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            $posts = Post::paginate(6);
        } else {
            $posts = Post::where('title', 'like', "%$query%")->paginate(6);
            // Highlight search keywords in the search results
            $posts->getCollection()->transform(function ($post) use ($query) {
                $post->title = preg_replace("/($query)/i", "<mark>$1</mark>", $post->title);
                return $post;
            });
        }

        return view('blog.search', compact('posts', 'query'));
    }
}
