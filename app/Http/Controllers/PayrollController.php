<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    // Menampilkan daftar payroll
    public function index()
    {
        $payroll = Payroll::with('user')->paginate(10);
        return view('admin.payrolls.index', compact('payroll'));
    }

    // Menampilkan form create payroll
    public function create()
    {
        $users = User::select('id', 'name')->get(); // Ambil data user untuk dropdown
        return view('admin.payrolls.create', compact('users'));
    }

    // Menyimpan payroll baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'salary' => 'required|numeric',
        ]);

        Payroll::create([
            'user_id' => $request->user_id,
            'salary' => $request->salary,
        ]);

        return redirect()->route('payrolls.index')->with('success', 'Payroll created successfully.');
    }

    // Menampilkan form edit payroll
    public function edit($id)
    {
        $payroll = Payroll::findOrFail($id);
        $users = User::select('id', 'name')->get();

        return view('admin.payrolls.edit', compact('payroll', 'users'));
    }

    // Mengupdate payroll
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'salary' => 'required|numeric',
        ]);

        $payroll = Payroll::findOrFail($id);
        $payroll->update([
            'user_id' => $request->user_id,
            'salary' => $request->salary,
        ]);

        return redirect()->route('payrolls.index')->with('success', 'Payroll updated successfully.');
    }

    // Menghapus payroll
    public function destroy($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->delete();

        return redirect()->route('admin.payrolls.index')->with('success', 'Payroll deleted successfully.');
    }
}
