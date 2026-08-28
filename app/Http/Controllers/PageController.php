<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Operation;
use App\Models\Vehicle;

class PageController extends Controller
{
    public function home()
    {
        $brands = Brand::where('active', true)->withCount(['vehicles' => fn($q) => $q->where('estatus', 'activo')])->orderBy('name')->get();
        return view('pages.home', compact('brands'));
    }

    public function vehicles(?string $brandSlug = null)
    {
        $brands = Brand::where('active', true)->withCount(['vehicles' => fn($q) => $q->where('estatus', 'activo')])->orderBy('name')->get();
        $activeBrand = $brandSlug ? Brand::where('slug', $brandSlug)->firstOrFail() : $brands->first();

        $activeFamily = request('family');

        $families = collect();
        $vehicles = collect();

        if ($activeBrand) {
            $families = Vehicle::where('brand_id', $activeBrand->id)
                ->where('estatus', 'activo')
                ->select('model')
                ->distinct()
                ->orderBy('model')
                ->pluck('model');

            $query = Vehicle::where('brand_id', $activeBrand->id)->where('estatus', 'activo')->with('brand');

            if ($activeFamily) {
                $query->where('model', $activeFamily);
            }

            $query->orderBy('model')->orderBy('version');

            // Paginación más rápida: 12 por página, mantiene ?family=, solo activa si >10
            $total = (clone $query)->count();
            if ($total > 10) {
                $vehicles = $query->paginate(12)->withQueryString();
            } else {
                $vehicles = $query->get();
            }
        }

        return view('pages.vehicles', compact('brands', 'activeBrand', 'activeFamily', 'families', 'vehicles'));
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
