<?php

namespace SEO\Http\Controllers;

use Input;
use Illuminate\Http\Request;
use DB;
use SEO\Quotation;
use SEO\Http\Controllers\Controller;
use SEO\User;

class UserController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
		

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
	//arquivo retorno original
	/*$usuario = DB::select('select * from users where id=1');

	// arquivo codificado para json
	$usuario = json_encode($usuario, true);
	
	// arquivo decodificado
	$usuario = json_decode($usuario, true);
	
	$usuario[0]['name'] = "";
	$usuario[0]['sobrenome'] = "";
	$usuario[0]['name'] = "";
	$usuario[0]['estado'] = "";
	$usuario[0]['registro'] = "";
	
	$pre_registro="";
	$usuario_cadastrado="";
	$usuario_naoLocalizado="";
	//$usuario = ['name'=>'oia','sobrenome'=>'a','registro'=>'coisa', 'email'=>'heheh', ];
	
	//return $usuario;

	//return view('alterar-usuario')->with('usuario', $usuario)->with('usuario_cadastrado',$usuario_cadastrado);
	return view('alterar-usuario', ['usuario'=>$usuario])->with('usuario_cadastrado',$usuario_cadastrado)->with('pre_registro',$pre_registro)->with('usuario_naoLocalizado', $usuario_naoLocalizado);*/
        
    $usuario_cadastrado ="";
    $usuario_naoLocalizado = "";
    $pesquisaFeita = "";

    return view('alterar-usuario')->with('usuario_cadastrado',$usuario_cadastrado)->with('usuario_naoLocalizado', $usuario_naoLocalizado)->with('pesquisaFeita', $pesquisaFeita);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
		
		//$usuario = User::whereRegistro($reg)->firstOrFail();
        //return($request);
        $usuario_cadastrado ="";
        $usuario_naoLocalizado = "";
        $pesquisaFeita = "";
        
        if($request->filtro == "REGISTRO")
        {
            $usuarios[] =  User::where('registro', '=',$request->pre_registro)->get();	
            $pesquisaFeita = "ok";
             
        }
        else if($request->filtro == "NOME")
        {
            $usuarios[] =  User::where('name', 'like', '%'.$request->nome.'%')->orWhere('sobrenome', 'like', '%'.$request->nome.'%')->get();
            $pesquisaFeita = "ok";	
            
        }
        else if($request->filtro == "SECRETARIA")
        {
            $usuarios[] =  User::where('secretaria', '=', $request->secretaria)->get();	
            $pesquisaFeita = "ok";
             
        }
        else if($request->filtro == "ESTADO")
        {
            $usuarios[] =  User::where('estado', '=', $request->estado)->get();	
            $pesquisaFeita = "ok";
            
        }
        else if($request->filtro == "TIPO_USUARIO")
        {
           
            $usuarios[] =  User::where('isAdmin', '=', $request->tipoUsuario)->get();	
            $pesquisaFeita = "ok";
           
        }
        return view('alterar-usuario')->with('usuarios', $usuarios)->with('usuario_cadastrado',$usuario_cadastrado)->with('usuario_naoLocalizado', $usuario_naoLocalizado)->with('pesquisaFeita', $pesquisaFeita);

		/*$registro = $pre_registro->get("pre_registro");
		$usuario = DB::select("select * from users where registro='$registro'");
		$usuario_cadastrado=$pre_registro->get("usuario_cadastrado");*/
		if($usuario <> null)
		{
			$usuario_naoLocalizado = "";
			$usuario = json_encode($usuario, true);
			
		
			$usuario = json_decode($usuario, true);
			//return ($usuario);
			//return view('alterar-usuario');

			return view('alterar-usuario', ['usuario'=>$usuario])->with('usuario_cadastrado',$usuario_cadastrado)->with('pre_registro',$registro)->with('usuario_naoLocalizado', $usuario_naoLocalizado);
			//return ($usuario);
		}
		else
		{	$usuario_naoLocalizado = "ok" ;
			return view('alterar-usuario', ['usuario'=>$usuario])->with('usuario_cadastrado',$usuario_cadastrado)->with('pre_registro',$registro)->with('usuario_naoLocalizado', $usuario_naoLocalizado);
		};
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idRegistro)
    {
		
		$usuario = User::whereRegistro($idRegistro)->firstOrFail();
		$usuario_naoLocalizado = "" ;
		
        //$request contain your post data sent from your edit from
        //$user is an object which contains the column names of your table

        //Set user object attributes
        $usuario->name = $request['name'];
        $usuario->sobrenome = $request['sobrenome'];
        $usuario->secretaria = $request['secretaria'];
		$usuario->isAdmin = $request['isAdmin'];
		$usuario->estado = $request['estado'];
        // Save/update user. 
        // This will will update your the row in ur db.
        $usuario->save();
		
		$registro = $request['registro'];
		$usuario = DB::select("select * from users where registro='$registro'");
		$usuario = json_encode($usuario, true);
		$usuario = json_decode($usuario, true);
		$usuario_cadastrado = "";
	
		
       return view('alterar-usuario')->with('usuario', $usuario)->with('usuario_cadastrado', $usuario_cadastrado)->with('usuario_naoLocalizado', $usuario_naoLocalizado);
	   //return ($usuario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
