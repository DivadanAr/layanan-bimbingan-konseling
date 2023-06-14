<?php

namespace App\Http\Controllers;

use App\Models\GuruBk;
use App\Models\Kelas;
use App\Models\KonselingBk;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

function getLoggedInUsers()
{
    $activeSessions = Session::all();
    $loggedInUsers = [];

    foreach ($activeSessions as $sessionId => $sessionData) {
        if (isset($sessionData['_login_web_'])) {
            $userId = $sessionData['_login_web_'];
            $user = User::find($userId);

            if ($user) {
                $loggedInUsers[] = $user;
            }
        }
    }

    return $loggedInUsers;
}

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $siswa = Siswa::all()->count();
       $gurubk = GuruBk::all()->count();
       $kelas = Kelas::all()->count();
       $konseling = KonselingBk::all()->count();
        return view('dashboard', compact('siswa', 'gurubk', 'kelas', 'konseling'));
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
        //
    }
}
