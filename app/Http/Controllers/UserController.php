<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Ambil semua data pengguna dari tabel users
        return view('kelola-akun', compact('users')); // Kirim data pengguna ke view kelola-akun
    }


    public function create()
    {
        return view('users.create'); // Pastikan Anda memiliki file users/create.blade.php untuk form pembuatan akun.
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|string|min:6|confirmed',
    //         'role' => 'required|in:user,admin', // Pastikan role valid
    //     ]);
    
    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //         'role' => $request->role, 
    //     ]);
    
    //     // Redirect ke halaman kelola akun setelah berhasil membuat user
    //     return redirect()->route('kelolaAkun')->with('success', 'User created successfully');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:user,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('kelolaAkun')->with('status', 'User added successfully!');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id); // Mengambil user berdasarkan id
        return view('users.edit', compact('user')); // Mengirim data user ke view edit
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|in:user,admin',
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
    
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('kelolaAkun')->with('status', 'User updated successfully');
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    
        return redirect()->route('kelolaAkun')->with('status', 'User deleted successfully');
    }
    

}