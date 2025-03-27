<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class PostsController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function browse(){
        $posts = Post::all()->sortByDesc('created_at');
        return view('posts.index', ['posts'=> $posts]);
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->latest()->paginate(5);
        
        return view('dashboard' ,['posts'=> $posts]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = $request->image->store('uploads', 'public');
 
        $manager = new ImageManager(Driver::class);
        $image = $manager->read(public_path("storage/{$imagePath}"));
        

        $image->cover(1200, 1200);
        $image->save();


        $request->user()->posts()->create([
            'caption' => $validated['caption'],
            'image' => $imagePath,
        ]);

        return redirect('profiles/' . $request->user()->id);

    }

    public function show(Post $post){
       $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false; 
       return view('posts.show', compact('post' , 'follows'));
    }

    public function destroy(Post $post, ){
        Gate::authorize('delete', $post);
        $post->delete();
        return redirect('profiles/' . auth()->user()->id);
    }
}
