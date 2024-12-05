<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Service;

class PageController extends Controller
{
    public function services()
    {
        try {
            // Get all services
            $services = Service::where('is_available', true)->get();
        } catch (\Exception $e) {
            // Fallback data if database is not accessible
            $services = collect([
                [
                    'name' => 'General Wellness Check-up',
                    'description' => 'Comprehensive physical examination, vaccination review, and health assessment for your pet.',
                    'price' => 800.00,
                ],
                [
                    'name' => 'Vaccination',
                    'description' => 'Essential vaccines to protect your pet against common diseases.',
                    'price' => 1200.00,
                ],
                [
                    'name' => 'Dental Cleaning',
                    'description' => 'Professional teeth cleaning, scaling, and oral health assessment.',
                    'price' => 2500.00,
                ],
            ]);
        }
        
        return view('client.services', compact('services'));
    }

    public function products()
    {
        try {
            // Get all products
            $products = Product::paginate(12);
        } catch (\Exception $e) {
            // Fallback data if database is not accessible
            $products = collect([
                [
                    'name' => 'Premium Dog Food',
                    'description' => 'High-quality dry dog food for all breeds',
                    'price' => 1200.00,
                ],
                [
                    'name' => 'Cat Litter Box',
                    'description' => 'Large covered litter box with carbon filter',
                    'price' => 800.00,
                ],
                [
                    'name' => 'Pet Shampoo',
                    'description' => 'Gentle, pH-balanced shampoo for sensitive skin',
                    'price' => 350.00,
                ],
            ]);
        }

        return view('client.products', compact('products'));
    }

    public function about()
    {
        // Return the about us page
        return view('client.about');
    }
}
