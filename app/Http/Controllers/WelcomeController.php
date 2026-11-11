<?php

namespace App\Http\Controllers;

use App\Models\Post;

class WelcomeController extends Controller
{
    public function index()
    {
        $post = Post::with('author')->latest()->first();

        return view('welcome', compact('post'));
    }
}