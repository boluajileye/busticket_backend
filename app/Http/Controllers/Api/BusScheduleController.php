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
        //
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
    public function update(Request $request, BusSchedule $busSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusSchedule $busSchedule)
    {
        //
    }
}
