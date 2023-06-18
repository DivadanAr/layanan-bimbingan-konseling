<?php

namespace App\Http\Controllers;

use App\Models\GuruBk;
use App\Models\quotes;
use App\Models\Siswa;
use App\Models\siswaKonseling;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    }
    public function index()
    {

        $siswa = Siswa::all();

        return response()->json($siswa);
    }

    public function show(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return response()->json($siswa);
    }
    public function history($id)
    {
        $user = User::find($id);
        $konselingBk = siswaKonseling::where('siswa_id', $user->siswa->id)->get();
        $array = [];

        foreach ($konselingBk as $item) {
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
        return response()->json(
            $array,
        );
    }
    public function qoutes($id)
    {
        // $qoutes = quotes::all();
        // return response()->json($qoutes);

        $user = quotes::all();

        // $guru_bk = $user->guru_bk;
        // $qoutes = $guru_bk->quotes;
        $array = [];

        foreach ($user as $data){
            array_push($array, [
                "guru_bk" => $data->guru_bk->nama,
                "nipd" => $data->guru_bk->nipd,
                "quotes" => $data->quotes,
            ]);
        }
        return response()->json(
            // $user->guru_bk,
            // $guru
            $array
        );


    }
    public function qoutes2()
    {
        $qoutes = quotes::all();
        return response()->json($qoutes);

        // $user = User::find($id);
        // $qoutes = quotes::where('guru_bk_id', $user->guru_bk->id)->get();
        // $array = [];

        // foreach ($qoutes as $data){
        //     array_push($array, [
        //         'guru_bk' => $data->qoutes->guru_bk->nama,
        //     ]);
        // }
        // return response()->json(
        //     $array
        // );


    }
}
