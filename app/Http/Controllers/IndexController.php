<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use App\Kota;
use App\Medsos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('user.index', [
            'medsos' => Medsos::latest()->get(),
            'today' => $today,
            'all' => Artikel::latest()->paginate(4),
            'latest_right' => Artikel::latest()->take(4)->get(),
            'latest_left' => Artikel::latest()->take(10)->get(),
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
}
