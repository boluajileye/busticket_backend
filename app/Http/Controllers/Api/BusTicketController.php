<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BusTicket;
use Illuminate\Http\Request;
use Exception;
use App\Http\Request\BusTicketRequest;

class BusTicketController extends Controller
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
        $BusTicket = BusTicket::with('User')->with('BusSchedule')->orderBy('id', 'desc')->paginate(10);
        return response()->json([
            'status' => 'success',
            'busticket'=> $BusTicket
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
            $BusTicket = BusTicket::create($request->all());
            return response()->json([
                'status' => 'success',
                'message'=> 'Bus Ticket purchase Confirmed, Check Purse for Confirmation'
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
        $BusTicketSingle = BusTicket::with('User')->with('BusSchedule')->where('id', '=', $id)->first();
        return response()->json([
            'status' => 'success',
            'bus'=> $BusTicketSingle
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user($id)
    {
        $BusTicketUser = BusTicket::with('User')->with('BusSchedule')->where('user_id', '=', $id)->get();
        return response()->json([
            'status' => 'success',
            'bus'=> $BusTicketUser
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
