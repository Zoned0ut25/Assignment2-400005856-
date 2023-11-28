<?php

namespace App\Controllers;

use App\Authentication;
use App\Controller;
use App\Model;

class StudyController extends Controller
{
    protected function makeModel(): Model {
        return new Model("root", "", "user_management_system", "localhost");
    }
    public function index()
    {
        $auth = new Authentication();

        if(!$auth->isUserLoggedIn()){
            header('location: /');
        }
        $this->render('create-study');
    }

    public function createStudy(){
        
    }
}