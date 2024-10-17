<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        // Menampilkan daftar leaves dengan relasi ke user
        $leaves = Leave::with('user')->paginate(10);
        return view('admin.leaves.index', compact('leaves'));
    }

    public function create()
    {
        // Mengambil semua user untuk form
        $users = User::select('id', 'name')->get();
        return view('admin.leaves.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'start_of_date' => 'required|date',
            'end_of_date' => 'required|date|after_or_equal:start_of_date',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        // Simpan data leave baru
        Leave::create([
            'user_id' => $request->user_id,
            'description' => $request->description,
            'start_of_date' => $request->start_of_date,
            'end_of_date' => $request->end_of_date,
            'status' => $request->status,
        ]);

        return redirect()->route('leaves.index')->with('success', 'Leave created successfully.');
    }

    public function edit($id)
    {
        // Menemukan leave berdasarkan ID
        $leave = Leave::findOrFail($id);
        $users = User::select('id', 'name')->get();
        return view('admin.leaves.edit', compact('leave', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'start_of_date' => 'required|date',
            'end_of_date' => 'required|date|after_or_equal:start_of_date',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        // Update data leave
        $leave = Leave::findOrFail($id);
        $leave->update([
            'user_id' => $request->user_id,
            'description' => $request->description,
            'start_of_date' => $request->start_of_date,
            'end_of_date' => $request->end_of_date,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.leaves.index')->with('success', 'Leave updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus leave berdasarkan ID
        Leave::destroy($id);
        return redirect()->route('leaves.index')->with('success', 'Leave deleted successfully.');
    }
}
