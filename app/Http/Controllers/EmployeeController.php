<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    // Simpan user baru
    public function store(Request $request) {
        $user = User::create([
            'name' => '',
            'email' => '',
            'password' => ''
        ]);
    }

    // Tampilkan form untuk mengedit user
    public function edit(User $user) {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    // Update user yang ada
    public function update(Request $request, User $user) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            
        ]);

        $user->update($validated);
        $user->assignRole($request->input('role'));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Hapus user
    public function destroy(User $user) {
        $user->delete(); // Soft delete user
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}