<?php

namespace App\Http\Controllers;

use App\Models\GuruBk;
use App\Models\Kelas;
use App\Models\KonselingBk;
use App\Models\LayananBk;
use App\Models\Siswa;
use App\Models\siswaKonseling;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class KonselingBKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexBimbinganPribadi()
    {
        if (Route::is('pribadi-pending-index')) {
            $data = KonselingBk::where('layanan_id', 1)->where('status', 'pending')->get();
            return view('layanan-pribadi', compact('data'));
        }
        if (Route::is('pribadi-accept-index')) {
            $data = KonselingBk::where('layanan_id', 1)->where('status', 'accepted')->get();
            return view('layanan-pribadi', compact('data'));
        }
        if (Route::is('pribadi-reschedule-index')) {
            $data = KonselingBk::where('layanan_id', 1)->where('status', 're-scedule')->get();
            return view('layanan-pribadi', compact('data'));
        }
        if (Route::is('pribadi-cancel-index')) {
            $data = KonselingBk::where('layanan_id', 1)->where('status', 'canceled')->get();
            return view('layanan-pribadi', compact('data'));
        }
        
        // $data = siswaKonseling::where('konseling_bk_id', 1)->get();
        //     return view('layanan-pribadi', compact('data'));
    }

    public function indexBimbinganSosial()
    {
        $layananBk = LayananBk::all();
        $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
        $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 

        $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
            ->where('wali_kelas_id', $walas->wali_kelas_id)
            ->get(); 


        return view('layanan-sosial', compact('layananBk', 'konselingBk'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function createBimbinganPribadi()
    {
        
        $userId = Auth()->id();
        $guru = GuruBk::where('user_id', $userId)->first();
        $kelas = Kelas::where('guru_bk_id', $guru->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        $jenis_layanan = LayananBk::all();
        return view('create-pribadi', compact('jenis_layanan', 'siswa'));
    }

    public function createBimbinganSosial()
    {
        
        $userId = Auth()->id();
        $guru = GuruBk::where('user_id', $userId)->first();
        $kelas = Kelas::where('guru_bk_id', $guru->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        $jenis_layanan = LayananBk::all();
        return view('create-sosial', compact('jenis_layanan', 'siswa'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topik' => 'required',
            'layanan' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_berakhir' => 'required',
            'lokasi' => 'required',
            'siswa' => 'required|array',
        ]);

        $validated = $request->validate([
            'topik' => 'required',
            'layanan' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_berakhir' => 'required',
            'lokasi' => 'required',
            'siswa' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $layanan = LayananBk::where('jenis_layanan', $request->input('layanan'))->first();
        $guru = GuruBk::where('user_id', Auth()->id())->first();
        $walas = Kelas::where('guru_bk_id', $guru->id)->first();

        $layanan = KonselingBk::create([
            'topik' => $request->input('topik'),
            'guru_bk_id' => $walas->guru_bk_id,
            'wali_kelas_id' => $walas->wali_kelas_id,
            'layanan_id' => $layanan->id,
            'tanggal' => $request->input('tanggal'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_berakhir' => $request->input('jam_berakhir'),
            'tempat' => $request->input('lokasi'),
            'status' => 'accepted'
        ]);

        foreach ($validated['siswa'] as $siswa) {
            siswaKonseling::create([
                'siswa_id' => $siswa,
                'konseling_bk_id' => $layanan->id
            ]);
        }

        return redirect()->route('dashboard.index')->with('success', 'Siswa berhasil ditambahkan.');
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
        
    }

    public function acc(string $id)
    {
        $konseling = KonselingBk::find($id);
        $konseling->update(
            [
                'status'=>'accepted'
            ]
            );
            
        return redirect()->back()->with('success', 'Jadwal Telah Di acc');
    }

    public function reschedule(string $id)
    {
        $konseling = KonselingBk::find($id);
        $konseling->update(
            [
                'status'=>'accepted'
            ]
            );
            
        return redirect()->back()->with('success', 'Jadwal Telah Di acc');
    }

    public function reject(string $id)
    {
        $konseling = KonselingBk::find($id);
        $konseling->update(
            [
                'status'=>'canceled'
            ]
            );
            
        return redirect()->back()->with('success', 'Jadwal Telah Di tolak');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
