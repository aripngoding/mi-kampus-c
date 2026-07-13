@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil - MI Kampus-C')

@section('content')
<section class="py-20 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-2xl">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

            {{-- Header Sukses --}}
            <div class="bg-gradient-to-r from-green-700 to-green-600 p-10 text-center">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Pendaftaran Berhasil!</h1>
                <p class="text-green-100">Terima kasih telah mendaftar di MI Kampus-C</p>
            </div>

            <div class="p-8">

                {{-- Nomor Registrasi --}}
                <div class="bg-green-50 border-2 border-green-300 rounded-xl p-6 text-center mb-8">
                    <p class="text-gray-600 text-sm mb-2">Nomor Registrasi Anda</p>
                    <p class="text-3xl font-extrabold text-green-700 tracking-widest">{{ $registration->registration_number }}</p>
                    <p class="text-gray-500 text-xs mt-2">Simpan nomor ini untuk cek status pendaftaran</p>
                </div>

                {{-- Detail Pendaftaran --}}
                <h2 class="text-lg font-bold text-gray-800 mb-4">Ringkasan Pendaftaran</h2>
                <div class="space-y-3 mb-8">
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
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500 text-sm">No. Telepon</span>
                        <span class="font-semibold text-gray-800">{{ $registration->parent_phone }}</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-500 text-sm">Status</span>
                        <span class="inline-block bg-yellow-100 text-yellow-700 text-xs font-bold px-3 py-1 rounded-full">Menunggu Verifikasi</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-gray-500 text-sm">Tanggal Daftar</span>
                        <span class="font-semibold text-gray-800">{{ $registration->created_at->format('d M Y, H:i') }} WIB</span>
                    </div>
                </div>

                {{-- Info Selanjutnya --}}
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-5 mb-8">
                    <h3 class="font-bold text-blue-800 mb-2">Langkah Selanjutnya</h3>
                    <ol class="text-blue-700 text-sm space-y-1 list-decimal list-inside">
                        <li>Simpan nomor registrasi Anda dengan baik</li>
                        <li>Panitia PPDB akan menghubungi Anda melalui nomor telepon yang didaftarkan</li>
                        <li>Siapkan dokumen: Akta Kelahiran, KK, dan Ijazah/STTB TK/RA</li>
                        <li>Datang ke madrasah sesuai jadwal yang ditentukan untuk verifikasi berkas</li>
                    </ol>
                </div>

                {{-- Tombol --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('home') }}"
                       class="flex-1 text-center bg-green-600 text-white py-3 rounded-xl hover:bg-green-700 transition font-semibold">
                        Kembali ke Beranda
                    </a>
                    <a href="{{ route('ppdb.check-status') }}"
                       class="flex-1 text-center border-2 border-green-600 text-green-600 py-3 rounded-xl hover:bg-green-50 transition font-semibold">
                        Cek Status Pendaftaran
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
