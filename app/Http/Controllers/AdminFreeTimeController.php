<?php

namespace App\Http\Controllers;

use App\FreeTime;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AdminFreeTimeFormRequest;
use Auth;
use Carbon\Carbon;

class AdminFreeTimeController extends Controller
{
    
    public function __construct(FreeTime $freeTime)
	{
		$this->middleware('admin');
		
		$this->freeTime = $freeTime;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		$freeTimes = FreeTime::all();
		return View('/freetime/admin/index', compact('freeTimes'));
	}
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
	{
		return View('/freeTime/admin/create');
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store()
	{
		$input = $request->all();
		
	    FreeTime::create($input);
		
		return Redirect::action('AdminFreeTimeController@index');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FreeTime $freeTime) {
		return View('freeTime.admin.view', compact('freeTime'));
	}
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function adminEdit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    
	
	
    
}
