<?php

namespace App\Http\Controllers;

use App\LieuHour;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AdminLieuHourFormRequest;
use Auth;
use Carbon\Carbon;

class AdminLieuHourController extends Controller
{
    
    public function __construct(LieuHour $lieuHour)
	{
		$this->middleware('admin');
		
		$this->lieuHour = $lieuHour;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		$lieuHours = LieuHour::all();
		return View('/lieuHour/admin/index', compact('lieuHours'));
	}
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
	{
		return View('/lieuHour/admin/create');
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
		
	    LieuHour::create($input);
		
		return Redirect::action('AdminLieuHourController@index');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LieuHour $lieuHour) {
		return View('lieuHour.admin.view', compact('lieuHour'));
	}
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function edit($id)
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
