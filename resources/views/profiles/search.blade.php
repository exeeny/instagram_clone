<x-app-layout>
    <div class="dark:bg-gray-700 dark:text-white bg-white">
        @foreach($users as $user)
            <div class='flex place-items-center gap-3 mb-2'>
                <img src="{{$user->profile->profile_image()}}" alt="" class="rounded-full w-10 h-10">
                <a href="/profiles/{{$user->id}}">{{$user->username}}</a>
            </div>
            
        @endforeach

        {{ $users->links() }}
    </div>

    
</x-app-layout>