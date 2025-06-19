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
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $movie->title }} ({{ $movie->release_year }})
        </h2>
    </x-slot>

    <div class="py-16 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
            <div class="z-10">
                <h1 class="text-3xl font-bold text-amber-400 mb-4">
                    Info Detail
                </h1>
                <p class="text-gray-400 mb-2">Tahun Rilis: {{ $movie->release_year }}</p>
                <p class="text-gray-400 mb-2">Genre: {{ $movie->genre }}</p>
            </div>

            <div class="relative z-0 mb-10">
                <div class="absolute inset-0 bg-gradient-to-l from-gray-900 via-gray-900/60 to-transparent rounded-lg z-10 pointer-events-none"></div>

                <div class="relative z-20">
                    <div class="w-full max-w-5xl mx-auto rounded-lg overflow-hidden shadow-lg">
                        <div class="w-full flex justify-center" style="padding-top: 2%; padding-bottom: 2%;">
                            <iframe
                                class="rounded-lg"
                                src="https://www.youtube.com/embed/{{ $movie->trailer_youtube_id }}?autoplay=1&mute=0&rel=0&controls=0&showinfo=0&loop=1&playlist={{$movie->trailer_youtube_id}}"
                                frameborder="0"
                                width="100%"
                                height="600"
                                allow="autoplay; encrypted-media"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>

            </div>
            <div class="max-w-4xl mx-auto mt-10 text-gray-300 leading-relaxed" style="padding-bottom:5%;">
                <h2 class="text-xl font-semibold mb-2">Sinopsis</h2>
                <p style="text-align: justify;">
                    {{ $movie->synopsis ?? 'Tidak ada deskripsi tersedia untuk film ini.' }}
                </p>
            </div>
        </div>
    </div>

</x-app-layout>