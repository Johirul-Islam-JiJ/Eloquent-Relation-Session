@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card w-50 shadow border-0">
            <div class="card-body">
                <h4 class="text-center">Book</h4>
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $book->title }}</td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td>{{ $book->author }}</td>
                    </tr>
                    <tr>
                        <th>Publisher</th>
                        <td>{{ $book->publisher }}</td>
                    </tr>
                    <tr>
                        <th>Publishing Date</th>
                        <td>{{ $book->publishing_date }}</td>
                    </tr>
                    <tr>
                        <th>Last Printing Date</th>
                        <td>{{ $book->latest_printing_date }}</td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td>{{ $book->isbn }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
