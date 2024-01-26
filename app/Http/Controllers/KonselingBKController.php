<?php

namespace App\Http\Controllers;

use App\Models\GuruBk;
use App\Models\Kelas;
use App\Models\KonselingBk;
use App\Models\LayananBk;
use App\Models\Siswa;
use App\Models\siswaKonseling;
use App\Models\Walas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class KonselingBKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexBimbingan()
    {
        if (Auth::user()->hasRole('siswa')) {
            if (Route::is('layanan-siswa')) {
                $layananBk = LayananBk::all();
                $siswa = Siswa::where('user_id', Auth()->id())->first();  
                $siswaAll = Siswa::all();
  
                $konselingBk = siswaKonseling::where('siswa_id', $siswa->id)->get();
    
                return view('users.coba', compact('konselingBk', 'siswaAll'));    
            }
            if (Route::is('pribadi-siswa')) {
                $layananBk = LayananBk::all();
                $siswa = Siswa::where('user_id', Auth()->id())->first();   
                $konselingBk = siswaKonseling::where('siswa_id', $siswa->id)->get();
    
                return view('users.view-private', compact('konselingBk'));    
            }
            if (Route::is('study-siswa')) {
                $layananBk = LayananBk::all();
                $siswa = Siswa::where('user_id', Auth()->id())->first();   
                $konselingBk = siswaKonseling::where('siswa_id', $siswa->id)->get();
    
                return view('users.view-study', compact('konselingBk'));    
            }

            if (Route::is('social-siswa')) {
                $layananBk = LayananBk::all();
                $siswa = Siswa::where('user_id', Auth()->id())->first();   
                $konselingBk = siswaKonseling::where('siswa_id', $siswa->id)->get();
    
                return view('users.view-social', compact('konselingBk'));    
            }

            if (Route::is('career-siswa')) {
                $layananBk = LayananBk::all();
                $siswa = Siswa::where('user_id', Auth()->id())->first();   
                $konselingBk = siswaKonseling::where('siswa_id', $siswa->id)->get();
    
                return view('users.view-career', compact('konselingBk'));    
            }
        }


        if (Auth::user()->hasRole('guru_bk')||Auth::user()->hasRole('wali_kelas')) {
            if (Route::is('layanan-bk')) {
                if (Auth::user()->hasRole('guru_bk')) {
                    $layananBk = LayananBk::all();
                    $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
                    $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
            
                    $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                        ->where('wali_kelas_id', $walas->wali_kelas_id)
                        ->get(); 
            
                    return view('layanan', compact('layananBk', 'konselingBk'));
                }
                if (Auth::user()->hasRole('wali_kelas')) {
                    $layananBk = LayananBk::all();
                    $walas = Walas::where('user_id', Auth()->id())->first(); 
                    $walas = Kelas::where('guru_bk_id', $walas->id)->first(); 
            
                    $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                        ->where('wali_kelas_id', $walas->wali_kelas_id)
                        ->get(); 
            
                    return view('layanan', compact('layananBk', 'konselingBk'));
                }
             }
    
            // pribadi
            if (Route::is('pribadi-pending-index')) {
                $layananBk = LayananBk::all();
                $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
                $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
        
                $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                    ->where('wali_kelas_id', $walas->wali_kelas_id)
                    ->where('layanan_id', 1)
                    ->where('status', 'pending')
                    ->get(); 
        
                return view('layanan', compact('layananBk', 'konselingBk'));
             }
            if (Route::is('pribadi-accept-index')) {
                $layananBk = LayananBk::all();
                $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
                $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
        
                $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                    ->where('wali_kelas_id', $walas->wali_kelas_id)
                    ->where('layanan_id', 1)
                    ->where('status', 'accepted')
                    ->get(); 
        
                return view('layanan', compact('layananBk', 'konselingBk'));
             }
             if (Route::is('pribadi-reschedule-index')) {
                $layananBk = LayananBk::all();
                $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
                $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
        
                $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                    ->where('wali_kelas_id', $walas->wali_kelas_id)
                    ->where('layanan_id', 1)
                    ->where('status', 're-schedule')
                    ->get(); 
        
                return view('layanan', compact('layananBk', 'konselingBk'));  
             }
             if (Route::is('pribadi-cancel-index')) {
                $layananBk = LayananBk::all();
                $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
                $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
        
                $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                    ->where('wali_kelas_id', $walas->wali_kelas_id)
                    ->where('layanan_id', 1)
                    ->where('status', 'canceled')
                    ->get(); 
        
                return view('layanan', compact('layananBk', 'konselingBk'));
                
             }
             if (Route::is('pribadi-done-index')) {
                $layananBk = LayananBk::all();
                $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
                $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
        
                $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                    ->where('wali_kelas_id', $walas->wali_kelas_id)
                    ->where('layanan_id', 1)
                    ->where('status', 'done')
                    ->get(); 
        
                return view('layanan', compact('layananBk', 'konselingBk'));
                
             }
    
            // sosial
            if (Route::is('sosial-pending-index')) {
                $layananBk = LayananBk::all();
                $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
                $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
        
                $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                    ->where('wali_kelas_id', $walas->wali_kelas_id)
                    ->where('layanan_id', 2)
                    ->where('status', 'pending')
                    ->get(); 
        
                return view('layanan', compact('layananBk', 'konselingBk'));
             }
            if (Route::is('sosial-accept-index')) {
                $layananBk = LayananBk::all();
                $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
                $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
        
                $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                    ->where('wali_kelas_id', $walas->wali_kelas_id)
                    ->where('layanan_id', 2)
                    ->where('status', 'accepted')
                    ->get(); 
        
                return view('layanan', compact('layananBk', 'konselingBk'));
             }
             if (Route::is('sosial-reschedule-index')) {
                $layananBk = LayananBk::all();
                $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
                $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
        
                $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                    ->where('wali_kelas_id', $walas->wali_kelas_id)
                    ->where('layanan_id', 2)
                    ->where('status', 're-schedule')
                    ->get(); 
        
                return view('layanan', compact('layananBk', 'konselingBk'));  
             }
             if (Route::is('sosial-cancel-index')) {
                $layananBk = LayananBk::all();
                $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
                $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
        
                $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                    ->where('wali_kelas_id', $walas->wali_kelas_id)
                    ->where('layanan_id', 2)
                    ->where('status', 'canceled')
                    ->get(); 
        
                return view('layanan', compact('layananBk', 'konselingBk'));
                
             }
             if (Route::is('sosial-done-index')) {
                $layananBk = LayananBk::all();
                $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
                $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
        
                $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                    ->where('wali_kelas_id', $walas->wali_kelas_id)
                    ->where('layanan_id', 2)
                    ->where('status', 'done')
                    ->get(); 
        
                return view('layanan', compact('layananBk', 'konselingBk'));
                
             }
                 
        }

        //  karir
        if (Route::is('karir-pending-index')) {
            $layananBk = LayananBk::all();
            $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
            $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
    
            $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                ->where('wali_kelas_id', $walas->wali_kelas_id)
                ->where('layanan_id', 3)
                ->where('status', 'pending')
                ->get(); 
    
            return view('layanan', compact('layananBk', 'konselingBk'));
         }
        if (Route::is('karir-accept-index')) {
            $layananBk = LayananBk::all();
            $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
            $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
    
            $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                ->where('wali_kelas_id', $walas->wali_kelas_id)
                ->where('layanan_id', 3)
                ->where('status', 'accepted')
                ->get(); 
    
            return view('layanan', compact('layananBk', 'konselingBk'));
         }
         if (Route::is('karir-reschedule-index')) {
            $layananBk = LayananBk::all();
            $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
            $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
    
            $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                ->where('wali_kelas_id', $walas->wali_kelas_id)
                ->where('layanan_id', 3)
                ->where('status', 're-schedule')
                ->get(); 
    
            return view('layanan', compact('layananBk', 'konselingBk'));  
         }
         if (Route::is('karir-cancel-index')) {
            $layananBk = LayananBk::all();
            $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
            $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
    
            $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                ->where('wali_kelas_id', $walas->wali_kelas_id)
                ->where('layanan_id', 3)
                ->where('status', 'canceled')
                ->get(); 
    
            return view('layanan', compact('layananBk', 'konselingBk'));
            
         }
         if (Route::is('karir-done-index')) {
            $layananBk = LayananBk::all();
            $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
            $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
    
            $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                ->where('wali_kelas_id', $walas->wali_kelas_id)
                ->where('layanan_id', 3)
                ->where('status', 'done')
                ->get(); 
    
            return view('layanan', compact('layananBk', 'konselingBk'));
            
         }



          //  belajar
        if (Route::is('belajar-pending-index')) {
            $layananBk = LayananBk::all();
            $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
            $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
    
            $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                ->where('wali_kelas_id', $walas->wali_kelas_id)
                ->where('layanan_id', 4)
                ->where('status', 'pending')
                ->get(); 
    
            return view('layanan', compact('layananBk', 'konselingBk'));
         }
        if (Route::is('belajar-accept-index')) {
            $layananBk = LayananBk::all();
            $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
            $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
    
            $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                ->where('wali_kelas_id', $walas->wali_kelas_id)
                ->where('layanan_id', 4)
                ->where('status', 'accepted')
                ->get(); 
    
            return view('layanan', compact('layananBk', 'konselingBk'));
         }
         if (Route::is('belajar-reschedule-index')) {
            $layananBk = LayananBk::all();
            $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
            $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
    
            $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                ->where('wali_kelas_id', $walas->wali_kelas_id)
                ->where('layanan_id', 4)
                ->where('status', 're-schedule')
                ->get(); 
    
            return view('layanan', compact('layananBk', 'konselingBk'));  
         }
         if (Route::is('belajar-cancel-index')) {
            $layananBk = LayananBk::all();
            $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
            $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
    
            $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                ->where('wali_kelas_id', $walas->wali_kelas_id)
                ->where('layanan_id', 4)
                ->where('status', 'canceled')
                ->get(); 
    
            return view('layanan', compact('layananBk', 'konselingBk'));
            
         }
         if (Route::is('belajar-done-index')) {
            $layananBk = LayananBk::all();
            $guruBk = GuruBk::where('user_id', Auth()->id())->first(); 
            $walas = Kelas::where('guru_bk_id', $guruBk->id)->first(); 
    
            $konselingBk = KonselingBk::where('guru_bk_id', $walas->guru_bk_id)
                ->where('wali_kelas_id', $walas->wali_kelas_id)
                ->where('layanan_id', 4)
                ->where('status', 'done')
                ->get(); 
    
            return view('layanan', compact('layananBk', 'konselingBk'));
            
         }

        // $data = siswaKonseling::where('konseling_bk_id', 1)->get();
        //     return view('layanan-pribadi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $userId = Auth()->id();
        $guru = GuruBk::where('user_id', $userId)->first();
        $kelas = Kelas::where('guru_bk_id', $guru->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->get();
        $jenis_layanan = LayananBk::all();
        return view('create', compact('jenis_layanan', 'siswa'));
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

        if (Auth::user()->hasRole('guru_bk')) {
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

            $SERVER_API_KEY = 'AAAA7EUjfOY:APA91bF4Ehl-Zjk1DoA7zBtn0quGwXXJnsUdUD7_ZMI5Qaj1xJax2kr-JRExPdKTq3guoOcRC_5jlE_6PHR28eohZc9funPBiuLrwYbnceCzPkxAGK3vPKj3etzaftqrNQB4Vn5EgX3H';
    
            $data = [
                "registration_ids" => ['eHxTiJ6ET_mx5dgZjoOwBr:APA91bHiyk_jwxFumI3_1uPTtAW_wDZlyQGBcpIYtL1Hhasq-ft5KN24cmUtR7aAy62VZDLT2q1n39BjUhbnYiINMh0_xB3pckQcFvENasDnE2p4IwoO4uBbZ8r_cOqSK98xtmSSbdow'],
                "notification" => [
                    "title" => $guru->nama,
                    "body" => 'Hallo, '.$guru->nama.' ingin bertemu untuk '.$request->input('topik').' pada tanggal '.$request->input('tanggal').' dari jam '.$request->input('jam_mulai').' sampai dengan jam '.$request->input('jam_berakhir').' di '.$request->input('lokasi'),  
                ]
            ];
            $dataString = json_encode($data);
          
            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];
          
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                     
            $response = curl_exec($ch);
            // return $response;
    
            return redirect()->route('dashboard.index')->with('success', 'Siswa berhasil ditambahkan.');
        }
        
    }

    function storeSiswa(Request $request)
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
            return redirect()->back()->with('error', 'error');
        }

        $layanan = LayananBk::where('jenis_layanan', $request->input('layanan'))->first();
        $siswa = Siswa::where('user_id', Auth()->id())->first();
        $kelas = Kelas::where('id', $siswa->kelas_id)->first();

        $layanan = KonselingBk::create([
            'topik' => $request->input('topik'),
            'guru_bk_id' => $kelas->guru_bk_id,
            'wali_kelas_id' => $kelas->wali_kelas_id,
            'layanan_id' => $layanan->id,
            'tanggal' => $request->input('tanggal'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_berakhir' => $request->input('jam_berakhir'),
            'tempat' => $request->input('lokasi'),
            'status' => 'pending'
        ]);

        foreach ($validated['siswa'] as $siswa) {
            siswaKonseling::create([
                'siswa_id' => $siswa,
                'konseling_bk_id' => $layanan->id
            ]);
        }
        return redirect()->route('layanan-siswa')->with('success', 'Siswa berhasil ditambahkan.');

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

    public function reschedule(Request $request, string $id)
    {
        $konseling = KonselingBk::find($id);
        $konseling->update(
            [
                'tempat'=> $request->input('tempat'),
                'tanggal'=> $request->input('tanggal'),
                'jam_mulai'=> $request->input('jam_mulai'),
                'jam_berakhir'=> $request->input('jam_berakhir'),
                'status'=>'re-schedule'
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
    
    public function done(Request $request, string $id)
    {
        $konseling = KonselingBk::find($id);
        $konseling->update(
            [
                'hasil_konseling'=> $request->input('hasil_kesimpulan'),
                'status'=>'done'
            ]
            );
            
        return redirect()->back()->with('success', 'Jadwal Telah Selesai');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
