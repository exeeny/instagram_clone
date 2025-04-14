<x-app-layout>



    <div>
        @foreach($posts as $post)
        <div class="container mx-auto max-w-xl dark:bg-gray-700 dark:text-white m-2 border bg-gray-200 rounded-sm ">
            <div class="">
                <a href="/profiles/{{$post->user->id}}"><img src="/storage/{{$post->image}}" alt="" class="p-2"></a>
                <div class="p-2">
                    
                <p class="mt-2"><span class="mr-2 font-medium"><a href="/profiles/{{$post->user->id}}">{{$post->user->username}}</a></span>{{$post->caption}}</p>
                </div>
            </div>


        </div>

        @endforeach
        <div class='max-w-2xl mx-auto m-2'>
            {{$posts->links()}}
        </div>
        
    </div>
</x-app-layout>
