<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::paginate(10);
        return view('data-kamar', compact('kamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required|string|max:255|unique:kamars',
            'status_kamar' => 'required|in:ON,OFF',
        ]);

        Kamar::create($request->all());
        return redirect()->back()->with('status', 'Kamar berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return response()->json($kamar);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_kamar' => 'required|string|max:255',
            'status_kamar' => 'required|string|in:ON,OFF',
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->update($request->all());

        return redirect()->route('kamars.index')->with('status', 'Kamar berhasil diperbarui!');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->back()->with('status', 'Kamar berhasil dihapus!');
    }
}
