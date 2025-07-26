@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container">
    <h1 class="my-4">{{ $category->name }}</h1>

    @if($category->description)
        <p>{{ $category->description }}</p>
    @endif

    @if($items->count())
        <div class="row">
            @foreach($items as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                            <a href="{{ route('items.show', $item->id) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $items->links() }}
        </div>
    @else
        <p>No items found in this category.</p>
    @endif
</div>
@endsection
