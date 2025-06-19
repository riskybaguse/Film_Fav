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
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Now Showing!') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="movie-slider">
            @forelse ($movies as $movie)
            <div class="px-2">
                <a href="{{ route('movies_info.show', ['id' => $movie->id]) }}" class="movie-item group relative block bg-gray-800/50 rounded-lg overflow-hidden shadow-lg">
                    <div class="aspect-[2/3] w-full">
                        <img src="{{ $movie->poster_url }}"
                            onerror="this.onerror=null;this.src='https://placehold.co/400x600/1F2937/FFFFFF?text=Poster'"
                            alt="Poster for {{ $movie->title }}"
                            class="w-full h-full object-cover rounded-lg transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20">
                        <svg class="w-16 h-16 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                        </svg>
                    </div>

                    {{-- Info di bawah poster --}}
                    <div class="p-4">
                        <h3 class="font-bold text-white truncate group-hover:text-amber-400 transition-colors" title="{{ $movie->title }}">
                            {{ $movie->title }} ({{ $movie->release_year }})
                        </h3>
                        <div class="mt-1 flex items-center text-sm text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="ml-1">
                                {{ number_format(rand(75, 100) / 10, 1) }}
                            </span>
                            <span class="mx-2">|</span>
                            <span class="px-2 py-0.5 text-xs bg-gray-700 text-gray-300 rounded-full">{{ $movie->genre }}</span>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full text-center py-10">
                <center class="text-gray-400">Belum ada film yang ditambahkan :(</center>
            </div>
            @endforelse
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.movie-slider').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                dots: false,
                responsive: [
                    { breakpoint: 1024, settings: { slidesToShow: 3 } },
                    { breakpoint: 600, settings: { slidesToShow: 2 } },
                    { breakpoint: 480, settings: { slidesToShow: 1 } }
                ]
            });
        });
    </script>
    @endpush
</x-app-layout>