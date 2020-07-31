<?php

namespace SEO\Http\Controllers;

use Input;
use Illuminate\Http\Request;
use DB;
use SEO\Quotation;
use SEO\Http\Controllers\Controller;
use SEO\User;
use Illuminate\Support\Facades\Hash;

use Auth;

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
    $filtro = "";
    $usuario_atualizado = "";
    $usuario_senhaAtualizada = "";
    $usuario_secretariaAtualizada = "";
    $secretarias = array();
    return view('alterar-usuario')->with('usuario_cadastrado',$usuario_cadastrado)->with('usuario_naoLocalizado', $usuario_naoLocalizado)->with('pesquisaFeita', $pesquisaFeita)->with('filtro', $filtro)->with('usuario_atualizado', $usuario_atualizado)->with('usuario_senhaAtualizada', $usuario_senhaAtualizada)->with('secretarias', $secretarias)->with('usuario_secretariaAtualizada', $usuario_secretariaAtualizada);
   
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
        $usuario_atualizado = "";
        $usuario_senhaAtualizada = "";
        $usuario_secretariaAtualizada = "";
        $pesquisaFeita = "";
        $usuarios = array();
        $filtro = "";
        $secretarias = array();
       
        if($request->filtro == "REGISTRO")
        {
           
            $usuarios =  User::where('registro', '=',$request->pre_registro)->get();	
            $filtro = "REGISTRO";   
            $pesquisaFeita="ok";
            $i=0;
            foreach($usuarios as $usuario)
            {   
                $secretarias[$i]['registro'] = $usuario['registro'];
                $secretarias[$i]['secretarias'] =  $usuario['secretaria'];     
                $i=$i+1;
            }
        }
        else if($request->filtro == "NOME" && $request->nome != null || $request->sobrenome != null)
        {
            $usuarios =  User::where('name', 'like', '%'.$request->nome.'%')->orWhere('sobrenome', 'like', '%'.$request->nome.'%')->get();
            $filtro = "NOME";   
            $pesquisaFeita="ok";
            $i=0;
            foreach($usuarios as $usuario)
            {   
                $secretarias[$i]['registro'] = $usuario['registro'];
                $secretarias[$i]['secretarias'] =  $usuario['secretaria'];         
                $i=$i+1;
            }
          
        }
        else if($request->filtro == "SECRETARIA")
        {
            $usuarios =  User::where('secretaria', '=', $request->secretaria)->get();	
            $filtro = "SECRETARIA";
            $pesquisaFeita="ok";
            $i=0;
            foreach($usuarios as $usuario)
            {   
                $secretarias[$i]['registro'] = $usuario['registro'];
                $secretarias[$i]['secretarias'] =  $usuario['secretaria'];        
                $i=$i+1;
            }
            
          
        }
        else if($request->filtro == "STATUS")
        {
            $usuarios =  User::where('estado', '=', $request->status)->get();	
            $filtro = "STATUS";
            $pesquisaFeita="ok";
            $i=0;
            foreach($usuarios as $usuario)
            {   
                $secretarias[$i]['registro'] = $usuario['registro'];
                $secretarias[$i]['secretarias'] =  $usuario['secretaria'];      
                $i=$i+1;
            }

        }
        else if($request->filtro == "TIPO_USUARIO")
        {   
            $usuarios =  User::where('isAdmin', '=', $request->tipoUsuario)->get();	
            $filtro = "TIPO_USUARIO";
            $pesquisaFeita="ok";
            $i=0;
            foreach($usuarios as $usuario)
            {   
                $secretarias[$i]['registro'] = $usuario['registro'];
                $secretarias[$i]['secretarias'] =  $usuario['secretaria'];       
                $i=$i+1;
            }
        }
        else if($request->filtro == "TODOS")
        {
            $usuarios = User::all();		
            $filtro = "TODOS";
            $pesquisaFeita="ok";
            $i=0;
            foreach($usuarios as $usuario)
            {   
                $secretarias[$i]['registro'] = $usuario['registro'];
                $secretarias[$i]['secretarias'] =  $usuario['secretaria'];       
                $i=$i+1;
            }
        }
       
        if(sizeof($usuarios) <1)
        {
            $pesquisaFeita="";
            $usuario_naoLocalizado="ok";
            $i=0;
            /*foreach($usuarios as $usuario)
            {   
                $secretarias[$i]['registro'] = $usuario['registro'];
                $secretarias[$i]['secretarias'] =  $usuario['secretaria'];        
                $i=$i+1;
            }*/
        }
        //return($secretarias);
        return view('alterar-usuario')->with('usuarios', $usuarios)->with('usuario_cadastrado',$usuario_cadastrado)->with('usuario_naoLocalizado', $usuario_naoLocalizado)->with('pesquisaFeita', $pesquisaFeita)->with('filtro', $filtro)->with('usuario_atualizado', $usuario_atualizado)->with('usuario_senhaAtualizada', $usuario_senhaAtualizada)->with('secretarias', $secretarias)->with('usuario_secretariaAtualizada', $usuario_secretariaAtualizada);

		/*$registro = $pre_registro->get("pre_registro");
		$usuario = DB::select("select * from users where registro='$registro'");
		$usuario_cadastrado=$pre_registro->get("usuario_cadastrado");
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
		};*/
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
    public function update(Request $request)
    {
       //return($request);
        $i=0;
        $filtro="";
        $pesquisaFeita="";
        foreach($request->registro as $registro)
        {
            $usuario = User::whereRegistro($registro)->firstOrFail();

            //Set user object attributes
            $usuario->name = $request->nome[$i];
            $usuario->sobrenome = $request->sobrenome[$i];
            //$usuario->secretaria = $request->secretaria[$i];
            $usuario->isAdmin = $request->isAdmin[$i];
            $usuario->estado = $request->status[$i];
            // Save/update user. 
            // This will will update your the row in ur db.
            $usuario->save();

            $usuario_atualizado = "ok";
            $i=$i+1;
        }
       
        $secretarias= array();
           
		//$usuario = User::whereRegistro($idRegistro)->firstOrFail();
		$usuario_naoLocalizado = "" ;
		
        //$request contain your post data sent from your edit from
        //$user is an object which contains the column names of your table

       
		
		/*$registro = $request['registro'];
		$usuario = DB::select("select * from users where registro='$registro'");
		$usuario = json_encode($usuario, true);
		$usuario = json_decode($usuario, true);*/
		$usuario_cadastrado = "";
        $usuario_senhaAtualizada = "";
        $usuario_secretariaAtualizada = "";
        
       return view('alterar-usuario')->with('usuario', $usuario)->with('usuario_atualizado', $usuario_atualizado)->with('usuario_naoLocalizado', $usuario_naoLocalizado)->with('filtro', $filtro)->with('pesquisaFeita', $pesquisaFeita)->with('usuario_senhaAtualizada', $usuario_senhaAtualizada)->with('secretarias', $secretarias)->with('usuario_secretariaAtualizada', $usuario_secretariaAtualizada);
	   //return ($usuario);
    }

    public function updatePassword(Request $request)
    {
      
       
       if(strlen($request->password) >=6 && $request->password == $request->password_confirmation)
       {
        $usuario = User::whereRegistro($request->registro_alterarSenha)->firstOrFail();
        $usuario->password = Hash::make($request->get('password'));
        $usuario->save();
        $usuario_senhaAtualizada = "ok";
        

        $secretarias = array();
        $usuario = User::whereRegistro($request->registro_alterarSenha)->firstOrFail();
        $secretarias[0]['registro'] = $usuario['registro'];
        $secretarias[0]['secretarias'] =  $usuario['secretaria']; 

        $usuario_secretariaAtualizada = "";
        $usuario_cadastrado ="";
        $usuario_naoLocalizado = "";
        $pesquisaFeita = "";
        $filtro = "";
        $usuario_atualizado = "";


        return view('alterar-usuario')->with('usuario', $usuario)->with('usuario_atualizado', $usuario_atualizado)->with('usuario_naoLocalizado', $usuario_naoLocalizado)->with('filtro', $filtro)->with('pesquisaFeita', $pesquisaFeita)->with('usuario_senhaAtualizada', $usuario_senhaAtualizada)->with('secretarias', $secretarias)->with('usuario_secretariaAtualizada', $usuario_secretariaAtualizada);
    }
    else{
       return('oi');
       $this->validate($request, [
            'password'     => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:6', 'confirmed',],
        ]);
       }
    }

    public function updateSecretaria(Request $request)
    {
       
        $secretarias = "";
        $request["secretaria"] = array_unique($request["secretaria"]);
        foreach($request["secretaria"] as $secretaria){
            $secretarias =  $secretaria.";".$secretarias;
        }

        $usuario = User::whereRegistro($request->registro_alterarSecretaria)->firstOrFail();
        $usuario->secretaria = $secretarias;
        
        $usuario->save();
       
        $secretarias = array();
        $usuario = User::whereRegistro($request->registro_alterarSecretaria)->firstOrFail();
        $secretarias[0]['registro'] = $usuario['registro'];
        $secretarias[0]['secretarias'] =  $usuario['secretaria']; 
        
        $usuario_senhaAtualizada = "";
        $usuario_secretariaAtualizada = "ok";
        $usuario_cadastrado ="";
        $usuario_naoLocalizado = "";
       
        $pesquisaFeita = "";
        $filtro = "";
        $usuario_atualizado = "";
        
        return view('alterar-usuario')->with('usuario', $usuario)->with('usuario_atualizado', $usuario_atualizado)->with('usuario_naoLocalizado', $usuario_naoLocalizado)->with('filtro', $filtro)->with('pesquisaFeita', $pesquisaFeita)->with('usuario_senhaAtualizada', $usuario_senhaAtualizada)->with('secretarias', $secretarias)->with('usuario_secretariaAtualizada', $usuario_secretariaAtualizada);     
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

    public function isOnline()
    {

        return Cache::has('user-is-online-' . $this->id);

    }

    public function showProfile(Request $request, $id)
    {
        $value = $request->session()->get('key');

        //
    }

   
}
