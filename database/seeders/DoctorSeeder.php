<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::create([
            'name' => 'Dr. Elena Popescu',
            'specialty' => 'Cardiologie',
            'description' => 'Medic primar cardiolog cu peste 15 ani de experiență în tratarea afecțiunilor cardiovasculare. Absolventă a UMF Carol Davila, cu stagii de pregătire în Franța.',
            'photo_url' => 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=500&q=80',
            'price' => 300.00,
        ]);

        Doctor::create([
            'name' => 'Dr. Andrei Ionescu',
            'specialty' => 'Dermatologie',
            'description' => 'Specializat în dermatologie pediatrică și tratamente laser. Pasionat de cele mai noi tehnologii din domeniu pentru a oferi pacienților cele mai bune rezultate.',
            'photo_url' => 'https://images.unsplash.com/photo-1622253692010-333f2b6ce37a?w=500&q=80',
            'price' => 250.00,
        ]);
        
        Doctor::create([
            'name' => 'Dr. Maria Georgescu',
            'specialty' => 'Neurologie',
            'description' => 'Expert în diagnosticarea și tratamentul afecțiunilor neurologice, cu un interes special pentru migrene și tulburări de somn. Empatie și profesionalism.',
            'photo_url' => 'https://images.unsplash.com/photo-1537368910025-70035079f59f?w=500&q=80',
            'price' => 280.00,
        ]);
    }
}