<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'description' => 'Framework adalah framework aplikasi web dengan sintaks yang ekspresif, elegan. Banyak pondasi dan fitur yang tersedia, memudahkan dan mempercepat dalam membangun aplikasi web.',
            ],
            [
                'name' => 'Livewire',
                'slug' => 'livewire',
                'description' => 'Fullstack Framework untuk Laravel yang membantu membuat antarmuka dinamis dengan mudah tanpa meninggalkan kenyamanan Laravel dan tanpa menulis Javascript.',
            ],
            [
                'name' => 'Vue',
                'slug' => 'vue',
                'description' => 'Progressive Javascript Framework, framework frontend yang mudah untuk dipahami dengan performa yang baik untuk membangun antarmuka web.',
            ],
            [
                'name' => 'Javascript',
                'slug' => 'javascript',
                'description' => 'Bahasa pemrograman paling populer saat ini, yang bisa digunakan untuk server side, client side apps. Bisa web, mobile, desktop, dll.',
            ],
            [
                'name' => 'TailwindCSS',
                'slug' => 'tailwindcss',
                'description' => 'Framework CSS yang mengutamakan utilitas, membuat membangun antarmuka menjadi lebih flesibel dan mudah (tergantung).',
            ],
            [
                'name' => 'Inertia',
                'slug' => 'inertia',
                'description' => 'Sebuah paket (package) yang menyatukan aplikasi server side dan client side, tanpa API, tersedia untuk Laravel & Rails untuk server side, React, Vue, Svelte untuk client side. Slogannya Modern Monolith.',
            ],
            [
                'name' => 'Filament',
                'slug' => 'filament',
                'description' => 'Membangun aplikasi lebih cepat dengan TALL Stack. Menyediakan banyak komponen, Form Builder, Table Builder, Infolist Builder & Panel Builder.',
            ],
            [
                'name' => 'Server',
                'slug' => 'filament',
                'description' => 'Membangun aplikasi lebih cepat dengan TALL Stack. Menyediakan banyak komponen, Form Builder, Table Builder, Infolist Builder & Panel Builder.',
            ],
        ];

        foreach ($topics as $topic) {
            Topic::updateOrCreate(['slug' => $topic['slug']], [
                'name' => $topic['name'],
                'slug' => $topic['slug'],
                'description' => $topic['description'],
            ]);
        }
    }
}
