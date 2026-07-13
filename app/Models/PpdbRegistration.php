<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'student_name',
        'nisn',
        'birth_place',
        'birth_date',
        'gender',
        'religion',
        'previous_school',
        'parent_name',
        'parent_phone',
        'address',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public static function generateRegistrationNumber(): string
    {
        $year = date('Y');
        $lastRegistration = self::whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        $number = $lastRegistration ? intval(substr($lastRegistration->registration_number, -3)) + 1 : 1;

        return sprintf('PPDB-%s-%03d', $year, $number);
    }

    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'verified' => 'info',
            'accepted' => 'success',
            'rejected' => 'danger',
            default => 'secondary',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending' => 'Menunggu',
            'verified' => 'Terverifikasi',
            'accepted' => 'Diterima',
            'rejected' => 'Ditolak',
            default => 'Unknown',
        };
    }
}
