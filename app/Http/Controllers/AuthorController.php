<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->paginate();

        return view('authors.index', compact('authors'));
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:authors'],
            'phone' => ['required', 'string', 'max:255', 'unique:authors'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        if (Author::create($valid))
            return redirect()->route('authors.index')->with('success', 'Author Created Successfully');

        return back()->with('error', 'Something went wrong');
    }

    public function create()
    {
        return view('authors.create');
    }

    public function show(Author $author)
    {
//        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:authors,email,' . $author->id],
            'phone' => ['required', 'string', 'max:255', 'unique:authors,phone,' . $author->id],
            'address' => ['required', 'string', 'max:255'],
        ]);

        if ($author->update($valid))
            return redirect()->route('authors.index')->with('success', 'Author Updated Successfully');

        return back()->with('error', 'Something went wrong');
    }

    public function destroy(Author $author)
    {
        if ($author->delete())
            return back()->with('success', 'Author Deleted Successfully');

        return back()->with('error', 'Something went wrong');
    }
}
