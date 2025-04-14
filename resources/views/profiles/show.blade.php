<x-app-layout>

    <div class="container max-w-xl mx-auto m-4 shadow-md p-4 dark:bg-gray-700 dark:text-white">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <img src="{{$user->profile->profile_image()}}" alt="" class="rounded-full w-20 h-20">
            </div>

            <div class="col-span-2">
                <div class="flex justify-between items-baseline">
                    <h1 class="text-xl">{{$user->username}}</h1>

                    @if(Auth::check())
                    @if(Auth::user()->id != $user->id && Auth::check())
                    <div x-data="fetchData({{$user->id}}, {{$follows}})">
                        <button @click="followUser"><span x-text="follows ? 'unfollow' : 'follow'"> </span></button>
                    </div>
                    @endif
                    @endif

                    @can('update', $user->profile)
                    <a href="{{route('posts.create')}}">add new post</a>
                    @endcan
                </div>
                @can('update', $user->profile)
                <a href="/profiles/{{$user->id}}/edit">edit profile</a>
                @endcan

                <div class="flex">
                    <div class="pr-5"><strong>{{$postCount}}</strong> posts</div>
                    <div class="pr-5"><strong></strong> {{$followersCount}} followers</div>
                    <div class="pr-5"><strong></strong> {{$followingCount}} following</div>
                </div>


            </div>

            <div class="flex flex-col">
                <div class="font-medium">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="#">{{ $user->profile->url }}</a></div>

            </div>

        </div>
    </div>


    <div class="container mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4 mt-8">
            @foreach($user->posts as $post)
            <div>
                <a href="/post/ {{$post->id}}">
                    <img class="h-auto max-w-full rounded-lg" src="/storage/{{$post->image}}" alt="{{$post->caption}}">
                </a>

            </div>
            @endforeach
        </div>

    </div>








</x-app-layout>
