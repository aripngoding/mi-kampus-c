@extends('layouts.app')

@section('title', 'PPDB Online - MI Kampus-C')

@section('content')
<section class="bg-gradient-to-r from-green-900 to-green-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-3">PPDB Online {{ date('Y') }}/{{ date('Y') + 1 }}</h1>
        <p class="text-green-100 text-lg">Penerimaan Peserta Didik Baru MI Kampus-C</p>
    </div>
</section>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 max-w-4xl">

        {{-- Info Banner --}}
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-5 mb-8 flex gap-3">
            <div class="flex-shrink-0">
                <svg class="w-6 h-6 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-blue-800 mb-2">Informasi Pendaftaran</h3>
                <ul class="text-blue-700 text-sm space-y-1.5">
                    <li class="flex items-start gap-1.5">
                        <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-500 flex-shrink-0"></span>
                        Pendaftaran dibuka untuk calon siswa baru kelas 1 MI Kampus-C
                    </li>
                    <li class="flex items-start gap-1.5">
                        <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-500 flex-shrink-0"></span>
                        Usia minimal 5 tahun dan maksimal 7 tahun per 1 Juli {{ date('Y') }}
                    </li>
                    <li class="flex items-start gap-1.5">
                        <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-500 flex-shrink-0"></span>
                        Setelah mendaftar, simpan nomor registrasi Anda
                    </li>
                    <li class="flex items-start gap-1.5">
                        <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-500 flex-shrink-0"></span>
                        Panitia akan menghubungi melalui nomor telepon yang didaftarkan
                    </li>
                </ul>
            </div>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="bg-green-600 px-8 py-5">
                <h2 class="text-xl font-bold text-white">Formulir Pendaftaran PPDB</h2>
                <p class="text-green-100 text-sm mt-1">Isi semua data dengan lengkap dan benar</p>
            </div>

            <form action="{{ route('ppdb.store') }}" method="POST" class="p-8">
                @csrf

                @if($errors->any())
                <div class="bg-red-50 border border-red-300 rounded-xl p-4 mb-6">
                    <h3 class="font-bold text-red-700 mb-2">Terdapat kesalahan pada form:</h3>
                    <ul class="list-disc list-inside text-red-600 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Data Siswa --}}
                <div class="mb-8">
                    <h3 class="text-lg font-bold text-gray-800 mb-5 pb-2 border-b-2 border-green-200 flex items-center gap-2">
                        <span class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center text-sm">1</span>
                        Data Calon Siswa
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap Siswa <span class="text-red-500">*</span></label>
                            <input type="text" name="student_name" value="{{ old('student_name') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('student_name') border-red-400 @enderror"
                                   placeholder="Masukkan nama lengkap siswa">
                            @error('student_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">NISN <span class="text-gray-400 font-normal">(opsional)</span></label>
                            <input type="text" name="nisn" value="{{ old('nisn') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500"
                                   placeholder="Nomor Induk Siswa Nasional">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis Kelamin <span class="text-red-500">*</span></label>
                            <select name="gender" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 @error('gender') border-red-400 @enderror">
                                <option value="">-- Pilih --</option>
                                <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('gender')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Tempat Lahir <span class="text-red-500">*</span></label>
                            <input type="text" name="birth_place" value="{{ old('birth_place') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 @error('birth_place') border-red-400 @enderror"
                                   placeholder="Kota tempat lahir">
                            @error('birth_place')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 @error('birth_date') border-red-400 @enderror">
                            @error('birth_date')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Agama <span class="text-red-500">*</span></label>
                            <select name="religion" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="Islam" {{ old('religion', 'Islam') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('religion') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('religion') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('religion') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('religion') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Asal Sekolah (TK/RA) <span class="text-gray-400 font-normal">(opsional)</span></label>
                            <input type="text" name="previous_school" value="{{ old('previous_school') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500"
                                   placeholder="Nama TK/RA asal">
                        </div>
                    </div>
                </div>

                {{-- Data Orang Tua --}}
                <div class="mb-8">
                    <h3 class="text-lg font-bold text-gray-800 mb-5 pb-2 border-b-2 border-green-200 flex items-center gap-2">
                        <span class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center text-sm">2</span>
                        Data Orang Tua / Wali
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Orang Tua / Wali <span class="text-red-500">*</span></label>
                            <input type="text" name="parent_name" value="{{ old('parent_name') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 @error('parent_name') border-red-400 @enderror"
                                   placeholder="Nama lengkap orang tua/wali">
                            @error('parent_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor Telepon / WhatsApp <span class="text-red-500">*</span></label>
                            <input type="tel" name="parent_phone" value="{{ old('parent_phone') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 @error('parent_phone') border-red-400 @enderror"
                                   placeholder="08xxxxxxxxxx">
                            @error('parent_phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Lengkap <span class="text-red-500">*</span></label>
                            <textarea name="address" rows="3"
                                      class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 @error('address') border-red-400 @enderror"
                                      placeholder="Jl. Nama Jalan No. XX, RT/RW, Kelurahan, Kecamatan, Kota">{{ old('address') }}</textarea>
                            @error('address')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-end pt-4 border-t border-gray-200">
                    <button type="reset" class="px-8 py-3 border-2 border-gray-300 text-gray-600 rounded-xl hover:bg-gray-50 transition font-semibold">
                        Reset Form
                    </button>
                    <button type="submit" class="px-10 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition font-bold shadow-md">
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>

        {{-- Link Cek Status --}}
        <div class="text-center mt-6">
            <p class="text-gray-500 text-sm">
                Sudah pernah mendaftar?
                <a href="{{ route('ppdb.check-status') }}" class="text-green-600 font-semibold hover:underline">Cek status pendaftaran</a>
            </p>
        </div>

    </div>
</section>
@endsection
