<?php

namespace Controllers;

use Core\Controller;
use Models\User;

class UserController extends Controller
{

    public function index()
    {

        $user = new User();
        $users = $user->findAll();

        $this->loadTemplate("users/index", [
            "users" => $users
        ]);
    }

    public function create()
    {

        $msgError = "";

        if((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['password']) && !empty($_POST['password']))){


            $name           = addslashes($_POST['name']);
            $email          = addslashes($_POST['email']);
            $senha          = addslashes($_POST['password']);
            $senhaConfirm   = addslashes($_POST['password_confirm']);

            if($senha === $senhaConfirm){

                $user = new User();

                if(!$user->emailExists($email)){
                    $user->create($name, $email, $senha);
                    header("Location: ".HOME.'/user');
                }else{
                    $msgError = "E-mail já cadastrado!";
                }

            }else{
                $msgError = "As senhas não coincidem!";
            }

        }

        $this->loadTemplate("users/create", [
            "error" => $msgError
        ]);
    }

    public function update($id)
    {

        $msgError = "";

        $user = new User();

        if(isset($_POST['name']) && !empty($_POST['name'])){

            $name           = addslashes($_POST['name']);
            $senha          = addslashes($_POST['password']);
            $senhaConfirm   = addslashes($_POST['password_confirm']);

            if(!empty($senha)):

                if($senha === $senhaConfirm){

                    $user->update($id, $name, $senha);
                    header("Location: ".HOME.'/user');

                }else{
                    $msgError = "As senhas não coincidem!";
                }

            else:

                $user->update($id, $name);
                header("Location: ".HOME.'/user');

            endif;

        }

        $user = $user->find($id);

        $this->loadTemplate("users/update", [
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