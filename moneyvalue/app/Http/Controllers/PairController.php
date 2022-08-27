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
        $pair = Pair::with('currencyFrom','currencyTo')->get();
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
        $request->validate([
            'currency_id_from' => "required",
            'currency_id_to' => "required",
            'rate' => "required",

        ]);
        $pairs = new Pair();
        $pairs->currency_id_from = $request->currency_id_from;
        $pairs->currency_id_to = $request->currency_id_to;
        $pairs->rate = $request->rate;

        $pairs->save();

        //renvoie de reponse personnalisée
        return response()->json([
            "status"=> 1,
            "message" => "paire crée avec succes"
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
        //on recupère un étudiant si il existe
        $pair = Pair::where("id",$id)->exists();
        if($pair){
            //$info recupère la valeur ou les données de l'etudiant   de l'id trouvé
            $info = Pair::find($id);
            return response()->json([
                "status" => 1,
                "message" => "étudiant trouvée",
                "data" => $info
            ],200);
        }else{
            return response()->json([
                "status" => 0,
                "message" => "Aucune donnée trouvée",
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
            //$info recupère la valeur ou les données de l'etudiant   de l'id trouvé
            $info = Pair::find($id);
            $info->currency_id_from = $request->currency_id_from;
            $info->currency_id_to = $request->currency_id_to;
            $info->rate = $request->rate;

            $info->save();
            return response()->json([
                "status" => 1,
                "message" => "Mise à jour réussi",
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
