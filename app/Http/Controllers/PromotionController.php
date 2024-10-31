<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all(); // Mengambil semua data dari tabel promotions
        return view('admin.promotions.index', compact('promotions'));
    }
    
    public function create()
    {
        return view('admin.promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'month' => 'required|string',
            'category' => 'required|string',
        ]);
    
        Promotion::create([
            'title' => $request->title,
            'month' => $request->month,
            'category' => $request->category,
        ]);
    
        return redirect()->route('promotions.index')->with('success', 'Promotion added successfully');
    }
    

    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'title' => 'required',
            'month' => 'required',
            'category' => 'required'
        ]);

        $promotion->update($request->all());
        return redirect()->route('promotions.index')->with('success', 'Promotion updated successfully.');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('promotions.index')->with('success', 'Promotion deleted successfully.');
    }
}
