<?php

namespace SEO\Http\Controllers;

use Illuminate\Http\Request;

class ContabilidadeController extends Controller
{
     public function formularios()
    {
	
		return view ('contabilidade/formularios');
	}
	
	 public function leis_decretos()
    {
	
		return view ('contabilidade/leis_decretos');
	}
}
