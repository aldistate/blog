<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index() {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('user')) {
            $user = User::firstWhere('slug', request('user'));
            $title = ' By: ' . $user->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => "post",
            "posts" => Post::latest()->Fillter(request(['search', 'category', 'user']))->paginate(7)->withQueryString(),
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            "title" => "Post",
            "active" => "post",
            "post" => $post,
        ]);
    }
}
