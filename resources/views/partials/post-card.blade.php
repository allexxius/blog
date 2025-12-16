<div class="card bg-base-300 shadow-sm">
    {{-- <figure>
        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
            alt="Shoes" />
    </figure> --}}
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>

        @isset($full)
            <p>{!! $post->displayBody !!}</p>
        @else
            <p>{{ $post->snippet }}</p>
        @endisset

        <p class="text-base-content/50">{{ $post->user->name }}</p>
        <p class="text-base-content/50">{{ $post->created_at->diffForHumans() }}</p>
        <p class="text-base-content/50"><b>Comments: </b>{{ $post->comments()->count() }}</p>

        <div class="card-actions justify-end">
            @if(!isset($full))
                <a href="/post/{{ $post->id }}" class="btn btn-primary">Read More</a>
            @endif
        </div>

        {{-- Comments Section: only show when full post --}}
        @isset($full)
            <hr class="my-4 border-gray-400/20">

            <h3 class="text-lg font-semibold mb-2">Comments</h3>

            @auth
                <form action="{{ route('comments.store', $post) }}" method="POST" class="mb-4">
                    @csrf
                    <textarea name="body" class="textarea w-full" placeholder="Add a comment..." required></textarea>
                    @error('body')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
                </form>
            @else
                <p class="text-sm text-base-content mb-4">
                    Please <a href="{{ route('login') }}" class="link">log in</a> to comment.
                </p>
            @endauth

            <div class="space-y-4">
                @foreach($post->comments()->latest()->get() as $comment)
                    <div class="border p-4 rounded-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-semibold">{{ $comment->user->name }}</p>
                                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                            @can('delete', $comment)
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-error">Delete</button>
                                </form>
                            @endcan
                        </div>
                        <p class="mt-2">{{ $comment->body }}</p>
                    </div>
                @endforeach
            </div>
        @endisset
    </div>
</div>
