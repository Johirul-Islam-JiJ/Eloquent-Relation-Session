@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card shadow border-0 rounded w-50">
            <div class="card-body">
                <h4 class="text-center">Edit Author</h4>
                <form action="{{ route('authors.update', $author) }}"
                      method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group my-3">
                        <label for="name">Title</label>
                        <input type="text"
                               name="name"
                               id="name"
                               class="form-control"
                               value="{{ old('name') ?? $author->name }}"
                               required>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group my-3">
                        <label for="email">Email</label>
                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control"
                               value="{{ old('email') ?? $author->email }}"
                               required>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group my-3">
                        <label for="phone">Phone</label>
                        <input type="text"
                               name="phone"
                               id="phone"
                               class="form-control"
                               value="{{ old('phone') ?? $author->phone }}"
                               required>
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group my-3">
                        <label for="address">Address</label>
                        <textarea name="address"
                                  id="address"
                                  class="form-control"
                                  required>{{ old('address') ?? $author->address }}</textarea>
                        @error('address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group my-3">
                        <a href="{{ route('authors.index') }}"
                           class="btn btn-secondary">Back</a>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
