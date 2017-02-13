<?php

namespace App\Http\Controllers;

use App\LieuHour;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\lieuHourFormRequest;
use Auth;
use Carbon\Carbon;

class LieuHourController extends Controller
{
    
    public function __construct(lieuHour $lieuHour)
	{
		$this->middleware('auth');
		
		$this->lieuHour = $lieuHour;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = null)
    {
        $user = Auth::user();
        
        if($category == 'awaiting')
		{
			$lieuHours = LieuHour::where('staff_id', '=', $user->id)
			->where('approved', '=', 0)
			->get();
		}
		elseif($category == 'upcoming') 
		{
			$lieuHours = LieuHour::where('staff_id', '=', $user->id)
			->where('approved', '=', 2)
			->where('request_date_from', '>=', Carbon::now())
			->get();
		}
		elseif($category == 'denied') 
		{
			$lieuHours = LieuHour::where('staff_id', '=', $user->id)
			->where('approved', '=', 1)
			->get();
		}
		else
		{
			$lieuHours = LieuHour::where('staff_id', '=', $user->id)->get();
		}
        
        return view('lieuHour/index', compact('lieuHours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lieuHour.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(lieuHourFormRequest $request)
    {
        $input = $request->all();
		
	    LieuHour::create($input);
	    
	    return redirect('lieuHour/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(lieuHour $lieuHour)
    {
        return view('lieuHour.view', compact('lieuHour'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    // Admin Pages
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
	{
		$lieuHours = LieuHour::all();
		return View('/lieuHour/admin/index', compact('lieuHours'));
	}
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminCreate()
	{
		return View('/lieuHour/admin/create');
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
		
	    LieuHour::create($input);
		
		return Redirect::action('LieuHourController@showAdminIndex');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminShow(lieuHour $lieuHour) {
		return View('lieuHour.admin.view', compact('lieuHour'));
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
