<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(),[
            'photo' => 'required|image|max:2048'
        ]);
        $photo = request()->file('photo')->store('public');

        Photo::create([
            'url' => Storage::url($photo),
            'post_id' => $post->id
        ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();
        $photoPath = Str::replace('storage', 'public', $photo->url);
        Storage::delete($photoPath);
        return back()->with('flash', 'Foto eliminada');
    }
}
