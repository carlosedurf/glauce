<?php

namespace Source\Controllers;

use Glauce\Authenticator\Authenticator;
use Glauce\Session\Session;
use Source\Models\User;
use Source\Requests\AuthRequest;

class AuthController
{

    public function __construct()
    {
        if(auth())
            return redirect('/');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginEnter()
    {
        $request = new AuthRequest();
        $request = $request->valid();

        if(count($request) != 2){
            flashMessage('Preencha todos os campos!');
            return redirect('login');
        }

        $request['password'] = md5($request['password']);

        $user = (new User())->where($request);

        if(!$user){
            flashMessage('E-mail e/ou senha inválidos!');
            return redirect('login');
        }

        Authenticator::addLogged($user);

        return redirect('/');

    }

    public function register()
    {
        view('auth.register');
    }

    public function registerEnter()
    {

        $request = new AuthRequest();
        $request = $request->valid();

        if(count($request) !== 4){
            flashMessage("Preencha todos os campos!");
            return redirect('redister');
        }

        if($request['password'] !== $request['password_confirm']){
            flashMessage("As senhas não coincidem!");
            return redirect('redister');
        }

        unset($request['password_confirm']);

        $request['password'] = md5($request['password']);

        $user = new User();
        $user = $user->create($request);

        Authenticator::addLogged($user);

        return redirect('/');
    }

    public function logout()
    {
        Session::clear();

        redirect('/');
    }

}