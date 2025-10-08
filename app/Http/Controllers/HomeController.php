<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

use App\Models\populair_brands;


class HomeController extends Controller
{
    public function index()
    {
        $manuals = Manual::orderBy('visited', 'desc')->take(10)->get();
        ($manuals);

        $brands = Brand::all()->sortBy('name');
        $populairBrands = populair_brands::all();

        $popularManuals = Manual::orderBy('downloadCount', 'desc')->take(10)->get();
        
        return view('pages.homepage', [
            'brands' => $brands,
            'populairBrands' => $populairBrands,
            'developerName' => 'Petar',
            'manuals' => $manuals,
            'popularManuals' => $popularManuals
        ]);
    }
}
