<?php

namespace SEO\Http\Controllers;

use Illuminate\Http\Request;
use SEO\User;

class ComiteGestorController extends Controller
{
    public function index()
    {
      
    $usuarios = User::all();
    //return($usuarios[0]->secretaria);
		return view ('comite-gestor/index')->with('usuarios', $usuarios);
	}
}
