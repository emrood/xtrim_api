<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $from = Carbon::now()->startOfMonth()->subMonth()->setTime(0, 0, 0)->toDateTimeString();
        $to = Carbon::now()->endOfMonth()->addMonth()->setTime(0, 0, 0)->toDateTimeString();

        if($request->has('from_date')){
            $from = $request->get('from_date');
        }

        if($request->has('to_date')){
            $to = $request->get('to_date');
        }
        $data = DB::table('reservations')->join('rooms', 'rooms.id', 'reservations.room_id')
            ->selectRaw('reservations.*, rooms.color')
            ->whereDate('reservations.reservation_date', '>=', $from)
            ->whereDate('reservations.reservation_date', '<=', $to)
            ->orderBy('reservations.reservation_date')->orderBy('reservations.from_time')
            ->get();

        return Response::create($data, 200, ['Access-Control-Allow-Origin' => '*', 'Access-Control-Allow-Headers' => 'Origin, x-requested-with, Content-type, Accept', 'Content-type' => 'application/json']);

//        return $data;
//        return response()->json($data, 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
