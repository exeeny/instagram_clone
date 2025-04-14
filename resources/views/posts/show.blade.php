<x-app-layout>

    <div class="container mx-auto max-w-4xl shadow-md m-8 dark:bg-gray-700 dark:text-white">
        <div class="grid grid-cols-2">
            <img src="/storage/{{$post->image}}" alt="" class="p-2">
            <div class="p-2">
                <div class="flex place-items-center gap-3">
                    <img src="{{$post->user->profile->profile_image()}}" alt="" class="rounded-full w-10 h-10">
                    <p class=" font-medium"><a href="/profiles/{{$post->user->id}}">{{$post->user->username}}</a></p>


                    @if(Auth::check())
                        @if(Auth::user()->id != $post->user->id)

                        |<div x-data="fetchData({{$post->user->id}}, {{$follows}})">
                            <button @click="followUser"><span x-text="follows ? 'unfollow' : 'follow'"> </span></button>
                        </div>
                        @endif
                    @endif

                    @can('delete', $post)
                        <form action="/post/{{$post->id}}" method="post" class="ml-auto">
                            @csrf
                            @method('DELETE')
                            <button>delete</button>
                        </form>
                    @endcan
                </div>


                <p class="mt-2"><span class="mr-2 font-medium"><a href="/profiles/{{$post->user->id}}">{{$post->user->username}}</a></span>{{$post->caption}}</p>
            </div>
        </div>


    </div>

</x-app-layout>
