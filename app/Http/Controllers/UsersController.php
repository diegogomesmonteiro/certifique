<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\RolesEnum;
use Illuminate\Http\Request;
use App\Enums\PermissionsEnum;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::whereNot('id', auth()->user()->id)
            ->orderBy('first_name')->get();
        return view('pages.users.index', ['users' => $user]);
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
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = theme()->getOption('page');
        dd($config);
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $info = $user->info;
        return view('pages.account.settings.settings', ['user' => $user, 'info' => $info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            session()->flash('danger', 'Usuário não encontrado!');
            return redirect()->back();
        }
        if ($user->id == auth()->user()->id) {
            session()->flash('danger', 'Você não pode excluir seu próprio usuário!');
            return redirect()->back();
        }
        if ($user->info) {
            $user->info->delete();
        }
        if ($user->delete()) {
            session()->flash('success', 'Usuário excluído com sucesso!');
        } else {
            session()->flash('danger', 'Erro ao excluir usuário!');
        }
        return redirect()->back();
    }

    public function alterarFuncao(Request $request)
    {
        $user = User::find($request->usuario);
        if (!$user) {
            $resposta['success'] = false;
            $resposta['message'] = 'Usuário não encontrado!';
            return json_encode($resposta);
        }
        $novaRole = RolesEnum::from($request->funcao);
        $user->syncRoles($novaRole->value);
        $resposta['success'] = true;
        $resposta['message'] = 'Função atualizada!';
        return json_encode($resposta);
    }
}
