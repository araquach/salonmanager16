<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AdminHolidayFormRequest;
use Auth;
use Carbon\Carbon;

class AdminHolidayController extends Controller
{
    
    public function __construct(Holiday $holiday)
	{
		$this->middleware('admin');
		
		$this->holiday = $holiday;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		$holidays = Holiday::all();
		return View('/holiday/admin/index', compact('holidays'));
	}
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
	{
		return View('/holiday/admin/create');
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\HolidayFormRequest  $request
     * @return \Illuminate\Http\Response
     */
	public function store()
	{
		$input = $request->all();
		
	    Holiday::create($input);
		
		return Redirect::action('AdminHolidayController@index');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function show(Holiday $holiday) {
		return View('holiday.admin.view', compact('holiday'));
	}
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
	public function edit(Holiday $holiday)
    {
        return view('holiday.admin.update', compact('holiday'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminHolidayFormRequest  $request
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(AdminHolidayFormRequest $request, Holiday $holiday)
    {
        $holiday->update($request->all());
        
        return redirect('admin/holiday/index');
    }
    
    /**
     * Authorise the specified resource through an Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function authorise(Request $request, Holiday $holiday)
    {
        $holiday->update($request->all());
        
        return redirect('admin/holiday/index');
    }

}
