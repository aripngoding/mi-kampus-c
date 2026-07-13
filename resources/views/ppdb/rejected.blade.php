@extends('layouts.app')

@section('title', 'Pendaftaran Tidak Dapat Diproses - MI Kampus-C')

@section('content')
<section class="py-20 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-2xl">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

            {{-- Header Ditolak --}}
            <div class="bg-gradient-to-r from-red-700 to-red-500 p-10 text-center">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Pendaftaran Tidak Dapat Diproses</h1>
                <p class="text-red-100">Mohon maaf, calon siswa tidak memenuhi syarat usia</p>
            </div>

            <div class="p-8">

                {{-- Nomor Registrasi --}}
                <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6 text-center mb-8">
                    <p class="text-gray-600 text-sm mb-2">Nomor Registrasi</p>
                    <p class="text-2xl font-extrabold text-red-600 tracking-widest">{{ $registration->registration_number }}</p>
                    <p class="text-gray-500 text-xs mt-2">Status: <span class="font-bold text-red-600">Ditolak Otomatis</span></p>
                </div>

                {{-- Alasan Penolakan --}}
                <div class="bg-red-50 border border-red-200 rounded-xl p-5 mb-8">
                    <h3 class="font-bold text-red-800 mb-3">Alasan Penolakan</h3>
                    <p class="text-red-700 text-sm mb-2">
                        Usia calon siswa <strong>{{ $registration->student_name }}</strong> adalah
                        <strong>{{ $age }} tahun</strong>, tidak memenuhi syarat usia masuk MI Kampus-C.
                    </p>
                    <div class="mt-3 bg-white rounded-lg p-4 border border-red-100">
                        <p class="text-sm font-semibold text-gray-700 mb-2">Ketentuan Usia Masuk MI Kampus-C:</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Usia minimal: <strong>5 tahun</strong>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Usia maksimal: <strong>7 tahun</strong>
                            </li>
                            <li class="flex items-center gap-2 mt-2 pt-2 border-t border-red-100">
                                <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                Usia calon siswa: <strong class="text-red-600">{{ $age }} tahun</strong>
                                @if($age < 5)
                                    <span class="text-red-500">(belum cukup umur)</span>
                                @else
                                    <span class="text-red-500">(melebihi batas usia)</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Data Pendaftar --}}
                <h2 class="text-lg font-bold text-gray-800 mb-4">Data Pendaftar</h2>
                <div class="space-y-3 mb-8">
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500 text-sm">Nama Siswa</span>
                        <span class="font-semibold text-gray-800">{{ $registration->student_name }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500 text-sm">Tanggal Lahir</span>
                        <span class="font-semibold text-gray-800">{{ $registration->birth_date->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500 text-sm">Usia Saat Mendaftar</span>
                        <span class="font-semibold text-red-600">{{ $age }} tahun</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-gray-500 text-sm">Nama Orang Tua</span>
                        <span class="font-semibold text-gray-800">{{ $registration->parent_name }}</span>
                    </div>
                </div>

                {{-- Saran --}}
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-5 mb-8">
                    <h3 class="font-bold text-blue-800 mb-2">Informasi</h3>
                    @if($age < 5)
                    <p class="text-blue-700 text-sm">
                        Calon siswa belum memenuhi syarat usia minimum. Silakan mendaftar kembali pada tahun ajaran yang sesuai ketika usia sudah mencapai 5-7 tahun.
                    </p>
                    @else
                    <p class="text-blue-700 text-sm">
                        Calon siswa melebihi batas usia maksimum untuk kelas 1 MI. Untuk informasi lebih lanjut, silakan hubungi kami langsung.
                    </p>
                    @endif
                    <p class="text-blue-600 text-sm mt-2 font-semibold">
                        Hubungi kami: 0878-6032-6141
                    </p>
                </div>

                {{-- Tombol --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('home') }}"
                       class="flex-1 text-center bg-green-600 text-white py-3 rounded-xl hover:bg-green-700 transition font-semibold">
                        Kembali ke Beranda
                    </a>
                    <a href="{{ route('ppdb.index') }}"
                       class="flex-1 text-center border-2 border-gray-400 text-gray-600 py-3 rounded-xl hover:bg-gray-50 transition font-semibold">
                        Daftar Ulang
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
