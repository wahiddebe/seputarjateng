<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Karesidenan;
use App\Kategori;
use App\Kota;
use App\Medsos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    public function show(Artikel $artikel)
    {
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('user.artikel', [
            'medsos' => Medsos::latest()->get(),
            'artikel' => $artikel,
            'artikel' => $artikel,
            'twitter' => Medsos::find(1),
            'today' => $today,
            'recent' => Artikel::latest()->take(3)->get(),
            'kategoris' => Kategori::get(),
            'semarang' => Kota::where('karesidenan_id', 1)->get(),
            'pekalongan' => Kota::where('karesidenan_id', 2)->get(),
            'pati' => Kota::where('karesidenan_id', 3)->get(),
            'banyumas' => Kota::where('karesidenan_id', 4)->get(),
            'kedu' => Kota::where('karesidenan_id', 5)->get(),
            'solo' => Kota::where('karesidenan_id', 6)->get(),
        ]);
    }
    public function show_karesidenan(Karesidenan $karesidenan)
    {
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $artikel = $karesidenan->artikels()->latest()->paginate(6);
        return view('user.karesidenan', [
            'karesidenan' => $karesidenan,
            'recent' => Artikel::latest()->take(3)->get(),
            'medsos' => Medsos::latest()->get(),
            'today' => $today,
            'artikel' => $artikel,
            'kategoris' => Kategori::get(),
            'semarang' => Kota::where('karesidenan_id', 1)->get(),
            'pekalongan' => Kota::where('karesidenan_id', 2)->get(),
            'pati' => Kota::where('karesidenan_id', 3)->get(),
            'banyumas' => Kota::where('karesidenan_id', 4)->get(),
            'kedu' => Kota::where('karesidenan_id', 5)->get(),
            'solo' => Kota::where('karesidenan_id', 6)->get(),
        ]);
    }
    public function show_kota(Kota $kota)
    {
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $karesidenan = Karesidenan::find($kota->karesidenan_id);
        $artikel = $kota->artikels()->latest()->paginate(6);
        return view('user.kota', [
            'kota' => $kota,
            'recent' => Artikel::latest()->take(3)->get(),
            'medsos' =>
            Medsos::latest()->get(),
            'today' => $today,
            'artikel' => $artikel,
            'karesidenan' => $karesidenan,
            'kategoris' => Kategori::get(),
            'semarang' => Kota::where('karesidenan_id', 1)->get(),
            'pekalongan' => Kota::where('karesidenan_id', 2)->get(),
            'pati' => Kota::where('karesidenan_id', 3)->get(),
            'banyumas' => Kota::where('karesidenan_id', 4)->get(),
            'kedu' => Kota::where('karesidenan_id', 5)->get(),
            'solo' => Kota::where('karesidenan_id', 6)->get(),
        ]);
    }
    public function show_kategori(Kategori $kategori)
    {
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $artikel = $kategori->artikels()->latest()->paginate(6);
        return view('user.kategori', [
            'kategori' => $kategori,
            'recent' => Artikel::latest()->take(3)->get(),
            'today' => $today,
            'medsos' => Medsos::latest()->get(),
            'artikel' => $artikel,
            'kategoris' => Kategori::get(),
            'semarang' => Kota::where('karesidenan_id', 1)->get(),
            'pekalongan' => Kota::where('karesidenan_id', 2)->get(),
            'pati' => Kota::where('karesidenan_id', 3)->get(),
            'banyumas' => Kota::where('karesidenan_id', 4)->get(),
            'kedu' => Kota::where('karesidenan_id', 5)->get(),
            'solo' => Kota::where('karesidenan_id', 6)->get(),
        ]);
    }
    public function create()
    {
        $karesidenans = Karesidenan::all();
        $kategoris = Kategori::all();

        return view('admin.artikel.create', [
            'karesidenans' => $karesidenans,
            'kategoris' => $kategoris,
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
        $slug = Str::slug(request('judul'));
        $request->validate([
            'foto_judul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        if ($request->hasFile('foto_judul')) {
            $foto_judul = $slug . '.' . $request->foto_judul->extension();
            $request->foto_judul->move(public_path('images/artikel/foto_judul'), $foto_judul);
        }
        if ($request->file('foto_judul') == null) {
            $foto_judul = null;
        }

        $artikel = new Artikel();
        $artikel->judul = $request->judul;
        $artikel->slug = $slug;
        $artikel->karesidenan_id = $request->karesidenan;
        $artikel->kota_id = $request->kota;
        $artikel->kategori_id = $request->kategori;
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
        $karesidenan_id = $artikel->karesidenan_id;
        $karesidenans = Karesidenan::all();
        $kategoris = Kategori::all();
        $kotas = Kota::where('karesidenan_id', $karesidenan_id)->get();

        return view('admin.artikel.edit', [
            'artikel' => $artikel,
            'karesidenans' => $karesidenans,
            'kotas' => $kotas,
            'kategoris' => $kategoris,
        ]);
    }
    public function update(Request $request, Artikel $artikel)

    {
        $slug = Str::slug(request('judul'));
        $request->validate([
            'foto_judul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        if ($request->hasFile('foto_judul')) {
            Storage::disk('aset')->delete('/images/artikel/foto_judul/' . $artikel->foto_judul);
            $foto_judul = $slug . '.' . $request->foto_judul->extension();
            $request->foto_judul->move(public_path('images/artikel/foto_judul'), $foto_judul);
        }
        if ($request->file('foto_judul') == null) {
            $foto_judul = $artikel->foto_judul;
        }
        $artikel->judul = $request->judul;
        $artikel->slug = $slug;
        $artikel->karesidenan_id = $request->karesidenan;
        $artikel->kota_id = $request->kota;
        $artikel->kategori_id = $request->kategori;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->foto_judul = $foto_judul;
        $artikel->update();
        return redirect()->to('/dashboard/artikel');
    }
}
