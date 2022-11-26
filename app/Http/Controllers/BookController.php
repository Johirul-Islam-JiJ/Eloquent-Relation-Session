<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate();

        return view('books.index', compact('books'));
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'publisher_id' => ['required', 'integer'],
            'publishing_date' => ['required', 'date', 'before_or_equal:today'],
            'latest_printing_date' => ['required', 'date', 'before_or_equal:today', 'after_or_equal:publishing_date'],
            'isbn' => ['required', 'integer', 'digits_between:5,10', 'unique:books'],
            'pages' => ['nullable', 'integer', 'max:9999'],
            'price' => ['nullable', 'numeric', 'gt:0'],
        ]);

        if (Book::create($valid))
            return redirect()->route('books.index')->with('success', 'Book Created Successfully');

        return back()->with('error', 'Something went wrong');
    }

    public function create()
    {
        $publishers = Publisher::orderBy('name')->get();

        return view('books.create', compact('publishers'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $publishers = Publisher::orderBy('name')->get();

        return view('books.edit', compact('book', 'publishers'));
    }

    public function update(Request $request, Book $book)
    {
        $valid = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'publisher_id' => ['required', 'integer'],
            'publishing_date' => ['required', 'date', 'before_or_equal:today'],
            'latest_printing_date' => ['required', 'date', 'before_or_equal:today', 'after_or_equal:publishing_date'],
            'isbn' => ['required', 'integer', 'digits_between:5,10', 'unique:books,isbn,' . $book->id],
            'pages' => ['nullable', 'integer', 'max:9999'],
            'price' => ['nullable', 'numeric', 'gt:0'],
        ]);

        if ($book->update($valid))
            return redirect()->route('books.index')->with('success', 'Book Updated Successfully');

        return back()->with('error', 'Something went wrong');
    }

    public function destroy(Book $book)
    {
        if ($book->delete())
            return back()->with('success', 'Book Deleted Successfully');

        return back()->with('error', 'Something went wrong');
    }

    public function assignAuthorForm(Book $book)
    {
        $authors = Author::orderBy('name')->get();

        return view('books.assign-author', compact('book', 'authors'));
    }

    public function assignAuthor(Request $request, Book $book)
    {
        $valid = $request->validate([
            'author_id' => ['required', 'integer', 'gt:0'],
            'royalty' => ['required', 'numeric', 'gt:0'],
        ]);

        if ($book->authors()->sync([$valid['author_id'] => ['royalty' => $valid['royalty']]], false))
            return redirect()->route('books.show', $book)->with('success', 'Author Assigned Successfully');

        return back()->with('error', 'Something went wrong');
    }
}
