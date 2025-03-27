<x-app-layout>

<div class="max-w-md mx-auto mt-10">
    <form method="POST" enctype="multipart/form-data" action="/profiles/{{$user->id}}">
    <h1 class="font-bold text-xl">Edit profile</h1>
        @csrf
        @method('PATCH')

        <!-- title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ?? $user->profile->title"  autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- description -->
        <div class="mt-2">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description') ?? $user->profile->description"  autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- url -->
        <div class="mt-2">
            <x-input-label for="url" :value="__('Url')" />
            <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url') ?? $user->profile->url"  autofocus autocomplete="url" />
            <x-input-error :messages="$errors->get('url')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="image" :value="__('Profile Image')" class="mt-4" />
            <input type="file" id="image" name="image" >
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mt-4">
  Save Profile
</button>

       
    </form>
    </div> 

</x-app-layout>
