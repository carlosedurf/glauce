<?php

namespace Source\Controllers;

use Source\Models\User;

class UserController
{

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

        $msgError = "";

        if((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['password']) && !empty($_POST['password']))){

            if($_POST['password'] === $_POST['password_confirm']){

                unset($_POST['password_confirm']);

                $user = new User();

                if(!$user->emailExists($_POST['email'])){

                    $_POST['password'] = md5($_POST['password']);

                    $user->create($_POST);
                    header("Location: ".HOME.'/user');
                }else{
                    $msgError = "E-mail já cadastrado!";
                }

            }else{
                $msgError = "As senhas não coincidem!";
            }

        }

        return view("users/create", [
            "error" => $msgError
        ]);

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
                    header("Location: ".HOME.'/user');

                }else{
                    $msgError = "As senhas não coincidem!";
                }

            else:

                unset($_POST['password']);
                unset($_POST['password_confirm']);

                $user->update($_POST);
                header("Location: ".HOME.'/user');

            endif;

        }

        $user = $user->find($id);

        return view("users/update", [
            "error" => $msgError,
            "user"  => $user
        ]);
    }

    public function delete($id)
    {
        $user = new User();
        $user->delete($id);
        header("Location: ".HOME.'/user');
    }

}