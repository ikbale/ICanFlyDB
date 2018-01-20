<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\personne;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
       public function index()
    {
      
        $clients = DB::select('select * FROM personne where exists(select * FROM personne, employes 
        WHERE employes.num_ss = personne.id)');
        
        return view('client', ['clients'=> $clients]);
    }


    public function store(Request $request)
    {
         $num_ss = $request->input('num_ss');
         $nom = $request->input('nom');
         $prenom = $request->input('prenom');
         $adresse = $request->input('adresse');
         

         DB::insert('insert into personne (num_ss,nom,prenom,adresse) values(?,?,?,?) ',[$num_ss,$nom,$prenom,$adresse]);
 
        return redirect()->back();

    }

    public function update(Request $request)
    {
        $id = $request->id;
        $pers = personne::findOrFail($id);

      
            DB::table('personne')
                ->where('id', $id)
                ->update([
                    'num_ss' => $request['num_ss'],
                    'nom' => $request['nom'],
                    'prenom' =>$request['prenom'],
                    'adresse' => $request['adresse'],
                ]);

        $pers->save();
        return redirect()->back();

    }

     public function delete(Request $request)
    {
        $id = $request->id;
        $client= personne::findOrFail($id);
        $client->delete();
        return redirect()->back();

    }

    
}
