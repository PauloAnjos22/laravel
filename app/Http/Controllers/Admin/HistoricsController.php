<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;

class HistoricsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historics = User::all();
        return view('admin.historics.index', compact('historics'));
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
    public function show(User $user)
    {
            abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    
            $user->load('roles');

            if(!isset($arrLogins)) 
                $arrLogins = array();
                $nameUser = array();
                //separo toda a url e pego somente a parte final com o id
                $url = str_replace("admin/historics/", "", $_SERVER["REQUEST_URI"]);
                //$url fica com o valor de /id, portanto é necessário tirar a /
                $url = explode("/", $url);

                //pego da tabela o nome com o id identico ao recebido na url e passo esse nome pra variavel $lw
                $usuario = DB::table('historics')->select('name')->where('id', $url[1])->get();
                array_push($nameUser , $usuario);
                $lw = json_decode($nameUser[0], true);
                // var_dump($lw);

                //seleciono na tabela todos os names iguais ao nome da variavel $lw
                $logados = DB::table('historics')->select('email', 'name', 'last_login_at', 'id')->where('name',  $lw)->orderBy('id', 'DESC')->limit('2')->get();
                array_push($arrLogins, $logados);
                $ls = json_decode($arrLogins[0], true);
                return view('admin.historics.show', ['logado' => $ls]);
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
    public function update(Request $request, $id)
    {
        //
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
