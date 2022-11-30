<?php

namespace App\Http\Controllers;

use App\Http\Controllers\backend\BackendBaseController;
use Illuminate\Http\Request;

class HomeController extends BackendBaseController
{
    protected $route ='home';
    protected $panel ='Dashboard';
    protected $view ='home';
    protected $title;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {

        $this->title='Admin';
//        $data['product']=Product::where('status',1)->count();
//        $data['users']=User::where('status',0)->count();
//        $data['admin']=User::where('status',1)->count();
//        dd();
        return view($this->__loadDataToView('backend.adminHome'));

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//    public function managerHome()
//    {
//        return view('managerHome');
//    }
}
