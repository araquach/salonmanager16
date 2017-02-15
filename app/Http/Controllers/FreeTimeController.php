<?php

namespace App\Http\Controllers;

use App\FreeTime;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\FreeTimeFormRequest;
use Auth;
use Carbon\Carbon;

class FreeTimeController extends Controller
{
    
    public function __construct(FreeTime $freeTime)
	{
		$this->middleware('auth');
		
		$this->freeTime = $freeTime;
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
			$freeTimes = FreeTime::where('staff_id', '=', $user->id)
			->where('approved', '=', 0)
			->get();
		}
		elseif($category == 'upcoming') 
		{
			$freeTimes = FreeTime::where('staff_id', '=', $user->id)
			->where('approved', '=', 2)
			->get();
		}
		elseif($category == 'denied') 
		{
			$freeTimes = FreeTime::where('staff_id', '=', $user->id)
			->where('approved', '=', 1)
			->get();
		}
		else
		{
			$freeTimes = FreeTime::where('staff_id', '=', $user->id)->get();
		}
        
        return view('freeTime/index', compact('freeTimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('freeTime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FreeTimeFormRequest $request)
    {
        $input = $request->all();
		
	    FreeTime::create($input);
	    
	    return redirect('freetime/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FreeTime $freeTime)
    {
        return view('freeTime.view', compact('freeTime'));
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

}
