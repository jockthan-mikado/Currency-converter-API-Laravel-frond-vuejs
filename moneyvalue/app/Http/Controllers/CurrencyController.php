<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Requests\CurrencyRequest;


class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
    //show all currency list
    public function index()
    {
        $currency = Currency::all();
        return response()->json([
            'status' => true,
            'currencies'=> $currency,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    //function create cyrrency
    public function store(Request $request)
    {
        $request->validate([
            'currency_name' => "required",
            'exchange_code' => "required|max:3",
        ]);
        $tabCurrencies =$request->all();
        if($tabCurrencies["currency_name"] && $tabCurrencies["exchange_code"]){
            $currency = new Currency();
            $currency->currency_name = strtoupper($tabCurrencies["currency_name"]);
            $currency->exchange_code = strtoupper($tabCurrencies["exchange_code"]);


            $isCurrency_nameExist = Currency::where("currency_name",$currency->currency_name)->exists();
            $isExchange_codeExist = Currency::where("exchange_code",$currency->exchange_code)->exists();


            if( $isCurrency_nameExist ||  $isExchange_codeExist){

                return response()->json([
                    "status" => 1,
                    "message" => "currency alrady exists",
                ]);
            }else{
                $currency->save();
                return response()->json([
                    "status" => 1,
                    "message" => 'create successful',
                ],200);
            }

        }

        return response()->json([
            "status"=> 1,
            "message" => "devise crée avec succes"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //function get id currency
    public function show($id)
    {

        $currency = Currency::where("id",$id)->exists();
        if($currency){

            $info = Currency::find($id);
            return response()->json([
                "status" => 1,
                "message" => "étudiant trouvée",
                "data" => $info
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Aucune donnée trouvée",
                "data" => $currency
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

    //fucntion update currency
    public function update(Request $request, $id)
    {
        $currency = Currency::where("id",$id)->exists();
        if($currency){

            $info = Currency::find($id);
            $info->currency_name = strtoupper($request->currency_name);
            $info->exchange_code = strtoupper($request->exchange_code);

            $info->save();
            return response()->json([
                "status" => 1,
                "message" => "Mise à jour réussi",
                "data" => $info
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Devise introuvable"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //function delete currency
    public function destroy($id)
    {
        $currency = Currency::where("id",$id)->exists();
        if($currency) {
            $currency = Currency::find($id);

            $currency->delete();

            return response()->json([
                "status" => 1,
                "message" => "Suppression réussie"
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "pair introuvable"
            ]);
        }
    }
}
