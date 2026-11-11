<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
class Jurusancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
                $jurusans = Jurusan::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_jurusan', 'like', "%{$search}%")
                      ->orWhere('kode_jurusan', 'like', "%{$search}%");
            })
            ->paginate(10); 

        return view('jurusan.index', compact('jurusans'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi sekaligus simpan hasilnya ke variabel $data
        $data = $request->validate([
            'kode_jurusan' => 'required|string|unique:jurusans|max:255',
            'nama_jurusan' => 'required|string|max:100',
            'keterangan'=> 'required|string|max:100',
            'status'=> 'required|string|max:50',
        ]);

        // Simpan data langsung (tanpa perlu definisikan satu-satu)
        Jurusan::create($data);

        return redirect()->route('jurusan.index')->with('success', '');
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
