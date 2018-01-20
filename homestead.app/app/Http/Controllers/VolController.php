<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\vol;
use App\appareil;
use App\aeroport;

use DB;

class VolController extends Controller
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

    public static function getAeroportInfo()
    {
        return aeroport::all();
    }

    public static function getNumAppareil()
    {
        return appareil::all();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aeroport_info=$this->getAeroportInfo();
        $num_appareil=$this->getNumAppareil();
        $vols = vol::all();
        return view('vol',compact('vols','aeroport_info','num_appareil'));
    }


       

    public function store(Request $request)
    {
         $num_vol = $request->input('num_vol');
         $date_dep = $request->input('date_dep');
         $date_arr = $request->input('date_arr');
         $horaire_dep = $request->input('horaire_dep');
         $horaire_arr = $request->input('horaire_arr');
         $nb_place_libre = $request->input('nb_place_libre');
         $nb_place_occ = $request->input('nb_place_occ');
         $nom_aeroport_dep = $request->input('nom_aeroport_dep');
         $nom_aeroport_arr = $request->input('nom_aeroport_arr');
         $code_aeroport_dep = $request->input('code_aeroport_dep');
         $code_aeroport_arr = $request->input('code_aeroport_arr');
         $num_imm = $request->input('num_imm');

         DB::insert('insert into vol (num_vol,date_dep,date_arr,
            horaire_dep,horaire_arr,nb_place_libre,nb_place_occ,
            num_imm,nom_aeroport_dep,nom_aeroport_arr,code_aeroport_dep,code_aeroport_arr) values(?,?,?,?,?,?,?,?,?,?,?,?)',
            [$num_vol,$date_dep,$date_arr,$horaire_dep,$horaire_arr,
            $nb_place_libre,$nb_place_occ,$num_imm,$nom_aeroport_dep,$nom_aeroport_arr,
            $code_aeroport_dep,$code_aeroport_arr]);
 
        return redirect()->back();

    }

    public function update(Request $request)
    {
        $id = $request->id;
        $vol = vol::findOrFail($id);


          DB::table('vol')
                ->where('id', $id)
                ->update([
                    'num_vol' => $request['num_vol'],
                    'date_dep' => $request['date_dep'],
                    'date_arr' =>$request['date_arr'],
                    'horaire_dep' => $request['horaire_dep'],
                    'horaire_arr' => $request['horaire_arr'],
                    'nb_place_libre' => $request['nb_place_libre'],
                    'nb_place_occ' => $request['nb_place_occ'],
                    'num_imm' =>$request['num_imm'],
                    'nom_aeroport_dep' => $request['nom_aeroport_dep'],
                    'nom_aeroport_arr' => $request['nom_aeroport_arr'],
                    'code_aeroport_dep' => $request['code_aeroport_dep'],
                    'code_aeroport_arr' => $request['code_aeroport_arr'],
                ]);

        $vol->save();
        return redirect()->back();

      

    }

    public function delete(Request $request)
            {
                $id = $request->id;
                $vol= vol::findOrFail($id);
                $vol->delete();
               
             return redirect()->back(); 
            }


     
    
}
