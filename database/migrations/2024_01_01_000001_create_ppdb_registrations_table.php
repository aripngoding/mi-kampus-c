<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdb_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number', 50)->unique();
            $table->string('student_name');
            $table->string('nisn', 20)->nullable();
            $table->string('birth_place', 100);
            $table->date('birth_date');
            $table->enum('gender', ['L', 'P']);
            $table->string('religion', 50)->default('Islam');
            $table->string('previous_school')->nullable();
            $table->string('parent_name');
            $table->string('parent_phone', 20);
            $table->text('address');
            $table->enum('status', ['pending', 'verified', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdb_registrations');
    }
};
