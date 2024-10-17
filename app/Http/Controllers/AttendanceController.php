<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        // Menampilkan daftar kehadiran dengan user terkait
        $attendances = Attendance::with('user')->paginate(10);
        return view('admin.attendances.index', compact('attendances'));
    }

    public function create()
    {
        // Mengambil daftar user untuk dihubungkan dengan attendance
        $users = User::all();
        return view('admin.attendances.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:present,absent,late,leave',
        ]);

        // Menyimpan attendance ke database
        Attendance::create($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance created successfully.');
    }

    public function edit($id)
    {
        // Mengambil attendance berdasarkan ID
        $attendance = Attendance::findOrFail($id);
        $users = User::all();
        return view('admin.attendances.edit', compact('attendance', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:present,absent,late,leave',
        ]);

        // Update attendance berdasarkan ID
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully.');
    }

    public function destroy($id)
    {
        // Menghapus attendance
        Attendance::destroy($id);

        return redirect()->route('attendances.index')->with('success', 'Attendance deleted successfully.');
    }
}
