<x-app-layout>
    <div class="container mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4 mt-8">
        @foreach($posts as $post)
            <div>
            <a href="/post/ {{$post->id}}">
                <img class="h-auto max-w-full rounded-lg" src="/storage/{{$post->image}}" alt="{{$post->caption}}">
            </a>
            
        </div>
        @endforeach
    </div>
</x-app-layout>
