<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::latest()->paginate();

        return view('publishers.index', compact('publishers'));
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:publishers'],
            'phone' => ['required', 'string', 'max:255', 'unique:publishers'],
            'address' => ['required', 'string', 'max:255'],
            'registration_no' => ['nullable', 'string', 'max:255'],
        ]);

        if (Publisher::create($valid))
            return redirect()->route('publishers.index')->with('success', 'Publisher Created Successfully');

        return back()->with('error', 'Something went wrong');
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:publishers,email,' . $publisher->id],
            'phone' => ['required', 'string', 'max:255', 'unique:publishers,phone,' . $publisher->id],
            'address' => ['required', 'string', 'max:255'],
            'registration_no' => ['nullable', 'string', 'max:255'],
        ]);

        if ($publisher->update($valid))
            return redirect()->route('publishers.index')->with('success', 'Publisher Updated Successfully');

        return back()->with('error', 'Something went wrong');
    }

    public function destroy(Publisher $publisher)
    {
        if ($publisher->delete())
            return back()->with('success', 'Publisher Deleted Successfully');

        return back()->with('error', 'Something went wrong');
    }
}
