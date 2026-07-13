@extends('layouts.app')

@section('title', 'Cek Status PPDB - MI Kampus-C')

@section('content')
<section class="bg-gradient-to-r from-green-900 to-green-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-3">Cek Status Pendaftaran</h1>
        <p class="text-green-100 text-lg">Masukkan nomor registrasi untuk melihat status pendaftaran PPDB Anda</p>
    </div>
</section>

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-xl">

        {{-- Form Cek Status --}}
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-6 text-center">Cek Status Pendaftaran</h2>
            <form method="GET" action="{{ route('ppdb.check-status') }}">
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Registrasi</label>
                    <input type="text"
                           name="no_registrasi"
                           placeholder="CONTOH: PPDB-2026-001"
                           value="{{ request('no_registrasi') }}"
                           class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 text-center text-lg font-bold tracking-widest uppercase focus:border-green-500 focus:outline-none transition">
                </div>
                <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl transition text-lg">
                    Cek Status
                </button>
            </form>
        </div>

        {{-- Hasil Pencarian --}}
        @if(isset($searched) && $searched)
            @if(isset($registration))
                @php
                    $statusConfig = [
                        'pending'  => [
                            'bg' => 'bg-yellow-50', 'text' => 'text-yellow-700', 'border' => 'border-yellow-300',
                            'badge' => 'bg-yellow-100 text-yellow-700',
                            'label' => 'Menunggu Verifikasi',
                            'msg' => 'Pendaftaran Anda telah diterima. Panitia sedang memproses berkas Anda.',
                            'msg_color' => 'bg-yellow-50 border-yellow-200 text-yellow-700',
                        ],
                        'verified' => [
                            'bg' => 'bg-blue-50', 'text' => 'text-blue-700', 'border' => 'border-blue-300',
                            'badge' => 'bg-blue-100 text-blue-700',
                            'label' => 'Sedang Diverifikasi',
                            'msg' => 'Berkas Anda sedang dalam proses verifikasi. Harap tunggu pengumuman selanjutnya.',
                            'msg_color' => 'bg-blue-50 border-blue-200 text-blue-700',
                        ],
                        'accepted' => [
                            'bg' => 'bg-green-50', 'text' => 'text-green-700', 'border' => 'border-green-300',
                            'badge' => 'bg-green-100 text-green-700',
                            'label' => 'DITERIMA',
                            'msg' => 'Selamat! Anda diterima di MI Kampus-C. Panitia akan segera menghubungi Anda untuk informasi lebih lanjut.',
                            'msg_color' => 'bg-green-50 border-green-200 text-green-700',
                        ],
                        'rejected' => [
                            'bg' => 'bg-red-50', 'text' => 'text-red-700', 'border' => 'border-red-300',
                            'badge' => 'bg-red-100 text-red-700',
                            'label' => 'Tidak Diterima',
                            'msg' => 'Mohon maaf, pendaftaran Anda belum dapat kami terima. Hubungi kami untuk informasi lebih lanjut.',
                            'msg_color' => 'bg-red-50 border-red-200 text-red-700',
                        ],
                    ];
                    $cfg = $statusConfig[$registration->status] ?? $statusConfig['pending'];
                @endphp

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

                    {{-- Status Header --}}
                    <div class="p-8 text-center border-b-2 {{ $cfg['border'] }} {{ $cfg['bg'] }}">

                        {{-- Icon sesuai status --}}
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4
                            @if($registration->status === 'accepted') bg-green-100
                            @elseif($registration->status === 'rejected') bg-red-100
                            @elseif($registration->status === 'verified') bg-blue-100
                            @else bg-yellow-100 @endif">
                            @if($registration->status === 'accepted')
                                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                            @elseif($registration->status === 'rejected')
                                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            @elseif($registration->status === 'verified')
                                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            @else
                                <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            @endif
                        </div>

                        <p class="text-gray-500 text-sm mb-1">Status Pendaftaran</p>
                        <span class="inline-block text-xl font-extrabold px-6 py-2 rounded-full {{ $cfg['badge'] }}">
                            {{ $cfg['label'] }}
                        </span>
                        <p class="text-gray-500 text-sm mt-3">
                            No. Registrasi: <span class="font-bold text-gray-800">{{ $registration->registration_number }}</span>
                        </p>
                    </div>

                    {{-- Detail Data --}}
                    <div class="p-8">
                        <h3 class="font-bold text-gray-800 mb-4">Data Pendaftar</h3>
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-500 text-sm">Nama Siswa</span>
                                <span class="font-semibold text-gray-800">{{ $registration->student_name }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-500 text-sm">Jenis Kelamin</span>
                                <span class="font-semibold text-gray-800">{{ $registration->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-500 text-sm">Tempat, Tanggal Lahir</span>
                                <span class="font-semibold text-gray-800">{{ $registration->birth_place }}, {{ $registration->birth_date->format('d M Y') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-100">
                                <span class="text-gray-500 text-sm">Nama Orang Tua</span>
                                <span class="font-semibold text-gray-800">{{ $registration->parent_name }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-500 text-sm">Tanggal Daftar</span>
                                <span class="font-semibold text-gray-800">{{ $registration->created_at->format('d M Y') }}</span>
                            </div>
                        </div>

                        {{-- Pesan Status --}}
                        <div class="border rounded-xl p-4 {{ $cfg['msg_color'] }}">
                            <p class="font-semibold text-sm">{{ $cfg['msg'] }}</p>
                        </div>
                    </div>
                </div>

            @else
                {{-- Tidak Ditemukan --}}
                <div class="bg-white rounded-2xl shadow-xl p-8 text-center">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Data Tidak Ditemukan</h3>
                    <p class="text-gray-500 text-sm">Nomor registrasi tidak ditemukan. Pastikan nomor yang Anda masukkan sudah benar.</p>
                    <p class="text-gray-400 text-xs mt-2">Contoh format: <span class="font-mono font-bold">PPDB-2026-001</span></p>
                </div>
            @endif
        @endif

        {{-- Link --}}
        <div class="text-center mt-8 space-y-2">
            <div>
                <a href="{{ route('ppdb.index') }}" class="text-green-600 hover:text-green-800 font-semibold text-sm">
                    Belum daftar? Daftar PPDB sekarang
                </a>
            </div>
            <div>
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-600 text-sm">
                    Kembali ke Beranda
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
