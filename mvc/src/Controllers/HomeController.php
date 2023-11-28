<?php

namespace App\Controllers;

use App\Controller;
use App\Model;
use App\Models\IndexModel;
use App\Validator;

class HomeController extends Controller
{
    protected function makeModel(): Model {
        return new IndexModel("root", "", "user_management_system", "localhost");
    }
    public function index()
    {
        $this->render('index');
    }

    public function login() {
        $this->model = $this->makeModel();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $validator = new Validator();
        
            $validator->checkEmail($_POST['email']);
            $validator->checkPassword($_POST['password']);
            //query if user exist
            $user = $this->model->find("users", $_POST);
            
            //if user does not exist return error
            if(sizeof($user) < 1 || !password_verify($_POST['password'], $user['password'])){
                $validator->setErrorMessages('user','Email/Password incorrect.');
            }

            $this->render('index', ['errors' => $validator->getErrorMessages()]);

            if(empty($validator->getErrorMessages())){
                session_start();
                $_SESSION["session_user"]["username"] = $user["username"];
                $_SESSION["session_user"]["email"] = $user["email"];
                $_SESSION["session_user"]["role"] = $user["role"];
                session_write_close();
                header("location:/dashboard");
            }
        }
    }
}