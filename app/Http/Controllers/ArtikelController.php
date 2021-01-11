<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Karesidenan;
use App\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('user.artikel');
    }
    public function karesidenan()
    {
        return view('user.karesidenan');
    }
    public function admin()
    {
        $artikel = Artikel::get();
        return view('admin.artikel.artikel', [
            'artikel' => $artikel
        ]);
    }
    public function create()
    {
        $karesidenans = Karesidenan::all();

        return view('admin.artikel.create', [
            'karesidenans' => $karesidenans,
        ]);
    }
    public function getKota($id)
    {
        $kota = Kota::where('karesidenan_id', $id)->get();
        return response()->json($kota);
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('images/artikel/'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/artikel/' . $fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
    public function store(Request $request)
    {

        $request->validate([
            'foto_judul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        if ($request->hasFile('foto_judul')) {
            $foto_judul = $request->judul . '.' . $request->foto_judul->extension();
            $request->foto_judul->move(public_path('images/artikel/foto_judul'), $foto_judul);
        }
        if ($request->file('foto_judul') == null) {
            $foto_judul = null;
        }



        $artikel = new Artikel();
        $artikel->judul = $request->judul;
        $artikel->karesidenan_id = $request->karesidenan;
        $artikel->kota_id = $request->kota;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->foto_judul = $foto_judul;
        $artikel->save();
        return redirect()->to('/dashboard/artikel');
    }
    public function destroy(Artikel $artikel)
    {
        Storage::disk('aset')->delete('/images/artikel/foto_judul/' . $artikel->foto_judul);
        $artikel->delete();
        return redirect('/dashboard/artikel');
    }
    public function edit(Artikel $artikel)
    {
        $karesidenans = Karesidenan::all();
        $kotas = Kota::all();

        return view('admin.artikel.edit', [
            'artikel' => $artikel,
            'karesidenans' => $karesidenans,
            'kotas' => $kotas,
        ]);
    }
}
