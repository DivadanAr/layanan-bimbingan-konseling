<?php

namespace App\Http\Controllers;

use App\Models\GuruBk;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class GuruBkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roleName = 'guru_bk'; // Ganti dengan nama peran yang Anda inginkan

        $role = Role::where('name', $roleName)->first();

        $guru = GuruBk::whereHas('user', function ($query) use ($role) {
            $query->role($role);
        })->get();

        return view('data-guru-bk', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('create-guru-bk', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nipd' => 'required',
            'kelamin' => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'photo' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $request->validate([
            'nama' => 'required',
            'nipd' => 'required',
            'kelamin' => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'photo' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $extention = $request->file('photo')->extension();
        $imgname = $request->input('nipd') . '.' . $extention;

        $this->validate($request, ['photo' => 'required']);
        $path = Storage::putFileAs('public/profile-photos', $request->file('photo'), $imgname);

        $user = User::create([
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'profile_photo_path' => $imgname
        ]);

        $user->assignRole('guru_bk');

        $guru = GuruBk::create([
            'nama' => $request->input('nama'),
            'nipd' => $request->input('nipd'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'kelamin' => $request->input('kelamin'),
            'telepon' => $request->input('telepon'),
            'foto' => $imgname,
            'user_id' => $user->id,
        ]);

        $data = Kelas::findOrFail($request->input('kelas'));

        $data->guru_bk_id = $guru->id;

        $data->save();

        return redirect()->route('guru.index')->with('success', 'Guru BK berhasil ditambahkan.');
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
        $guru = GuruBk::findOrFail($id);
        $kelas = Kelas::with('wali_kelas')->get();
        return view('edit-guru', compact('guru', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $kelas = Kelas::where('guru_bk_id', $id);
        // $kelas->guru_bk_id = null;
        // $kelas->update();


        // dd($kelas);

        // $kelas = $guruBk->kelas1;
        // foreach ($kelas as $kelasItem) {
        //     $kelasItem->guru_bk_id = $request->input('kelas_id');
        //     $kelasItem->save();
        // }

        // $data->guru_bk_id = $request->input('kelasi_id');
        // $kelasi->save();
        // $kelasi = GuruBk::findOrFail($id);
        // $data = $kelasi->kelas;

        // $kelas = Kelas::findOrFail($id);
        // $data = $guru->kelas->guru_bk_id;
        // $data = $request->all();
        // $data->save();

        // $guru1 = GuruBk::findOrFail($id);
        // $guru1->kelas->guru_bk_id = $request->input('kelas_id');
        // $data->save();
        // $guru1->update();

        // GuruBk::where($data, $id)->update([
        //     'guru_bk_id' => $request->input('kelas_id'),
        // ]);
        // dd($kelasi);

        // $kelas = Kelas::findOrFail();
        // $kelas->guru_bk_id = $request->input('kelas_id');
        // $kelas->save();

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nipd' => 'required',
            'kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'photo' => 'nullable|mimes:jpeg,jpg,png|max:1024',
            'email' => 'required',
            'kelas_id' => 'required',
            'password' => 'nullable|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $guru = GuruBk::findOrFail($id);
        $user = $guru->user;

        $user->name = $request->input('nama');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if ($request->hasFile('photo')) {
            $this->validate($request, ['photo' => 'mimes:jpeg,jpg,png|max:1024']);
            $extention = $request->file('photo')->extension();
            $imgname = $request->input('nama') . $request->input('nipd') . '.' . $extention;
            $path = Storage::putFileAs('public/profile-photos', $request->file('photo'), $imgname);
            $user->profile_photo_path = $imgname;
            $guru->foto = $imgname;
        }

        $user->save();

        $guru->nama = $request->input('nama');
        $guru->nipd = $request->input('nipd');
        $guru->tanggal_lahir = $request->input('tanggal_lahir');
        $guru->kelamin = $request->input('kelamin');
        $guru->telepon = $request->input('telepon');
        $guru->save();

        // $guruBk = GuruBk::findOrFail($id);
        // $guruBk->kelas1->guru_bk_id = null;
        // $guruBk->save();

        Kelas::where('guru_bk_id', $id)->update([
            'guru_bk_id' => null,
        ]);

        if ($request->has('kelas')) {
            $data = Kelas::findOrFail($request->input('kelas_id'));
            $data->guru_bk_id = $guru->id;
            $data->save();
        }

        $data = Kelas::findOrFail($request->input('kelas_id'));

        $data->guru_bk_id = $guru->id;

        $data->save();

        return redirect()->route('guru.index')->with('success', 'Data Guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = GuruBk::findOrFail($id);
        $user = $guru->user; // Mendapatkan akun pengguna guru$guru terkait

        $guru->delete();
        $user->delete(); // Menghapus akun pengguna

        return redirect()->route('guru.index')->with('success', 'Akun Guru BK berhasil terhapus.');
    }
}
