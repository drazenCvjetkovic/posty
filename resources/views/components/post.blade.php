

@props(['post' => $post])

<div class="mb-4">
    <a href="{{route('users.post',$post->user)}}" class="font-bold">{{$post->user->username}}</a>
    <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
    <p class="mb-2">{{$post->body}}</p>
</div>


@can('delete',$post)
    <div>
        {{--                        delete post only if belongs to Us--}}
        <form action="{{route('posts.destroy',$post)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>

        </form>
    </div>
@endcan

{{--                    like / unlike--}}

<div class="flex items-center">
    @if(!$post->likedBy(auth()->user()))
        <form action="{{route('posts.likes',$post) }}" method="post" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>
    @else
        <form action="{{route('posts.likes',$post) }}" method="post" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Unlike</button>
        </form>
    @endif

    <span>{{$post->likes->count()}} {{Str::plural('like',$post->likes->count())}}</span>
</div>