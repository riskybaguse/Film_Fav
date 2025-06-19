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

        // List buat posternya biar ga random
        $posterURLS = [
            'https://media.thebostoncalendar.com/images/q_auto,fl_lossy/v1746718542/i6naen8z6mwfbhtxlmyv/free-advance-screening-of-final-destination-bloodlines.jpg',
            'https://posterspy.com/wp-content/uploads/2024/02/Small_Deadpool.jpg',
            'https://awsimages.detik.net.id/community/media/visual/2024/12/21/film-sonic-the-hedgehog-3.jpeg?w=1200',
            'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/186/2025/06/12/SnapInstato_484172632_1194166242069867_4997920814465953827_n-3063589337.jpg',
        ];
        // Buat Data film dummy
        for ($i = 0; $i < 4; $i++) {
            Movie::create([
                'title' => fake()->sentence(3),
                'director' => fake()->name(),
                'genre' => fake()->randomElement([
                    'Action & Comedy',
                    'Horror',
                    'Sci-Fi',
                    'Drama & Thriller'
                ]),
                'release_year' => fake()->year(),
                'synopsis' => fake()->paragraph(10),
                'poster_url' => $posterURLS[$i % count($posterURLS)],
            ]);
        }
    }
}
