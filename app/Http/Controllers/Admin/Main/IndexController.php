<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data["users"] = User::all();
        $data["posts"] = Post::all();
        $data["categories"] = Category::all();
        $data["tags"] = Tag::all();
        return view('admin.main.index', compact('data'));
    }
}
