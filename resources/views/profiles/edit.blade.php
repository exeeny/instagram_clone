<x-app-layout>

<div class="max-w-md mx-auto mt-10">
    <form method="POST" enctype="multipart/form-data" action="/profiles/{{$user->id}}">
    <h1 class="font-bold text-xl dark:text-white">Edit profile</h1>
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
            <input class='dark:text-white dark:bg-gray-800 dark:border-gray-600'  type="file" id="image" name="image" >
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 mt-3">
<span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent">
Save changes
</span>
</button>

       
    </form>
    </div> 

</x-app-layout>
