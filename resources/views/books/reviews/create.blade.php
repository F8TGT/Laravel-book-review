@extends('layouts.app')

@section('content')
    <h1 class="mb-5 text-2xl">Add Review for {{ $book->title }}</h1>
    <div class="mb-4">
        <a href="{{ route('books.show', $book) }}" class="link">← Go back to the review list</a>
    </div>
    <form method="POST" action="{{ route('books.reviews.store', $book) }}">
        @csrf
        <label for="review">Review</label>
        <textarea name="review" id="review" required class="input mb-4">{{ old('review')}}</textarea>
        @error('review')
            <p class="mb-4 error">{{ $message }}</p>
        @enderror
        <label for="rating">Rating</label>
        <select name="rating" id="rating" class="input mb-4" required >
            <option value="">Select a Rating</option>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" @selected(old('rating') == $i)>{{ $i }}</option>
            @endfor
        </select>
        @error('rating')
            <p class="mb-4 error">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn mt-3">＋Add Review</button>
    </form>
@endsection
