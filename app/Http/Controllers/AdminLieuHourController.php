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
    public function index($category = null)
	{
		if($category == 'awaiting')
		{
			$lieuHours = LieuHour::where('approved', '=', 0)->get();
		}
		elseif($category == 'upcoming') 
		{
			$lieuHours = LieuHour::where('approved', '=', 2)->get();
		}
		elseif($category == 'denied') 
		{
			$lieuHours = LieuHour::where('approved', '=', 1)->get();
		}
		else
		{
			$lieuHours = LieuHour::get();
		}
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
     * @param  \App\Http\Requests\AdminLieuHourFormRequest  $request
     * @return \Illuminate\Http\Response
     */
	public function store(AdminLieuHourController $request)
	{
		$input = $request->all();
		
	    LieuHour::create($input);
		
		return Redirect::action('AdminLieuHourController@index');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function show(LieuHour $lieuHour) {
		return View('lieuHour.admin.view', compact('lieuHour'));
	}
	
	/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
	public function edit(LieuHour $lieuHour)
    {
        return view('lieuHour.admin.update', compact('lieuHour'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AdminLieuHourFormRequest  $request
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function update(AdminLieuHourFormRequest $request, LieuHour $lieuHour)
    {
        $lieuHour->update($request->all());
        
        return redirect('admin/lieuhour/index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(LieuHour $lieuHour)
    {
        //
    }
	
	/**
     * Authorise the specified resource through an Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LieuHour  $lieuHour
     * @return \Illuminate\Http\Response
     */
    public function authorise(Request $request, LieuHour $lieuHour)
    {
        $lieuHour->update($request->all());
        
        return redirect('admin/lieu/index');
    }
    
}
