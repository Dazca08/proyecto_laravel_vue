<?php

namespace App\Http\Controllers\Riesgos;

use App\Http\Controllers\Controller;
use App\Models\User;

class RiesgosController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function getHome()
    {
        return view('riesgos.home_riesgos');
    }
}