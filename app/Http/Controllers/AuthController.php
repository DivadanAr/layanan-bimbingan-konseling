<?php

namespace App\Http\Controllers;

use App\Models\GuruBk;
use App\Models\Kelas;
use App\Models\KonselingBk;
use App\Models\LayananBk;
use App\Models\quotes;
use App\Models\Siswa;
use App\Models\siswaKonseling;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        $token = $user->createToken('Personal Access Token')->plainTextToken;

        $response = ['user' => $user, 'token' => $token];

        return response()->json($response, 200);
    }

    function Login(Request $R)
    {
        $user = User::where('name', $R->name)->first();

        if ($user != 'siswa' && Hash::check($R->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = ['status' => 200, 'token' => $token, 'user' => $user, 'message' => 'Login Successfully!'];
            return response()->json($response);
        } else if ($user == 'siswa') {
            $response = ['status' => 500, 'message' => 'No account found with this username'];
        } else {
            $response = ['status' => 500, 'message' => 'Wrong username or password! please try again'];
        }

        // $credential = $R->only('name', 'password');

        // try {
        //     if (!$token = JWTAuth::attempt($credential)) {
        //         return response()->json(['error' => 'Invalid credentials'], 401);
        //     }
        // } catch (JWTException $e) {
        //     return response()->json(['error' => 'Could not created token'], 500);
        // }

        // // return $this->createNewToken($token);
        // return response()->json([
        //     'token' => $token
        // ]);
    }

    public function index()
    {

        $siswa = auth()->guard('api')->user();

        return response()->json($siswa);
    }

    public function show(string $id)
    {
        $siswa = Siswa::where('user_id', $id)->first();
        return response()->json($siswa);
    }

    public function showGuru(string $id)
    {
        $siswa = Siswa::where('user_id', $id)->first();
        $kelas = Kelas::where($siswa->kelas_id)->first();

        return response()->json($siswa, $kelas);
    }

    public function history($id)
    {
        $user = User::find($id);
        $konselingBk = siswaKonseling::where('siswa_id', $user->siswa->id)->get();
        $array = [];

        foreach ($konselingBk as $item) {
            if ($item->konselingBk->status == 'done') {
                array_push($array, [
                    "guru_bk" => $item->konselingBK->guruBK->nama,
                    "wali_kelas" => $item->konselingBK->waliKelas->nama,
                    "jenis_layanan" => $item->konselingBK->layanan->jenis_layanan,
                    "siswa_konseling" => $item->siswa->nama,
                    "topik" => $item->konselingBk->topik,
                    "tanggal" => $item->konselingBk->tanggal,
                    "jam_mulai" => $item->konselingBk->jam_mulai,
                    "jam_berakhir" => $item->konselingBk->jam_berakhir,
                    "tempat" => $item->konselingBk->tempat,
                    "hasil" => $item->konselingBk->hasil_konseling,
                    "status" => $item->konselingBk->status,
                ]);
            }
        }
        return response()->json(
            $array,
        );
    }

    public function schedule($id)
    {
        $user = User::find($id);
        $konselingBk = siswaKonseling::where('siswa_id', $user->siswa->id)->get();
        $array = [];

        foreach ($konselingBk as $item) {
            if ($item->konselingBk->status !== 'done' && $item->konselingBk->status !== 'canceled') {
                array_push($array, [
                    "guru_bk" => $item->konselingBK->guruBK->nama,
                    "wali_kelas" => $item->konselingBK->waliKelas->nama,
                    "jenis_layanan" => $item->konselingBK->layanan->jenis_layanan,
                    "siswa_konseling" => $item->siswa->nama,
                    "topik" => $item->konselingBk->topik,
                    "tanggal" => $item->konselingBk->tanggal,
                    "jam_mulai" => $item->konselingBk->jam_mulai,
                    "jam_berakhir" => $item->konselingBk->jam_berakhir,
                    "tempat" => $item->konselingBk->tempat,
                    "hasil" => $item->konselingBk->hasil_konseling,
                    "status" => $item->konselingBk->status,
                ]);
            }
        }
        return response()->json(
            $array,
        );
    }

    public function quotes()
    {
        $quotes = quotes::all();
        foreach ($quotes as $quote) {
            $guru = GuruBk::find($quote->guru_bk_id); 
            if ($guru) {
                $quote->guru_bk_id = $guru->nama;
            } else {
                $quote->guru_bk_id = "Nama Guru Tidak Diketahui";
            }
        }

        return response()->json($quotes);
    }

    public function siswaStore(Request $request)
    {    
        $siswa = Siswa::where('user_id', $request->input('user_id'))->first();
        $kelas = Kelas::where('id', $siswa->kelas_id)->first();
        $layanan = LayananBk::where('jenis_layanan', $request->input('layanan'))->first();

        $layanan = KonselingBk::create([
            'topik' => $request->input('topik'),
            'guru_bk_id' => $kelas->guru_bk_id,
            'wali_kelas_id' => $kelas->wali_kelas_id,
            'layanan_id' => $layanan->id,
            'tanggal' => Carbon::parse($request->input('tanggal')),
            'jam_mulai' => Carbon::createFromFormat('H:i', $request->input('jam_mulai')),
            'jam_berakhir' => Carbon::createFromFormat('H:i', $request->input('jam_berakhir')),
            'tempat' => $request->input('tempat'),
            'status' => 'pending'
        ]);

        $siswaId = $siswa->id; 

        if ($request->input('siswa', '')) {
            $dataSiswaInput = $request->input('siswa', '');
            $dataSiswaArray = explode(',', $dataSiswaInput);

            $dataSiswa = array_merge([$siswaId], $dataSiswaArray);
            foreach ($dataSiswa as $siswaId) {
                siswaKonseling::create([
                    'siswa_id' => $siswaId,
                    'konseling_bk_id' => $layanan->id
                ]);
            }
        } else {
            siswaKonseling::create([
                'siswa_id' => $siswaId,
                'konseling_bk_id' => $layanan->id
            ]);
        }
                
        if (json_decode(200)) {
            return response()->json(['succes']);
        } else {
            return response()->json(['gagal']);
        }
    }

}
