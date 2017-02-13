<?php

namespace App\Http\Controllers;

use App\SickDay;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SickDayFormRequest;
use Auth;
use Carbon\Carbon;

class SickDayController extends Controller
{
    
    public function __construct(SickDay $sickDay)
	{
		$this->middleware('auth');
		
		$this->sickDay = $sickDay;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
		$sickDays = SickDay::where('staff_id', '=', $user->id)->get();
        
        return view('sickDay/index', compact('sickDays'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SickDay $sickDay)
    {
        return view('sickDay.view', compact('sickDay'));
    }
    
    
    // Admin Pages
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
	{
		$sickDays = SickDay::all();
		return View('/sickDay/admin/index', compact('sickDays'));
	}
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminCreate()
	{
		return View('/sickDay/admin/create');
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function adminStore()
	{
		$input = $request->all();
		
	    SickDay::create($input);
		
		return Redirect::action('SickDayController@showAdminIndex');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminShow(SickDay $sickDay) {
		return View('sickDay.admin.view', compact('sickDay'));
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
    public function adminUpdate(Request $request, $id)
    {
        //
    }
    
    
	
	
    
}
