<x-app-layout>

<div class="max-w-md mx-auto mt-10">
    <form method="POST" enctype="multipart/form-data" action="{{route('posts.store')}}">
    <h1 class="font-bold text-xl">Add New Post</h1>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="caption" :value="__('Post Caption')" />
            <x-text-input id="caption" class="block mt-1 w-full" type="text" name="caption" :value="old('caption')"  autofocus autocomplete="caption" />
            <x-input-error :messages="$errors->get('caption')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="image" :value="__('Post Image')" class="mt-4" />
            <input type="file" id="image" name="image" >
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mt-4">
  Add new post
</button>

       
    </form>
    </div> 

  
</x-app-layout>