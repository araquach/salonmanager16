<?php

namespace App\Http\Controllers;

use App\SickDay;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AdminSickDayFormRequest;
use Auth;
use Carbon\Carbon;

class AdminSickDayController extends Controller
{
    
    public function __construct(SickDay $sickDay)
	{
		$this->middleware('admin');
		
		$this->sickDay = $sickDay;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		$sickDays = SickDay::all();
		return View('/sickDay/admin/index', compact('sickDays'));
	}
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
	{
		return View('/sickDay/admin/create');
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SickDayFormRequest  $request
     * @return \Illuminate\Http\Response
     */
	public function store()
	{
		$input = $request->all();
		
	    SickDay::create($input);
		
		return Redirect::action('AdminSickDayController@index');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  \App\SickDay  $sickDay
     * @return \Illuminate\Http\Response
     */
    public function show(SickDay $sickDay) {
		return View('sickDay.admin.view', compact('sickDay'));
	}
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SickDay  $sickDay
     * @return \Illuminate\Http\Response
     */
	public function edit(SickDay $sickDay)
    {
        return view('sickDay.admin.update', compact('sickDay'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminSickDayFormRequest  $request
     * @param  \App\SickDay  $sickDay
     * @return \Illuminate\Http\Response
     */
    public function update(SickDayFormRequest $request, SickDay $sickDay)
    {
        $holiday->update($request->all());
        
        return redirect('admin/sick/index');
    }
    
    /**
     * Authorise the specified resource through an Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SickDay  $sickDay
     * @return \Illuminate\Http\Response
     */
    public function authorise(Request $request, SickDay $sickDay)
    {
        $holiday->update($request->all());
        
        return redirect('admin/sick/index');
    }

}
