<?php

namespace PrefCamapua\Http\Controllers\Admin;

use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\UserPasswordRequest;
use PrefCamapua\Http\Requests\UserRequest;
use PrefCamapua\Models\User;
use PrefCamapua\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAdminController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var UserRepository
     */
    private $respository;

    const ADMINISTRADOR = 1;

    /**
     * UserAdminController constructor.
     * @param User $user
     * @param UserRepository $respository
     */
    public function __construct(User $user, UserRepository $respository)
    {
        $this->user = $user;
        $this->respository = $respository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin(){
        
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->nivel->nivel == 'administrador' && auth()->user()->ativo == '1') {
                return redirect()->intended('/admin/noticias');
            }

            flash('Você não tem acesso a essa página.')->warning();
            return back();
            
        } else {
            flash()->error('Desculpe, usuário e/ou senha inválido(s).');
            return back();
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePassword()
    {
        return view('admin.user.change_password');
    }

    /**
     * @param UserPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(UserPasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = $request->password;
        $user->save();
        flash()->success('Senha Alterada com Sucesso');

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->request->add(['nivel_id' => self::ADMINISTRADOR]);
        $this->respository->create($request->all());

        flash()->success('Um novo Usuário foi cadastrado com sucesso.');

        return back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $users = $this->respository->findWhere([
            ['nivel_id', '=','1'],
            ['id', '<>', 1]
        ]);

        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->respository->find($id);

        return view('admin.user.edit', compact('user'));
    }

    public function myData()
    {
        $user = $this->respository->find(Auth::user()->id);

        return view('admin.user.myData', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        flash()->success('As Alterações do usuario foram realizadas com sucesso.');
        $this->respository->update($request->all(), $id);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
