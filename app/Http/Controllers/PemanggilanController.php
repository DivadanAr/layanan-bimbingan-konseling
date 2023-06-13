<?php

namespace App\Http\Controllers;

use App\Models\Pemanggilan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;

class PemanggilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemanggilan $pemanggilan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemanggilan $pemanggilan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemanggilan $pemanggilan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemanggilan $pemanggilan)
    {
        //
    }

    public function exportpdf()
    {
        $data = [
            'title' => 'Welcome to Tutsmake.com',
            'date' => date('m/d/Y')
        ];
           
        $pdf = PDF::loadView('exportpdf', $data);
     
        
        $pdf->setPaper('A4', 'potrait');
        $pdf->render();
        return $pdf->stream('tutsmake.pdf');
    }
}
