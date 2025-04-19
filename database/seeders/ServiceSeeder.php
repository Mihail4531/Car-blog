<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Название 1',
                'content' => 'Контент 1',
                'is_active' => true,
                'description' => 'Описание 1',
            ],
            [
                'title' => 'Название 2',
                'content' => 'Контент 2',
                'is_active' => false,
                'description' => 'Описание 2',
            ],
            [
                'title' => 'Название 3',
                'content' => 'Контент 3',
                'is_active' => true,
                'description' => 'Описание 3',
            ],
        ];

        foreach($services as $service){
            Service::create($service);
        }
    }
}
