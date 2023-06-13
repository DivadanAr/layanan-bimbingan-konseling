<?php

namespace App\Http\Controllers;

use App\Models\GuruBk;
use App\Models\quotes;
use Illuminate\Http\Request;


class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru_bk =GuruBk::all();
        $quotes = quotes::all();

        return view('data-quotes', compact('quotes','guru_bk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('create-quotes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $userId = Auth()->id();
        $guru_bk = GuruBk::where('user_id',$userId)->first();

        $this->validate($request, [
            // 'guru_bk_id' => 'required',
            'quotes' => 'required'
        ]);

        $quotes = new quotes();
        $quotes->guru_bk_id = $guru_bk->id;
        $quotes->quotes = $request->input('quotes');
        $quotes->save();

        return redirect()->route('quotes.index')->with('success', 'Quote created successfully');    
    }

    /**
     * Display the specified resource.
     */
    public function show(quotes $id)
    {


        $quotes = quotes::latest()->first(); 
        $guru_bk = GuruBk::latest()->first();

        return view('users.home', compact('quotes','guru_bk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quotes = quotes::findOrFail($id);
        // $guru_bk = GuruBk::all();
    
        return view('edit-quotes', compact('quotes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userId = Auth()->id();
        $guru_bk = GuruBk::where('user_id',$userId)->first();

        $this->validate($request, [
            // 'guru_bk_id' => 'required',
            'quotes' => 'required'
        ]);
    
        $quotes = quotes::findOrFail($id);
        $quotes->guru_bk_id = $guru_bk->id;
        $quotes->quotes = $request->input('quotes');
        $quotes->save();
    
        return redirect()->route('quotes.index')->with('success', 'Quote updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quotes = quotes::findOrFail($id);

        $quotes->delete();
      

        return redirect()->route('quotes.index')->with('success', 'Quotes berhasil dihapus.');
    }

  
}
