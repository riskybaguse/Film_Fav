<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Akun Admin Default
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);

        // List buat title sama posternya biar ga random
        $titles = [
            'Final Destination: Bloodlines',
            'DeadPool & Wolverine',
            'Sonic the Hedgehog 3',
            'How to Train Your Dragon',
            'Venom: The Last Dance',
            'A Minecraft Movie',
            'Exhuma',
        ];

        $posterURLS = [
            // 1. Final Destination
            'https://media.thebostoncalendar.com/images/q_auto,fl_lossy/v1746718542/i6naen8z6mwfbhtxlmyv/free-advance-screening-of-final-destination-bloodlines.jpg',
            // 2. Deadpool Wolf
            'https://posterspy.com/wp-content/uploads/2024/02/Small_Deadpool.jpg',
            // 3. Sonic 3
            'https://awsimages.detik.net.id/community/media/visual/2024/12/21/film-sonic-the-hedgehog-3.jpeg?w=1200',
            // 4. How to Train Your Dragon
            'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/186/2025/06/12/SnapInstato_484172632_1194166242069867_4997920814465953827_n-3063589337.jpg',
            // 5. Venom
            'https://posterspy.com/wp-content/uploads/2024/10/Venom-The-Last-Dance-Poster.jpg',
            // 6. Minecraft
            'https://musicart.xboxlive.com/7/5a1c6e00-0000-0000-0000-000000000002/504/image.jpg',
            // 7. Exhuma
            'https://awsimages.detik.net.id/community/media/visual/2024/03/01/exhuma_34.png?w=1200&q=90',
        ];
        // Buat Data film dummy
        for ($i = 0; $i < count($titles); $i++) {
            Movie::create([
                'title' => $titles[$i % count($titles)],
                'director' => fake()->name(),
                'genre' => fake()->randomElement([
                    'Action & Comedy',
                    'Horror',
                    'Sci-Fi',
                    'Drama & Thriller',
                    'Crime'
                ]),
                'release_year' => fake()->numberBetween(2000, date('Y')),
                'synopsis' => fake()->paragraph(10),
                'poster_url' => $posterURLS[$i % count($posterURLS)],
            ]);
        }
    }
}
