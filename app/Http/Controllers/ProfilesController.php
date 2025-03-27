<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Policies\ProfilePolicy;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfilesController extends Controller
{
    public function show(User $user){

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id, 
            now()->addSeconds(30), 
            function () use ($user) {
                return $user->posts->count();
        });
        
        $followersCount = Cache::remember(
            'count.followers.' . $user->id, 
            now()->addSeconds(30), 
            function () use ($user) {
                return $user->profile->followers->count();
        });
        
        
        $followingCount = Cache::remember(
            'count.following.' . $user->id, 
            now()->addSeconds(30), 
            function () use ($user) {
                return $user->following->count();
        });
        
        
        
        return view('profiles.show', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
        
    }

    public function edit(User $user){

        Gate::authorize('update', $user->profile);
        
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user){

        Gate::authorize('update', $user->profile);

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);
        

        if ($request->image){
            $imagePath = $request->image->store('profile', 'public');
 
            $manager = new ImageManager(Driver::class);
            $image = $manager->read(public_path("storage/{$imagePath}"));

            $image->cover(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath ];
        }
        $user->profile()->update(array_merge(
            $validated,
            $imageArray ?? []
        ));

        

        return redirect(route('profiles.show',[
            'user' => $user,
        ] ));
    }


}
