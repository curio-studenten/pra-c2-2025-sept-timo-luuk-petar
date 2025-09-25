<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::all()->sortBy('name');
        
        return view('pages.homepage', [
            'brands' => $brands,
            'developerName' => 'Petar'
        ]);
    }
}
