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

        $letters = $brands->pluck('name')
            ->map(fn($name) => strtoupper(substr($name, 0, 1)))
            ->unique()
            ->sort()
            ->values();

        return view('pages.homepage', [
            'brands' => $brands,
            'populairBrands' => $populairBrands,
            'developerName' => 'Petar',
            'manuals' => $manuals,
            'popularManuals' => $popularManuals,
            'letters' => $letters
        ]);
    }

    public function showByLetter($letter)
    {
        $letter = strtoupper($letter);

        $brands = Brand::where('name', 'LIKE', $letter . '%')
            ->orderBy('name')
            ->get();

        $allBrands = Brand::all()->sortBy('name');
        $letters = $allBrands->pluck('name')
            ->map(fn($name) => strtoupper(substr($name, 0, 1)))
            ->unique()
            ->sort()
            ->values();

        return view('pages.brands_by_letter', [
            'brands' => $brands,
            'letter' => $letter,
            'letters' => $letters,
            'developerName' => 'Petar',
        ]);
    }
}
