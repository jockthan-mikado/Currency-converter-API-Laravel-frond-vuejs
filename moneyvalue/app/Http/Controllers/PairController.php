<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use Illuminate\Http\Request;
use App\Http\Requests\PairRequest;

class PairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return 'plop';
        $pair = Pair::latest()->with('currencyFrom','currencyTo')->get();
        return response()->json([
            'status' => true,
            'currencies'=> $pair,
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'currency_id_from' => "required",
        //     'currency_id_to' => "required",
        //     'rate' => "required",
        // ]);
        // $tabPair = $request->all();

        // if($tabPair["currency_id_from"] && $tabPair["currency_id_to"]){
        //     $pairs = new Pair();
        //     $pairs->currency_id_from = $tabPair["currency_id_from"];
        //     $pairs->currency_id_to = $tabPair["currency_id_to"];

        //     $isPairFromExist = Pair::where("currency_id_from",$pairs->currency_id_from)->exists();
        //     $isPairtoExist = Pair::where("currency_id_to",$pairs->currency_id_to)->exists();

        //     dd(Pair::where("currency_id_from",$pairs->currency_id_from)->exists());
        //     if( $isPairFromExist && $isPairtoExist ){
        //         return response()->json([
        //             "status" => 1,
        //             "message" => "Pair alrady exists",
        //         ]);
        //     }else{
        //         dd($pairs);
        //         $pairs->save();
        //         return response()->json([
        //             "status" => 1,
        //             "message" => 'create successful',
        //         ],200);
        //     }

        // }



        $pairs = new Pair();
        $pairs->currency_id_from = $request->currency_id_from;
        $pairs->currency_id_to = $request->currency_id_to;
        $pairs->rate = $request->rate;

        $pairs->save();

        //renvoie de reponse personnalis??e
        return response()->json([
            "status"=> 1,
            "message" => "paire cr??e avec succes"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $pair = Pair::where("id",$id)->exists();
        if($pair){

            $info = Pair::find($id);
            return response()->json([
                "status" => 1,
                "message" => "??tudiant trouv??e",
                "data" => $info
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Aucune donn??e trouv??e",
                "data" => $pair
            ],404);
        }
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
        $pairs = Pair::where("id",$id)->exists();
        if($pairs){

            $info = Pair::find($id);
            $info->currency_id_from = strtoupper($request->currency_id_from);
            $info->currency_id_to = strtoupper($request->currency_id_to);
            $info->rate = $request->rate;

            $info->save();
            return response()->json([
                "status" => 1,
                "message" => "Mise ?? jour r??ussi",
                "data" => $info
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "paire introuvable"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pair = Pair::where("id",$id)->exists();
        if($pair) {
            $pair = Pair::find($id);

            $pair->delete();

            return response()->json([
                "status" => 1,
                "message" => "Suppression r??ussie"
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "pair introuvable"
            ]);
        }
    }

    public function convert($value, $currency_from, $currency_to){

        $info = Pair::where('currency_id_from',$currency_from)->where('currency_id_to',$currency_to)->first();

        if(!isset($info) || $info == Null){
            return response()->json([
                "status" => 0,
                "message" => "pair introuvable"
            ]);
        }

        $resultPaireInitial = $value * $info->rate;
        $resultPaireFinal = $value * (1/$info->rate);
        $info->exchange_number++;

        $info->save();

        return response()->json([
                "status" => 1,
                "message" => "r??ussie",
                "resultat1" => $resultPaireInitial,
                "resultat2" => $resultPaireFinal,
                "data" => $info
            ]);
    }
}
