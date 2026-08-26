<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Operation;
use App\Models\Vehicle;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function vehicles(?string $brandSlug = null)
    {
        $brands = Brand::where('active', true)->withCount('vehicles')->get();
        $activeBrand = $brandSlug ? Brand::where('slug', $brandSlug)->firstOrFail() : $brands->first();
        $vehicles = $activeBrand
            ? Vehicle::where('brand_id', $activeBrand->id)->where('active', true)->get()
            : collect();

        return view('pages.vehicles', compact('brands', 'activeBrand', 'vehicles'));
    }

    public function services()
    {
        return view('pages.services');
    }

    public function howWeWork()
    {
        return view('pages.how-we-work');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function operations()
    {
        $categories = Operation::where('active', true)
            ->select('category')
            ->distinct()
            ->pluck('category');

        $items = Operation::where('active', true)->get()->groupBy('category');

        return view('pages.operations', compact('categories', 'items'));
    }
}
