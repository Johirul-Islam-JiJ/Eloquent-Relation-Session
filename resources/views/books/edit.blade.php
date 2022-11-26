@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card shadow border-0 rounded w-50">
            <div class="card-body">
                <h4 class="text-center">Edit Book</h4>
                <form action="{{ route('books.update',$book) }}"
                      method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group my-3">
                        <label for="title">Title</label>
                        <input type="text"
                               name="title"
                               id="title"
                               class="form-control"
                               value="{{ old('title') ?? $book->title }}"
                               required>
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="publisher_id">Publisher</label>
                        <select name="publisher_id"
                                id="publisher_id"
                                class="form-control"
                                required>
                            <option value=""
                                    selected
                                    disabled>Please Select...
                            </option>
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->id }}"
                                        @if(old('publisher_id')===$publisher->id || $book->publisher_id === $publisher->id) selected @endif>
                                    {{ $publisher->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('publisher_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="publishing_date">Publishing Date</label>
                        <input type="date"
                               name="publishing_date"
                               id="publishing_date"
                               class="form-control"
                               value="{{ old('publishing_date') ?? $book->publishing_date }}"
                               required>
                        @error('publishing_date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="latest_printing_date">Latest Printing Date</label>
                        <input type="date"
                               name="latest_printing_date"
                               id="latest_printing_date"
                               class="form-control"
                               value="{{ old('latest_printing_date') ?? $book->latest_printing_date }}"
                               required>
                        @error('latest_printing_date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="isbn">ISBN</label>
                        <input type="number"
                               name="isbn"
                               id="isbn"
                               class="form-control"
                               value="{{ old('isbn') ?? $book->isbn }}"
                               required>
                        @error('isbn')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="pages">Pages</label>
                        <input type="number"
                               step="1"
                               min="1"
                               name="pages"
                               id="pages"
                               class="form-control"
                               value="{{ old('pages') ?? $book->pages  }}">
                        @error('pages')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label for="price">Price</label>
                        <input type="number"
                               step="0.01"
                               min="1"
                               name="price"
                               id="price"
                               class="form-control"
                               value="{{ old('price') ?? $book->price }}">
                        @error('price')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <a href="{{ route('books.index') }}"
                           class="btn btn-secondary">Back</a>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
