<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HolidayController extends BackendBaseController
{
    protected $route ='holiday.';
    protected $panel ='Holiday';
    protected $view ='backend.holiday.';
    protected $title;


    public function index()
    {
        $this->title= 'List';
        $data['row']=Holiday::all();
        return view($this->__loadDataToView($this->view . 'index'),compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $data['row']=Holiday::create($request->all());
        if ($data['row']){
            request()->session()->flash('success',$this->panel . 'Created Successfully');
        }else{
            request()->session()->flash('error',$this->panel . 'Creation Failed');
        }
        return redirect()->route($this->__loadDataToView('holiday.frontend'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->title= 'View';
        $data['row']=Holiday::findOrFail($id);
        return view($this->__loadDataToView('frontendindex'),compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->title= 'Edit';
        $data['row']=Holiday::findOrFail($id);
        return view($this->__loadDataToView($this->view . 'edit'),compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

    public function holiday_index(){
        $this->title= 'Edit';
        $data['row']=Holiday::where('requested_by',Auth::id())->get();

        return view($this->__loadDataToView('frontendindex'),compact('data'));


}
    public function update(Request $request, $id)
    {

        $request->request->add(['resolved_by' => auth()->user()->id]);
        $data['row'] =Holiday::findOrFail($id);
        if(!$data ['row']){
            request()->session()->flash('error','Invalid Request');
            return redirect()->route($this->__loadDataToView($this->route . 'index'));
        }
        if ($data['row']->update($request->all()))
//
        {
            $request->session()->flash('success', $this->panel .' Update Successfully');
        }
        else {
            $request->session()->flash('error', $this->panel .' Update failed');

        }
        return redirect()->route($this->__loadDataToView($this->route . 'index'));

    }



}
