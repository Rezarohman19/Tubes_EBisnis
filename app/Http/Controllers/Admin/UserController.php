<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::withCount('orders')->latest();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->paginate(20)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->load([
            'orders' => function ($q) {
                $q->latest()->take(10);
            }
        ]);

        return view('admin.users.show', compact('user'));
    }

    public function toggleRole(User $user)
    {
        // ✅ lebih aman pake optional()
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Tidak bisa mengubah role akun sendiri.');
        }

        $user->update([
            'role' => $user->role === 'admin' ? 'user' : 'admin'
        ]);

        return back()->with('success', 'Role pengguna berhasil diubah.');
    }
}