<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
2017-10-30 setup for urls
Home:			/
Brand:			/52/AEG/
Type:			/52/AEG/53/Superdeluxe/
Manual:			/52/AEG/53/Superdeluxe/8023/manual/
				/52/AEG/456/Testhandle/8023/manual/

If we want to add product categories later:
Productcat:		/category/12/Computers/
*/

use App\Models\Brand;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\LocaleController;

// Test route for debugging
Route::get('/debug', function () {
    return '<h1>DEBUG TEST</h1><p>If you see this, Laravel is working!</p><p>Time: ' . now() . '</p>';
});

// Homepage - SIMPLIFIED VERSION
Route::get('/', function () {
    $brands = Brand::all()->sortBy('name');
    $developerName = 'Petar';
    $currentDate = now()->format('d-m-Y');
    $totalBrands = $brands->count();
    $welcomeMessage = 'Welkom bij de 4S Manuals database!';
    
    // Return simple HTML with developer info
    $html = '<!DOCTYPE html>
<html>
<head>
    <title>Download your manual</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <h1>Download your manual</h1>
            <p>Free user guides for all brands and devices!</p>
            
            <!-- DEVELOPER INFO - TICKET 04 -->
            <div style="background: #d1ecf1; border: 2px solid #bee5eb; padding: 15px; margin: 15px 0; border-radius: 5px;">
                <h4 style="color: #0c5460; margin-top: 0;">👋 Hallo! Ik ben ' . $developerName . '</h4>
                <p style="margin: 5px 0;"><strong>Welkom:</strong> ' . $welcomeMessage . '</p>
                <p style="margin: 5px 0;"><strong>Vandaag:</strong> ' . $currentDate . '</p>
                <p style="margin: 5px 0 0 0;"><strong>Beschikbare merken:</strong> ' . $totalBrands . ' verschillende merken</p>
            </div>
        </div>
    </div>
    
    <div class="container">
        <h2>All Brands</h2>
        <div class="row">';
    
    foreach($brands->chunk(ceil($brands->count() / 3)) as $chunk) {
        $html .= '<div class="col-md-4"><ul>';
        foreach($chunk as $brand) {
            $html .= '<li><a href="/' . $brand->id . '/' . $brand->getNameUrlEncodedAttribute() . '/">' . $brand->name . '</a></li>';
        }
        $html .= '</ul></div>';
    }
    
    $html .= '</div></div></body></html>';
    
    return $html;
})->name('home');

Route::get('/manual/{language}/{brand_slug}/', [RedirectController::class, 'brand']);
Route::get('/manual/{language}/{brand_slug}/brand.html', [RedirectController::class, 'brand']);

Route::get('/datafeeds/{brand_slug}.xml', [RedirectController::class, 'datafeed']);

// Locale routes
Route::get('/language/{language_slug}/', [LocaleController::class, 'changeLocale']);

// List of manuals for a brand
Route::get('/{brand_id}/{brand_slug}/', [BrandController::class, 'show']);

// Detail page for a manual
Route::get('/{brand_id}/{brand_slug}/{manual_id}/', [ManualController::class, 'show']);

// Generate sitemaps
Route::get('/generateSitemap/', [SitemapController::class, 'generate']);
