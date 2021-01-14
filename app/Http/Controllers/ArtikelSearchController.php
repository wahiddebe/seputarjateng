<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use App\Kota;
use App\Medsos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArtikelSearchController extends Controller
{
    public function index(Request $request)
    {
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        if ($request->has('titlesearch')) {
            $artikel = Artikel::search($request->titlesearch)->paginate(6);
        } else {
            $artikel = Artikel::paginate(6);
        }
        return view('user.filter', [
            'artikel' => $artikel,
            'filter' => $request->titlesearch,
            'recent' => Artikel::latest()->take(3)->get(),
            'medsos' => Medsos::latest()->get(),
            'today' => $today,
            'kategoris' => Kategori::get(),
            'semarang' => Kota::where('karesidenan_id', 1)->get(),
            'pekalongan' => Kota::where('karesidenan_id', 2)->get(),
            'pati' => Kota::where('karesidenan_id', 3)->get(),
            'banyumas' => Kota::where('karesidenan_id', 4)->get(),
            'kedu' => Kota::where('karesidenan_id', 5)->get(),
            'solo' => Kota::where('karesidenan_id', 6)->get(),
        ]);
    }
}
