<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends BackendBaseController
{

    protected $route ='user.';
    protected $panel ='User';
    protected $view ='backend.user.';
    protected $title;

    public function index(){
        $this->title= 'List';
        $data['row']=User::all();
        return view($this->__loadDataToView($this->view . 'index'),compact('data'));

    }



}
