<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::with("category")->get();
        $categories = Category::all();
        return view('admin.posts.index', compact('posts', 'categories'));    ;
    }
}
