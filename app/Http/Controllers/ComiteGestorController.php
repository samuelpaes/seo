<?php

namespace SEO\Http\Controllers;

use Illuminate\Http\Request;

class ComiteGestorController extends Controller
{
    public function index()
    {
	
		return view ('comite-gestor/index');
	}
}
