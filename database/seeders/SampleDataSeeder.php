<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Product;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Sample Services
        $services = [
            [
                'name' => 'General Wellness Check-up',
                'description' => 'Comprehensive physical examination, vaccination review, and health assessment for your pet.',
                'price' => 800.00,
                'duration' => 30,
                'is_available' => true
            ],
            [
                'name' => 'Vaccination',
                'description' => 'Essential vaccines to protect your pet against common diseases.',
                'price' => 1200.00,
                'duration' => 20,
                'is_available' => true
            ],
            [
                'name' => 'Dental Cleaning',
                'description' => 'Professional teeth cleaning, scaling, and oral health assessment.',
                'price' => 2500.00,
                'duration' => 60,
                'is_available' => true
            ],
            [
                'name' => 'Grooming Service',
                'description' => 'Complete grooming package including bath, nail trimming, and hair styling.',
                'price' => 1500.00,
                'duration' => 90,
                'is_available' => true
            ],
            [
                'name' => 'Surgery - Spay/Neuter',
                'description' => 'Professional surgical sterilization procedure with post-operative care.',
                'price' => 5000.00,
                'duration' => 120,
                'is_available' => true
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Sample Products
        $products = [
            [
                'name' => 'Premium Dog Food',
                'description' => 'High-quality dry dog food for all breeds',
                'price' => 1200.00,
                'stock' => 50,
                'category_id' => 1
            ],
            [
                'name' => 'Cat Litter Box',
                'description' => 'Large covered litter box with carbon filter',
                'price' => 800.00,
                'stock' => 30,
                'category_id' => 2
            ],
            [
                'name' => 'Pet Shampoo',
                'description' => 'Gentle, pH-balanced shampoo for sensitive skin',
                'price' => 350.00,
                'stock' => 100,
                'category_id' => 3
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
