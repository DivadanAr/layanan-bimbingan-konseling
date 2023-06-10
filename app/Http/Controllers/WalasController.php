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
        $imgname = $request->input('nama').$request->input('nipd').'.'.$extention;

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
    public function update(Request $request, Walas $walas)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nipd' => 'required',
            'kelamin' => 'required',
            'kelas' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'photo' => 'nullable',
            'email' => ['required', 'email', Rule::unique('users')->ignore($walas->user_id)],
            'password' => 'required|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $walas->nama = $request->input('nama');
        $walas->nipd = $request->input('nipd');
        $walas->tanggal_lahir = $request->input('tanggal_lahir');
        $walas->kelamin = $request->input('kelamin');
        $walas->telepon = $request->input('telepon');
    
        if ($request->hasFile('photo')) {
            $extention = $request->file('photo')->extension();
            $imgname = $request->input('nama') . $request->input('nipd') . '.' . $extention;
    
            $this->validate($request, ['photo' => 'required']);
            $path = Storage::putFileAs('public/profile-photos', $request->file('photo'), $imgname);
    
            $walas->foto = $imgname;
            $walas->user->profile_photo_path = $imgname;
        }
    
        $walas->save();
    
        $walas->user->update([
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    
        $data = Kelas::findOrFail($request->input('kelas'));
        $data->wali_kelas_id = $walas->id;
        $data->save();
    
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
