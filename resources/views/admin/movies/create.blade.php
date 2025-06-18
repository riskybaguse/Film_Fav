@push('styles')
    <style>
        header.shadow {
            background-color: transparent !important;
            box-shadow: none !important;
        }
    </style>
@endpush
<x-app-layout>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Tambah Film Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 border-gray-700 rounded-lg">
    <div class="p-6 text-gray-200">
        @if ($errors->any())
        <div class="bg-red-600 border border-red-400 text-white px-4 py-3 rounded relative mb-4" role="alert">
            <strong>Waduh!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.movies.store') }}" method="POST">
            @csrf
            <!-- Form fields here -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-white">Judul</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-200 shadow-sm" value="{{ old('title') }}">
            </div>
            <div class="mb-4">
                <label for="director" class="block text-sm font-medium text-white">Sutradara</label>
                <input type="text" name="director" id="director" class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-200 shadow-sm" value="{{ old('director') }}">
            </div>
            <div class="mb-4">
                <label for="genre" class="block text-sm font-medium text-white">Genre</label>
                <input type="text" name="genre" id="genre" class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-200 shadow-sm" value="{{ old('genre') }}">
            </div>
            <div class="mb-4">
                <label for="release_year" class="block text-sm font-medium text-white mt-3">Tahun Rilis</label>
                <input type="number" name="release_year" id="release_year" class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-200 shadow-sm" value="{{ old('release_year') }}">
            </div>
            <div class="mb-4">
                <label for="synopsis" class="block text-sm font-medium text-white">Sinopsis</label>
                <textarea name="synopsis" id="synopsis" rows="4" class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-200 shadow-sm">{{ old('synopsis') }}</textarea>
            </div>
            <div class="mb-4">
                <label for="poster_url" class="block text-sm font-medium text-white">URL Poster</label>
                <input type="url" name="poster_url" id="poster_url" class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-200 shadow-sm" value="{{ old('poster_url') }}">
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('admin.movies.index') }}" class="ms-2 text-white hover:text-gray-400 mr-4"><i class="fa fa-arrow-left" aria-hidden="true"></i> Batal</a>
                <button type="submit" class="ms-2 text-white hover:text-gray-400 mr-4"><i class="fa fa-plus"></i> Tambah</button>
            </div>
        </form>
    </div>
</div>

        </div>
    </div>
</x-app-layout>