<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;


class DataController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $from = Carbon::now()->startOfMonth()->subMonths(7)->setTime(0, 0, 0)->toDateString();
        $to = Carbon::now()->addDay()->setTime(23, 59, 59)->toDateString();

        if($request->has('from_date')){
            $from = $request->get('from_date');
        }

        if($request->has('to_date')){
            $to = $request->get('to_date');
        }

        $datas = DB::table('invoices')->selectRaw('SUM(`total`) as total, MONTH(paid_date) as paid_month')
            ->where('status', 'Paid')
            ->whereBetween('paid_date', [$from, $to])
            ->groupByRaw('MONTH(paid_date)')
            ->orderBy('paid_month')
            ->get();


        foreach ($datas as $data){
            $data->paid_month = date("M", mktime(0, 0, 0, $data->paid_month, 1));
        }


        return Response::create($datas, 200, ['Access-Control-Allow-Origin' => '*', 'Access-Control-Allow-Headers' => 'Origin, x-requested-with, Content-type, Accept', 'Content-type' => 'application/json']);

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
