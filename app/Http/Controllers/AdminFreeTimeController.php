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
     * @param  \App\Http\Requests\AdminFreeTimeFormRequest  $request
     * @return \Illuminate\Http\Response
     */
	public function store(AdminFreeTimeFormRequest $request)
	{
		$input = $request->all();
		
	    FreeTime::create($input);
		
		return Redirect::action('AdminFreeTimeController@index');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  \App\FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function show(FreeTime $freeTime) {
		return View('freeTime.admin.view', compact('freeTime'));
	}
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
	public function adminEdit(FreeTime $freeTime)
    {
        return view('freeTime.admin.update', compact('freeTime'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminFreeTimeFormRequest  $request
     * @param  \App\FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function update(AdminFreeTimeFormRequest $request, FreeTime $freeTime)
    {
        $freeTime->update($request->all());
        
        return redirect('admin/freetime/index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreeTime $freeTime)
    {
        //
    }
    
    /**
     * Authorise the specified resource through an Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FreeTime  $freeTime
     * @return \Illuminate\Http\Response
     */
    public function authorise(Request $request, FreeTime $freeTime)
    {
        $freeTime->update($request->all());
        
        return redirect('admin/freetime/index');
    }
	
	
    
}
