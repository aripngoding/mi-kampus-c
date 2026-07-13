@extends('layouts.app')

@section('title', 'Galeri - MI Kampus-C')

@section('content')
<section class="bg-gradient-to-r from-green-900 to-green-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-3">Galeri Kegiatan</h1>
        <p class="text-green-100 text-lg">Dokumentasi kegiatan dan momen berharga MI Kampus-C</p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($galleries->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($galleries as $gallery)
            <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition group cursor-pointer"
                 onclick="openLightbox('{{ Storage::url($gallery->image_path) }}', '{{ $gallery->title }}', '{{ $gallery->description }}')">
                <div class="overflow-hidden h-48">
                    <img src="{{ Storage::url($gallery->image_path) }}"
                         alt="{{ $gallery->title }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800">{{ $gallery->title }}</h3>
                    @if($gallery->description)
                    <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $gallery->description }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $galleries->links() }}
        </div>
        @else
        <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100 max-w-2xl mx-auto">
            <div class="mb-6">
                <svg class="w-20 h-20 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Foto</h3>
            <p class="text-gray-500">Foto kegiatan akan segera ditambahkan.</p>
        </div>
        @endif
    </div>
</section>

{{-- Lightbox Modal --}}
<div id="lightbox" class="hidden fixed inset-0 bg-black/80 z-50 items-center justify-center p-4" onclick="closeLightbox()">
    <div class="max-w-4xl w-full" onclick="event.stopPropagation()">
        <div class="relative">
            <button onclick="closeLightbox()" class="absolute -top-10 right-0 text-white text-3xl hover:text-gray-300">&times;</button>
            <img id="lightbox-img" src="" alt="" class="w-full rounded-xl shadow-2xl max-h-[70vh] object-contain">
        </div>
        <div class="mt-4 text-center text-white">
            <h3 id="lightbox-title" class="text-xl font-bold"></h3>
            <p id="lightbox-desc" class="text-gray-300 mt-1"></p>
        </div>
    </div>
</div>

<script>
function openLightbox(src, title, desc) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-title').textContent = title;
    document.getElementById('lightbox-desc').textContent = desc;
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.getElementById('lightbox').classList.remove('flex');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLightbox();
});
</script>
@endsection
