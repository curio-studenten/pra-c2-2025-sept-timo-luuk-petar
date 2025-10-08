<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {
        $brand = Brand::findOrFail($brand_id);

        $manuals = Manual::where('brand_id', $brand_id)->get();

        $popularManuals = Manual::where('brand_id', $brand_id)
            ->orderBy('downloadCount', 'desc')
            ->take(5)
            ->get();

        $manualBrandnames = $manuals->load('brand')
            ->pluck('brand.name')
            ->unique()
            ->implode(', ');

        return view('pages.manual_list', [
            'brand' => $brand,
            'manuals' => $manuals,
            'popularManuals' => $popularManuals,
            'manualBrandnames' => $manualBrandnames
        ]);
    }
}
