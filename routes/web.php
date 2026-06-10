<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // <-- Added for the contact form
use App\Models\Project;
use App\Models\Brand;
use App\Models\HomepageSetting;
use App\Models\Service;
use App\Models\Feature;
use App\Models\AboutUsSetting;
use App\Models\ContactMessage; // <-- Added for the contact form

// Existing Homepage Route
Route::get('/', function () {
    // Fetch projects
    $projects = Project::latest()->take(6)->get(); 
    
    // Fetch the 4 most recent brands
    $brands = Brand::latest()->take(4)->get();

    // Fetch the very first row of settings
    $homepageSetting = HomepageSetting::first();

    // Fetch all services from the database
    $services = Service::all();

    // Fetch all Offer/Feature cards from the database
    $features = Feature::all();
    
    // Pass BOTH variables to the view
    return view('welcome', compact('projects', 'brands', 'homepageSetting', 'services', 'features'));
    
});

// New About Us Route
Route::get('/about', function(){
    // Fetch the single About Us settings row
    $aboutSetting = App\Models\AboutUsSetting::first(); 
    
    // Notice the 'pages.' prefix added here!
    return view('pages.about', compact('aboutSetting'));
})->name('about');

// --- NEW: Corporate Identity Route ---
Route::view('/corporate-identity', 'corporate-identity')->name('corporate-identity');
Route::view('/our-team', 'pages.team')->name('team');
// -------------------------------------


// --- NEW: Contact Form Submit Route ---
Route::post('/contact-submit', function (Request $request) {
    // 1. Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // 2. Save it to the database
    ContactMessage::create($request->all());

    // 3. Send the user back to the page with a success message
    return back()->with('success', 'Thank you! Your message has been sent successfully. We will call you soon.');
})->name('contact.submit');
// --------------------------------------


// 1. MAIN SERVICES PAGE 
Route::get('/services', function () {
    // Fetch all services from the database so the grid loop works!
    $services = Service::all(); 
    
    return view('pages.services', compact('services'));
});

// 2. Sub-Menu Pages (Updated to point to their specific Blade files!)
Route::get('/services/custom-software', function () {
    return view('pages.custom-software'); 
});
Route::get('/services/web-application', function () {
    return view('pages.web-application');
});
Route::get('/services/mobile-application', function () {
    return view('pages.mobile-application');
});
Route::get('/services/hosting', function () {
    return view('pages.hosting');
});
Route::get('/services/e-commerce', function () {
    return view('pages.e-commerce');
});

// Contact Us Route
Route::get('/contact', function () {
    return view('pages.contact');
});

// Windows Local Development Image Fix
Route::get('/storage/{path}', function ($path) {
    $filePath = storage_path('app/public/' . $path);
    
    if (file_exists($filePath)) {
        return response()->file($filePath);
    }
    
    abort(404);
})->where('path', '.*');