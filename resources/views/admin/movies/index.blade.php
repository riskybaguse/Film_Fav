@push('styles')
<style>
    header.shadow {
        background-color: transparent !important;
        box-shadow: none !important;
    }
</style>
@endpush

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('KELOLA FILM') }}
            </h2>
            <a href="{{ route('admin.movies.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg"><i class="fa fa-plus"></i> Tambah Film
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
            <div class="bg-green-100 dark:bg-green-800 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-200 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <span class="block sm:inline text-white">{{ $message }}</span>
            </div>
            @endif

            <div class="space-y-6">
                @forelse ($movies as $movie)
                <!-- Movie Card -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden flex flex-row p-4 space-x-4">
                    <!-- Left Side: Movie Poster -->
                    <div class="w-1/3 flex justify-center items-center">
                        <img src="{{ $movie->poster_url ?? 'https://placehold.co/300x450/1F2937/FFFFFF?text=No+Image' }}"
                            onerror="this.onerror=null;this.src='https://placehold.co/300x450/1F2937/FFFFFF?text=Error';"
                            alt="Poster for {{ $movie->title }}" class="w-32 h-48 object-cover rounded-lg">
                    </div>
                    <!-- Right Side: Movie Info -->
                    <div class="p-6 w-2/3 flex flex-col">
                        <div>
                            <h3 class="text-2xl font-bold text-white">
                                {{ $movie->title }} ({{ $movie->release_year }})
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Disutradarai oleh: <span class="font-semibold">{{ $movie->director }}</span>
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Genre: <span class="font-semibold">{{ $movie->genre }}</span>
                            </p>

                            <hr class="my-4 border-gray-200 dark:border-gray-700">
                            <p class="text-gray-700 dark:text-gray-300 mt-3" style="text-align: justify;">
                                {{ $movie->synopsis ?? 'Sinopsis belum tersedia.' }}
                            </p>
                        </div>
                        <!-- Action Buttons -->
                        <div class="mt-6 flex space-x-4 text-lg">
                            <a href="{{ route('admin.movies.edit', $movie->id) }}" style="color: #fbbf24">
                                <i class="fas fa-pen mr-2"></i> Edit
                            </a>
                            <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus film ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ms-3 text-red-600 dark:text-red-400">
                                    <i class="fas fa-trash ms-2"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <!-- No Movies Available -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden p-12 rounded-lg">
                    <center>
                        <h3 class="text-xl font-semibold text-white dark:text-white">Belum Ada Data Film :(</h3>
                    </center>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $movies->links() }}
            </div>
        </div>
    </div>
</x-app-layout>