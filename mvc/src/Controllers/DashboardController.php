<?php

namespace App\Controllers;

use App\Authentication;
use App\Controller;
use App\Model;

class DashboardController extends Controller
{
    protected function makeModel(): Model {
        return new Model("root", "", "user_management_system", "localhost");
    }
    public function index()
    {
        $auth = new Authentication();

        if(!$auth->isUserLoggedIn()){
            header('Location: /');
        }
        $this->render('dashboard');
    }

    public function logout(){
        $auth = new Authentication();
        $auth->logOutUser();
        header('Location: /');
    }
}