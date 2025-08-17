<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::create([
            'name' => 'Dr. Elena Popescu',
            'specialty' => 'Cardiologie',
            'description' => 'Medic primar cardiolog cu peste 15 ani de experiență. Absolventă a UMF Carol Davila.',
            'photo_url' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=500',
            'price' => 300.00,
        ]);

        Doctor::create([
            'name' => 'Dr. Andrei Ionescu',
            'specialty' => 'Dermatologie',
            'description' => 'Specializat în dermatologie pediatrică și tratamente laser. Pasionat de cele mai noi tehnologii.',
            'photo_url' => 'https://images.unsplash.com/photo-1622253692010-333f2b6ce37a?w=500',
            'price' => 250.00,
        ]);
        
        Doctor::create([
            'name' => 'Dr. Maria Georgescu',
            'specialty' => 'Neurologie',
            'description' => 'Expert în diagnosticarea și tratamentul afecțiunilor neurologice. Empatie și profesionalism.',
            'photo_url' => 'https://images.unsplash.com/photo-1537368910025-70035079f59f?w=500',
            'price' => 280.00,
        ]);

        Doctor::create([
            'name' => 'Dr. Cristian Stan',
            'specialty' => 'Ortopedie',
            'description' => 'Medic specialist în ortopedie și traumatologie sportivă, cu competențe în chirurgia artroscopică.',
            'photo_url' => 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?q=80&w=500',
            'price' => 320.00,
        ]);

        Doctor::create([
            'name' => 'Dr. Ioana Marin',
            'specialty' => 'Pediatrie',
            'description' => 'Dedicată sănătății celor mici, cu o abordare blândă și comunicare excelentă cu părinții.',
            'photo_url' => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?q=80&w=500',
            'price' => 200.00,
        ]);

        Doctor::create([
            'name' => 'Dr. Alexandru Dobre',
            'specialty' => 'Gastroenterologie',
            'description' => 'Specialist în afecțiuni ale sistemului digestiv, oferind consultații și proceduri endoscopice.',
            'photo_url' => 'https://images.unsplash.com/photo-1629425733761-caae3b5f2e50?q=80&w=500',
            'price' => 290.00,
        ]);

        Doctor::create([
            'name' => 'Dr. Laura Voinea',
            'specialty' => 'Endocrinologie',
            'description' => 'Diagnostic și tratament pentru afecțiuni tiroidiene, diabet zaharat și alte tulburări hormonale.',
            'photo_url' => 'https://images.unsplash.com/photo-1551198802-911161d43169?q=80&w=500',
            'price' => 260.00,
        ]);
        
        Doctor::create([
            'name' => 'Dr. Mihai Cojocaru',
            'specialty' => 'O.R.L.',
            'description' => 'Consultații pentru adulți și copii privind afecțiunile nasului, gâtului și urechilor.',
            'photo_url' => 'https://plus.unsplash.com/premium_photo-1661757997848-db10c84918e5?q=80&w=500',
            'price' => 240.00,
        ]);

        Doctor::create([
            'name' => 'Dr. Simona Tudor',
            'specialty' => 'Psihiatrie',
            'description' => 'Suport specializat pentru sănătatea mintală, oferind terapie și tratament într-un mediu sigur.',
            'photo_url' => 'https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?q=80&w=500',
            'price' => 350.00,
        ]);

        Doctor::create([
            'name' => 'Dr. Adrian Vasile',
            'specialty' => 'Urologie',
            'description' => 'Expertiză în tratamentul afecțiunilor sistemului urinar și reproducător masculin.',
            'photo_url' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?q=80&w=500',
            'price' => 310.00,
        ]);

        Doctor::create([
            'name' => 'Dr. Gabriela Neagu',
            'specialty' => 'Oftalmologie',
            'description' => 'Control de specialitate, prescriere de ochelari și diagnosticarea afecțiunilor oculare.',
            'photo_url' => 'https://images.unsplash.com/photo-1631217870535-b721a195b85a?q=80&w=500',
            'price' => 220.00,
        ]);
        
        Doctor::create([
            'name' => 'Dr. Victor Popa',
            'specialty' => 'Medicină Generală',
            'description' => 'Consultații de rutină, medicină preventivă și managementul afecțiunilor cronice.',
            'photo_url' => 'https://images.unsplash.com/photo-1624724115998-e04a9d73505e?q=80&w=500',
            'price' => 180.00,
        ]);
    }
}