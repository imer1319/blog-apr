<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PhotosController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(),[
            'photo' => 'required|image|max:2048'
        ]);
        $photo = request()->file('photo');
    }
}
