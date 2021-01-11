<?php

namespace App\Http\Controllers;

use App\Medsos;
use Illuminate\Http\Request;

class MedsosController extends Controller
{
    public function admin()
    {
        return view('admin.medsos.medsos', [
            'medsos' => Medsos::latest()->get(),
        ]);
    }
    public function edit(Medsos $medsos)
    {
        return view('admin.medsos.edit', [
            'medsos' => $medsos
        ]);
    }
    public function update(Request $request, Medsos $medsos)
    {
        $medsos->facebook = $request->facebook;
        $medsos->twitter = $request->twitter;
        $medsos->instagram = $request->instagram;
        $medsos->update();
        return redirect()->to('medsos');
    }
}
