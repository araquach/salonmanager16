<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\HolidayFormRequest;
use Auth;
use Carbon\Carbon;

class HolidayController extends Controller
{
    
    public function __construct(Holiday $holiday)
	{
		$this->middleware('auth');
		
		$this->holiday = $holiday;
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
			$holidays = Holiday::where('staff_id', '=', $user->id)
			->where('approved', '=', 0)
			->get();
		}
		elseif($category == 'upcoming') 
		{
			$holidays = Holiday::where('staff_id', '=', $user->id)
			->where('approved', '=', 2)
			->where('request_date_from', '>=', Carbon::now())
			->get();
		}
		elseif($category == 'denied') 
		{
			$holidays = Holiday::where('staff_id', '=', $user->id)
			->where('approved', '=', 1)
			->get();
		}
		else
		{
			$holidays = Holiday::where('staff_id', '=', $user->id)->get();
		}
        
        return view('holiday/index', compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('holiday.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HolidayFormRequest $request)
    {
        $input = $request->all();
		
	    Holiday::create($input);
	    
	    return redirect('holiday/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Holiday $holiday)
    {
        return view('holiday.view', compact('holiday'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Holiday $holiday )
    {
        return view('holiday.update', compact('holiday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HolidayFormRequest $request, Holiday $holiday)
    {
        $input = $request->all();
        
        $holiday->update($input);
        
        return redirect('holiday/index');
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
		$holidays = Holiday::all();
		return View('/holiday/admin/index', compact('holidays'));
	}
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminCreate()
	{
		return View('/holiday/admin/create');
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
		
	    Holiday::create($input);
		
		return Redirect::action('HolidayController@showAdminIndex');
	}
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminShow(Holiday $holiday) {
		return View('holiday.admin.view', compact('holiday'));
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
