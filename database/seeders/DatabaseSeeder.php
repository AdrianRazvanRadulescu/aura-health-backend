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
        // Creăm un utilizator de test
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Creăm medici
        $doctor1 = Doctor::create([
            'name' => 'Dr. Ana Popescu',
            'specialty' => 'Cardiologie',
            'avatar_url' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=1780&auto=format&fit=crop',
        ]);

        $doctor2 = Doctor::create([
            'name' => 'Dr. Radu Ionescu',
            'specialty' => 'Dermatologie',
            'avatar_url' => 'https://images.unsplash.com/photo-1622253692010-33352da55e0d?q=80&w=2070&auto=format&fit=crop',
        ]);

        // Creăm programări pentru utilizatorul de test
        Appointment::create([
            'user_id' => $user->id,
            'doctor_id' => $doctor1->id,
            'appointment_date' => now()->addDays(5)->setHour(14)->setMinute(30),
        ]);

        Appointment::create([
            'user_id' => $user->id,
            'doctor_id' => $doctor2->id,
            'appointment_date' => now()->addDays(7)->setHour(11)->setMinute(0),
        ]);

        // Creăm documente medicale pentru utilizatorul de test
        MedicalRecord::create([
            'user_id' => $user->id,
            'doctor_id' => $doctor1->id,
            'type' => 'Analize',
            'issued_date' => now()->subDays(10),
        ]);

        MedicalRecord::create([
            'user_id' => $user->id,
            'doctor_id' => $doctor2->id,
            'type' => 'Rețetă',
            'issued_date' => now()->subDays(20),
        ]);
    }
}