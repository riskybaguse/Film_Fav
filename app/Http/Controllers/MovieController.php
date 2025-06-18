<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::latest()->paginate(10);
        return view('admin.movies.index', compact('movies'));
    }

    public function create(){
        return view('admin.movies.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'synopsis' => 'nullable|string',
            'poster_url' => 'required|url',
            'genre' => 'nullable|string|max:100',
        ], [
            // Custom Message
            'title.required' => 'Judul Filmnya wajib diisi ya!',
            'director.required' => 'Sutradaranya siapa dong?',
            'release_year.required' => 'Tahun rilisnya kapan?',
            'poster_url.required' => 'Kasih poster dong masa kosong?'
        ]
    );

        Movie::create($request->all());

        return redirect()->route('admin.movies.index')->with('success', 'Movie created successfully.');
    }

    public function edit(Movie $movie){
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie){
        $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'synopsis' => 'nullable|string',
            'poster_url' => 'required|url',
            'genre' => 'nullable|string|max:100',
        ],[
            // Custom Message
            'title.required' => 'Judul Filmnya wajib diisi ya!',
            'director.required' => 'Sutradaranya siapa dong?',
            'release_year.required' => 'Tahun rilisnya kapan?',
            'poster_url.required' => 'Kasih poster dong masa kosong?'
        ]
    );

        $movie->update($request->all());

        return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie){
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully.');
    }
}
