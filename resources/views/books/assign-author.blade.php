@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card shadow border-0 rounded w-50">
            <div class="card-body">
                <h4 class="text-center">Assign Author</h4>
                <form action="{{ route('books.assign-author', $book) }}"
                      method="post">
                    @csrf

                    <div class="form-group my-3">
                        <label for="author_id">Author</label>
                        <select name="author_id"
                                id="author_id"
                                class="form-control"
                                required>
                            <option value=""
                                    selected
                                    disabled>Please Select...
                            </option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}"
                                        @if(old('author_id') === $author->id) selected @endif>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('author_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group my-3">
                        <label for="royalty">Royalty</label>
                        <input type="number"
                               name="royalty"
                               id="royalty"
                               min="1"
                               class="form-control"
                               step="0.01"
                               value="{{ old('royalty') }}"
                               required>
                        @error('royalty')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group my-3">
                        <a href="{{ route('books.index') }}"
                           class="btn btn-secondary">Back</a>
                        <button class="btn btn-success">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
