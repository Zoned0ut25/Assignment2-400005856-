<?php

namespace App\Controllers;

use App\Controller;
use App\Model;
use App\Models\RegistrationModel;
use App\Validator;

class RegistrationController extends Controller
{
    protected $errors = [];

    protected function makeModel(): Model {
        return new RegistrationModel("root", "", "user_management_system", "localhost");
    }
    public function index()
    {

        $this->render('registration');
    }
    
    public function register(){
        $this->model = $this->makeModel();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $validator = new Validator();
            $usernameExist = $this->model->find("users", $_POST);
            if(sizeof($usernameExist) > 0){
                $validator->setErrorMessages('username','This username already exist!');
            }

            if(empty($_POST['username'])){
                $validator->setErrorMessages('username','Missing username');
            }
            $validator->checkEmail($_POST["email"]);
            $validator->checkPassword($_POST['password']);
            // print_r($_POST);
            $this->render('registration', ['errors' => $validator->getErrorMessages()]);
            if(empty($validator->getErrorMessages())){
                $this->model->add("users", $_POST);
                header("location:/");
            }
        }
    }
}