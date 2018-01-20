<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\billet;
use App\personne;
use App\vol;
use Illuminate\Support\Facades\Input;

class BilletController extends Controller
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
    public static function getNumsVol()
    {
        return vol::all();
    }
     public static function getNumClient()
    {
        
        return personne::all();
    }


       public function index()
    {
        $numClients = $this->getNumClient();
        $numVols = $this->getNumsVol();
        $billets = billet::all();
        return view('billet', compact('billets','numVols','numClients'));
    }


    public function store(Request $request)
    {
         $num_billet = $request->input('num_billet');
         $prix = $request->input('prix');
         $daye_emission = $request->input('date_emission');
         $num_vol = $request->input('num_vol');
         $num_ss =  $request->input('num_ss');


         DB::insert('insert into billet (num_billet,prix,date_emission,num_vol,num_ss) values(?,?,?,?,?)',[$num_billet, $prix,$daye_emission,$num_vol,$num_ss]);
 
        return redirect()->back();

    }

    public function update(Request $request)
    {
                
        $id = $request->id;
        $billet = billet::findOrFail($id);

          DB::table('billet')
                ->where('id', $id)
                ->update([
                    'num_billet' => $request['num_billet'],
                    'prix' => $request['prix'],
                    'date_emission' =>$request['date_emission'],
                    'num_vol' => $request['num_vol'],
                    'num_ss' => $request['num_ss'],
                ]);

        $billet->save();
        return redirect()->back();

    }

     public function delete(Request $request)
    {
        $id = $request->id;
        $bil= billet::findOrFail($id);
        $bil->delete();
        return redirect()->back();

    }

    
}
