<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class WalasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roleName = 'wali_kelas'; // Ganti dengan nama peran yang Anda inginkan

        $role = Role::where('name', $roleName)->first();

        $walas = Walas::whereHas('user', function ($query) use ($role) {
            $query->role($role);
        })->get();

        return view('data-wali-kelas', compact('walas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('create-wali-kelas', compact('kelas'));
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

        $user->assignRole('wali_kelas');

        $walas = Walas::create([
            'nama' => $request->input('nama'),
            'nipd' => $request->input('nipd'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'kelamin' => $request->input('kelamin'),
            'telepon' => $request->input('telepon'),
            'foto' => $imgname,
            'user_id' => $user->id,
        ]);

        $data = Kelas::findOrFail($request->input('kelas'));

        $data->wali_kelas_id = $walas->id;

        $data->save();

        return redirect()->route('walas.index')->with('success', 'Wali Kelas berhasil ditambahkan.');
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
        $walas = Walas::findOrFail($id);
        $kelas = Kelas::all();
        $kelasSelect = Kelas::where('wali_kelas_id', $id)->first();
        return view('edit-walas', compact('walas', 'kelas', 'kelasSelect'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nipd' => 'required',
            'kelamin' => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'photo' => 'nullable',
            'email' => 'required',
            'kelas' => 'required',
            // 'email' => ['required', 'email', Rule::unique('users')->ignore($walas->user_id)],
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $walas = Walas::findOrFail($id);
        $user = $walas->user;

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
            $walas->foto = $imgname;
        }

        $user->save();

        $walas->nama = $request->input('nama');
        $walas->nipd = $request->input('nipd');
        $walas->tanggal_lahir = $request->input('tanggal_lahir');
        $walas->kelamin = $request->input('kelamin');
        $walas->telepon = $request->input('telepon');
        $walas->save();

        // $walasBk = Walas::findOrFail($id);
        // $walasBk->kelas1->walas_bk_id = null;
        // $walasBk->save();

        Kelas::where('wali_kelas_id', $id)->update([
            'wali_kelas_id' => null,
        ]);

        if ($request->has('kelas')) {
            $data = Kelas::findOrFail($request->input('kelas'));
            $data->wali_kelas_id = $walas->id;
            $data->save();
        }

        $data = Kelas::findOrFail($request->input('kelas'));

        $data->wali_kelas_id = $walas->id;

        $data->save();

        // $walas->nama = $request->input('nama');
        // $walas->nipd = $request->input('nipd');
        // $walas->tanggal_lahir = $request->input('tanggal_lahir');
        // $walas->kelamin = $request->input('kelamin');
        // $walas->telepon = $request->input('telepon');

        // if ($request->hasFile('photo')) {
        //     $extention = $request->file('photo')->extension();
        //     $imgname = $request->input('nama') . $request->input('nipd') . '.' . $extention;

        //     $this->validate($request, ['photo' => 'required']);
        //     $path = Storage::putFileAs('public/profile-photos', $request->file('photo'), $imgname);

        //     $walas->foto = $imgname;
        //     $walas->user->profile_photo_path = $imgname;
        // }

        // $walas->save();

        // $walas->user->update([
        //     'name' => $request->input('nama'),
        //     'email' => $request->input('email'),
        //     'password' => bcrypt($request->input('password')),
        // ]);

        // $data = Kelas::findOrFail($request->input('kelas'));
        // $data->wali_kelas_id = $walas->id;
        // $data->save();

        return redirect()->route('walas.index')->with('success', 'Wali Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Walas::findOrFail($id);
        $user = $siswa->user;

        $siswa->delete();
        $user->delete();

        return redirect()->route('walas.index')->with('success', 'Akun wali kelas berhasil terhapus.');
    }
}
