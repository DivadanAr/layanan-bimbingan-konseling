<?php

namespace App\Http\Controllers;

use App\Models\Kerawanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KerawananController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kerawanan = Kerawanan::all();
        return view('data-jenis-kerawanan', compact('kerawanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_kerawanan' => 'required|unique:jenis_kerawanan',
        ]);
        $request->validate([
            'jenis_kerawanan' => 'required',
        ]);

       if ($validator->fails()) {
            return response()->withErrors($validator)->withInput();
        }

        $kerawanan = Kerawanan::create([
            'jenis_kerawanan' => $request->input('jenis_kerawanan'),
        ]);

        return back()->with('success', 'Data berhasil disimpan.');
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
        $kerawanan = Kerawanan::findOrFail($id);
    
        $kerawanan->delete();
    
        return back()->with('success', 'Jenis Kerawanan '.$kerawanan->jenis_kerawanan.' bserhadi Dihapus');
    }
}
