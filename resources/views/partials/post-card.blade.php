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
        <div class="card-actions justify-end">
            @if(!isset($full))
                <a href="/post/{{ $post->id }}" class="btn btn-primary">Read More</a>
            @endif
        </div>
    </div>
</div>
