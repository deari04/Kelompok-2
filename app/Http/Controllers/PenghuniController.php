<?php
namespace App\Http\Controllers;

use App\Imports\PenghuniImport;  
use App\Exports\PenghuniExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Penghuni;
use App\Models\DetailPenghuni;
use Illuminate\Http\Request;


class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penghuni = Penghuni::all();
        return view('data-penghuni', compact('penghuni'))->with('penghuni', $penghuni);
    }
    

    public function indexDetail()
    {
        $penghuni = DetailPenghuni::all();
        return view('detail-datapenghuni',compact('penghuni'));
    }

    public function PenghuniExport()
    {
        return Excel::download(new PenghuniExport, 'penghuni.xlsx');
    }
    
    public function PenghuniImportexcel(Request $request){
        // Validasi file yang diupload
        $request->validate([
            "id_penghuni" => "required",
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);
    
        // Ambil file yang diupload
        $file = $request->file('file');
        $namaFile = time().'_'.$file->getClientOriginalName(); // Nama file unik untuk menghindari konflik
    
        // Simpan file di storage/app/public
        $file->storeAs('public/DataPenghuni', $namaFile);
    
        // Import data menggunakan PenghuniImport
        Excel::import(new PenghuniImport($request->id_penghuni), storage_path('app/public/DataPenghuni/'.$namaFile));
    
        // Redirect setelah import selesai
        return redirect()->route('penghuni.show', ["id" => $request->id_penghuni])->with('success', 'Data penghuni berhasil ditambahkan!');
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        Penghuni::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('dataPenghuni')->with('status', 'Data penghuni berhasil ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $detail = DetailPenghuni::where('penghuni_id', $id)->get();
        return view('detail-datapenghuni', compact('penghuni', 'detail'));
        // return view('view-penghuni', compact('penghuni', 'detail'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        return view('edit-penghuni', compact('penghuni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $penghuni = Penghuni::findOrFail($id);
        $penghuni->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('dataPenghuni')->with('status', 'Data penghuni berhasil diperbarui!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
               // Find the Penghuni record by ID
               $penghuni = Penghuni::findOrFail($id);
    
               // Delete related DetailPenghuni records
               $detailPenghuni = DetailPenghuni::where('penghuni_id', $id)->get();
               foreach ($detailPenghuni as $detail) {
                   $detail->delete();
               }
           
               // Now delete the Penghuni record
               $penghuni->delete();
           
               // Redirect with a success message
               return redirect()->route('dataPenghuni')->with('status', 'Data penghuni beserta detailnya berhasil dihapus!');
           }
}
