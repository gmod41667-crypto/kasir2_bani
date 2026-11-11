<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Jenjang;
class Kelascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelas = Kelas::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_kelas', 'like', "%{$search}%")
                      ->orWhere('kode_kelas', 'like', "%{$search}%");
            })
            ->paginate(10); 

        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenjangs = Jenjang::all();
        $jurusans = Jurusan::all();
        return view('kelas.create', compact('jenjangs', 'jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi sekaligus simpan hasilnya ke variabel $data
        $data = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'jurusan_id' => 'required|exists:jurusans,id',
            'jenjang_id'=> 'required|exists:jenjangs,id',
            'status'=> 'required|string|max:50',
        ]);

        // Simpan data langsung (tanpa perlu definisikan satu-satu)
        Kelas::create($data);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
