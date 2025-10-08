<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\populair_brands;

class PopularBrand extends Controller
{
    public function index()
    {
        $brands = populair_brands::all();
        return view('populair_brands.index', compact('brands'));
    }
}
