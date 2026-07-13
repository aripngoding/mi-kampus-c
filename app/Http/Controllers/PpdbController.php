<?php

namespace App\Http\Controllers;

use App\Models\PpdbRegistration;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        return view('ppdb.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name'    => 'required|string|max:255',
            'nisn'            => 'nullable|string|max:20',
            'birth_place'     => 'required|string|max:100',
            'birth_date'      => 'required|date|before:today',
            'gender'          => 'required|in:L,P',
            'religion'        => 'required|string|max:50',
            'previous_school' => 'nullable|string|max:255',
            'parent_name'     => 'required|string|max:255',
            'parent_phone'    => 'required|string|max:20',
            'address'         => 'required|string',
        ], [
            'student_name.required'  => 'Nama siswa wajib diisi.',
            'birth_place.required'   => 'Tempat lahir wajib diisi.',
            'birth_date.required'    => 'Tanggal lahir wajib diisi.',
            'birth_date.before'      => 'Tanggal lahir harus sebelum hari ini.',
            'gender.required'        => 'Jenis kelamin wajib dipilih.',
            'religion.required'      => 'Agama wajib diisi.',
            'parent_name.required'   => 'Nama orang tua wajib diisi.',
            'parent_phone.required'  => 'Nomor telepon orang tua wajib diisi.',
            'address.required'       => 'Alamat wajib diisi.',
        ]);

        // Cek umur siswa: minimal 5 tahun, maksimal 7 tahun
        $birthDate = \Carbon\Carbon::parse($validated['birth_date']);
        $age = $birthDate->age;

        if ($age < 5 || $age > 7) {
            $validated['registration_number'] = PpdbRegistration::generateRegistrationNumber();
            $validated['status'] = 'rejected';
            $registration = PpdbRegistration::create($validated);

            return redirect()->route('ppdb.rejected', $registration->registration_number);
        }

        $validated['registration_number'] = PpdbRegistration::generateRegistrationNumber();
        $validated['status'] = 'pending';

        $registration = PpdbRegistration::create($validated);

        return redirect()->route('ppdb.success', $registration->registration_number);
    }

    public function success($registrationNumber)
    {
        $registration = PpdbRegistration::where('registration_number', $registrationNumber)->firstOrFail();
        return view('ppdb.success', compact('registration'));
    }

    public function rejected($registrationNumber)
    {
        $registration = PpdbRegistration::where('registration_number', $registrationNumber)->firstOrFail();
        $birthDate = \Carbon\Carbon::parse($registration->birth_date);
        $age = $birthDate->age;
        return view('ppdb.rejected', compact('registration', 'age'));
    }

    public function checkStatus(Request $request)
    {
        $registration = null;
        $searched = false;

        if ($request->has('no_registrasi') && $request->no_registrasi) {
            $searched = true;
            $registration = PpdbRegistration::where(
                'registration_number',
                strtoupper(trim($request->no_registrasi))
            )->first();
        }

        return view('ppdb.check-status', compact('registration', 'searched'));
    }

    public function statusResult(Request $request)
    {
        $request->validate([
            'registration_number' => 'required|string',
        ], [
            'registration_number.required' => 'Nomor registrasi wajib diisi.',
        ]);

        return redirect()->route('ppdb.check-status', [
            'no_registrasi' => strtoupper(trim($request->registration_number))
        ]);
    }
}
