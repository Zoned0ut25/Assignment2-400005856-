<?php

namespace App\Controllers;

use App\Authentication;
use App\Controller;
use App\Model;
use App\Models\ResearchModel;
use App\Validator;

class ResearchController extends Controller
{
    protected function makeModel(): Model {
        return new ResearchModel("root", "", "user_management_system", "localhost");
    }
    public function index()
    {
        $auth = new Authentication();

        if(!$auth->isUserLoggedIn()){
            header('location: /');
        }
        
        $this->model = $this->makeModel();

        $researchers = $this->model->findAll('users');

        $this->render('research', ['researchers' => $researchers]);
    }
    
    public function display()
    {
        $auth = new Authentication();

        if(!$auth->isUserLoggedIn()){
            header('location: /');
        }
        $this->render('create-research');
    }
    public function create(){
        
        $auth = new Authentication();

        if(!$auth->isUserLoggedIn()){
            header('location: /');
        }

        $this->model = $this->makeModel();
        $validator = new Validator();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usernameExist = $this->model->find("users", $_POST);
            if(sizeof($usernameExist) > 0){
                $validator->setErrorMessages('username','This username already exist!');
            }

            if(empty($_POST['username'])){
                $validator->setErrorMessages('username','Missing username');
            }
            $validator->checkEmail($_POST["email"]);
            $validator->checkPassword($_POST['password']);
            
            if(empty($validator->getErrorMessages())){
                $this->model->add("users", $_POST);
                $_POST = array();
                $validator->setErrorMessages('success','Account was created successfully.');
            }

            $this->render('create-research', ['errors' => $validator->getErrorMessages()]);
        }
    }
}