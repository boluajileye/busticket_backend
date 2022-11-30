<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusSchedule;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\BusScheduleRequest;

class BusScheduleController extends Controller
{
    /**
     * Create a new Controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BusSchedule = BusSchedule::with('Bus')->orderBy('id', 'desc')->paginate(10);
        return response()->json([
            'status' => 'success',
            'busschedule'=> $BusSchedule
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $BusSchedule = BusSchedule::create($request->all());
            return response()->json([
                'status' => 'success',
                'message'=> 'Bus Schedule created successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'error'=> $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(BusSchedule $busSchedule)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(BusSchedule $busSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Update = BusSchedule::find($id);
        $Update->bus_id = $request->input['bus_id'];
        $Update->take_off_time = $request->take_off_time;
        $Update->drop_off_time = $request->drop_off_time;
        $Update->take_off = $request->take_off;
        $Update->destination = $request->destination;
        $Update->ticket_price = $request->ticket_price;
        $Update->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Bus Schedule Successfully Updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $BusSchedule = BusSchedule::find($id);
        $BusScheduleDelete = $BusSchedule->delete();
        if ($BusScheduleDelete) {
            return response()->json([
            'status' => 'success',
            'message' => 'Bus Schedule deleted',
        ]);
        } else {
            return response()->json([
                'status' => 'fail',
            'message' => 'Unable to delete bus Schedule',
            ]);
        }
        
    }
}
