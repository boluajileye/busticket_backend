<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusSchedule;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\BusRequest;

class BusController extends Controller
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
        $Bus = Bus::with('busschedule')->orderBy('id', 'desc')->paginate(10);
        return response()->json([
            'status' => 'success',
            'bus'=> $Bus
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
            $Bus = Bus::create($request->all());
            return response()->json([
                'status' => 'success',
                'message'=> 'Bus created successfully'
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $BusSingle = Bus::with('busschedule')->where('id', '=', $id)->first();
        return response()->json([
            'status' => 'success',
            'bus'=> $BusSingle
        ]);
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
        $Update = Bus::find($id);
        $Update->companyName = $request->companyName;
        $Update->licensePlate = $request->licensePlate;
        $Update->driverName = $request->driverName;
        $Update->busCapacity = $request->busCapacity;
        $Update->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Bus details Successfully Updated',
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
        $Bus = Bus::find($id);
        $BusDelete = $Bus->delete();
        if ($BusDelete) {
            return response()->json([
            'status' => 'success',
            'message' => 'Bus deleted',
        ]);
        } else {
            return response()->json([
                'status' => 'fail',
            'message' => 'Unable to delete bus',
            ]);
        }
        
    }
}
