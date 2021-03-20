<?php

namespace Source\Controllers;

use Glauce\Request\Request;
use Glauce\Session\Flash;
use Source\Models\User;

class UserController
{

    protected $user;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function index()
    {

        $user = new User();
        $users = $user->findAll();

        return view("users.index", [
            "users" => $users
        ]);
    }

    public function create()
    {
        return view("users/create");
    }

    public function insert()
    {

        if((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['password']) && !empty($_POST['password']))){

            if($_POST['password'] === $_POST['password_confirm']){

                unset($_POST['password_confirm']);

                $user = new User();

                if(!$user->emailExists($_POST['email'])){

                    $_POST['password'] = md5($_POST['password']);

                    $user->create($_POST);
                    header("Location: ".HOME.'/user');
                }else{
                    flashMessage('E-mail já cadastrado!', 'danger');
                }

            }else{
                flashMessage('As senhas não coincidem!', 'danger');
            }

        }
    }

    public function update($id)
    {
        $id = $id['id'];

        $msgError = "";

        $user = new User();

        if(isset($_POST['name']) && !empty($_POST['name'])){

            $_POST['id'] = $id;

            if(!empty($_POST['password'])):

                if($_POST['password'] === $_POST['password_confirm']){

                    unset($_POST['password_confirm']);
                    $_POST['password'] = md5($_POST['password']);

                    $user->update($_POST);
                    redirect('admin.user');

                }else{
                    $msgError = "As senhas não coincidem!";
                }

            else:

                unset($_POST['password']);
                unset($_POST['password_confirm']);

                $user->update($_POST);
                return redirect('admin.user');

            endif;

        }

        $user = $user->find($id);

        return view("users.update", [
            "error" => $msgError,
            "user"  => $user
        ]);
    }

    public function delete($id)
    {

        $user = new User();
        $user->delete($id);
//        flashMessage('Usuário removido com sucesso!', 'danger');
        redirect('admin.user');
    }

    public function perfil()
    {
        return view('perfil', [
           "user" => (new User())->find(authUser()->id)
        ]);
    }

}