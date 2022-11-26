@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2>Books</h2>
            <div class="flex-column">
                <a href="{{ route('books.create') }}"
                   class="btn btn-success rounded-pill">
                    <i class="fa fa-plus"></i>
                    Create
                </a>
            </div>
        </div>
        <br>
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Publishing Date</th>
                            <th>Latest Printing Date</th>
                            <th>ISBN</th>
                            <th>Pages</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->publisher->name }}</td>
                                <td>{{ $book->publishing_date }}</td>
                                <td>{{ $book->latest_printing_date }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->pages }}</td>
                                <td>{{ $book->price }}</td>
                                <td class="d-flex">
                                    <div class="flex-column me-1">
                                        <a href="{{ route('books.show', $book) }}"
                                           class="btn btn-dark btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="flex-column me-1">
                                        <a href="{{ route('books.edit', $book) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </div>
                                    <form action="{{ route('books.destroy', $book) }}"
                                          method="post"
                                          class="flex-column">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    <div>{{ $books->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
