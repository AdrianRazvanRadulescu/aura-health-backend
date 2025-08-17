<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Creăm un utilizator de test
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // 2. Rulăm seeder-ul pentru a crea medicii
        $this->call([
            DoctorSeeder::class,
        ]);

        // 3. Preluăm medicii proaspăt creați pentru a le putea asigna programări
        $doctor1 = Doctor::where('specialty', 'Cardiologie')->first();
        $doctor2 = Doctor::where('specialty', 'Dermatologie')->first();

        // 4. Creăm programări pentru utilizatorul de test
        if ($user && $doctor1) {
            Appointment::create([
                'user_id' => $user->id,
                'doctor_id' => $doctor1->id,
                'appointment_date' => now()->addDays(5),
                'appointment_time' => '14:30',
            ]);
        }

        if ($user && $doctor2) {
            Appointment::create([
                'user_id' => $user->id,
                'doctor_id' => $doctor2->id,
                'appointment_date' => now()->addDays(7),
                'appointment_time' => '11:00',
            ]);
        }

        if ($user && $doctor1) {
            MedicalRecord::create([
                'user_id' => $user->id,
                'doctor_id' => $doctor1->id,
                'type' => 'Analize',
                'issued_date' => now()->subDays(10),
            ]);
        }
    }
}