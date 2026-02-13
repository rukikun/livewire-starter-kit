<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display the landing page with categories.
     */
    public function index()
    {
        try {
            $categories = Category::withCount('documents')
                                 ->ordered()
                                 ->get();
            
            // Debug: Log the categories count
            \Log::info('Categories count: ' . $categories->count());
            
            return view('landing', compact('categories'));
        } catch (\Exception $e) {
            \Log::error('Error fetching categories: ' . $e->getMessage());
            // Return view without categories if there's an error
            return view('landing', ['categories' => collect()]);
        }
    }
}
