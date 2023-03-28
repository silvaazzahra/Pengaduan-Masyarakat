<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use App\Http\Requests\RequestStoreOrUpdatePengaduan;
use App\Http\Requests\RequestStoreOrUpdateUser;
use App\Http\Requests\RequestStoreTanggapan;
use App\Http\Requests\RequestStoreUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $pengaduans = Pengaduan::orderByDesc('id');
    if(Auth::user()->role == 'masyarakat'){
    $pengaduans = $pengaduans->where("masyarakat_id", Auth::id());
    }
    if ($request->has('status')) {
    $pengaduans = $pengaduans->where("status", $request->status);
    }
    $pengaduans = $pengaduans->paginate(50);
    return view('dashboard.pengaduan.index', compact('pengaduans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreOrUpdatePengaduan $request)
    {
        $validated = $request->validated() + [
            'masyarakat_id' => Auth::id(),
            'created_at' => now(),
            'tgl_pengaduan' => $request->tgl_pengaduan
        ];



        if($request->hasFile('foto_bukti')){
            $fileName = time() . '.' . $request->foto_bukti->extension();
            $validated['foto_bukti'] = $fileName;

            // move file
            $request->foto_bukti->move(public_path('uploads/images'), $fileName);

        }


        $user = Pengaduan::create($validated);

        return redirect(route('pengaduan.index'))->with('success', 'Pengaduan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        return view('dashboard.pengaduan.detail', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Pengaduan::findOrFail($id);

        return view('dashboard.pengaduan.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreOrUpdateUser $request, $id)
    {
        $validated = $request->validated() + [
            'updated_at' => now(),
        ];

        $user = Pengaduan::findOrFail($id);

        $validated['avatar'] = $user->avatar;

        if($request->hasFile('avatar')){
            $fileName = time() . '.' . $request->avatar->extension();
            $validated['avatar'] = $fileName;

            // move file
            $request->avatar->move(public_path('uploads/images'), $fileName);

            // delete old file
            $oldPath = public_path('/uploads/images/'.$user->avatar);
            if(file_exists($oldPath)){
                unlink($oldPath);
            }
        }

        $user->update($validated);

        return redirect(route('users.index'))->with('success', 'Pengaduan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Pengaduan::findOrFail($id);
        // delete old file
        $oldPath = public_path('/uploads/images/'.$user->foto_bukti);
        if($user->foto_bukti && file_exists($oldPath) && $user->foto_bukti != 'avatar.png'){
            unlink($oldPath);
        }
        $user->delete();

        return redirect(route('pengaduan.index'))->with('success', 'Pengaduan berhasil dihapus.');
    }

   public function storeTanggapan(RequestStoreTanggapan $request, $pengaduanId)
   {
    $validatedPayload = $request->validated();

    $pengaduan = Pengaduan::findOrFail($pengaduanId);
    $pengaduan->update($validatedPayload);

    $payloadTanggapan = [
        'petugas_id' => Auth::id(),
        'pengaduan_id' => $pengaduanId,
        'tanggapan' => $validatedPayload['tanggapan'],
        'updated_at' => now()
    ];

    Tanggapan::updateOrCreate([
        'pengaduan_id' => $pengaduanId,
    ], $payloadTanggapan);

    return redirect()->route('pengaduan.index')->with('success', 'Tanggapan berhasil dikirim');

   }
}
