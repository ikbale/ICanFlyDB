<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employe;
use App\personne;
use DB;


class EmployeController extends Controller
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
        $employes = DB::select('select * from employes,personne where employes.num_ss = personne.id ');
        $test = DB::table('employes')->distinct()->select('type');
        return view('employe', compact('employes','test'));
    }


    public function store(Request $request)
    {

         $num_ss = $request->input('num_ss');
         $nom = $request->input('nom');
         $prenom = $request->input('prenom');
         $adresse = $request->input('adresse');
         $salaire = $request->input('salaire');
         $emp_type = $request->input('emp_type');

          
         DB::insert('insert into personne (num_ss,nom,prenom,adresse) values(?,?,?,?)',[$num_ss,$nom,$prenom,$adresse]);
         $id = DB::getPdo()->lastInsertId();
         DB::insert('insert into employes (num_ss,salaire,type) values(?,?,?)',[$id,$salaire,$emp_type]);
        return redirect()->back();

    }

    public function update(Request $request)
    {
        $id = $request->id;
        $emp = employe::findOrFail($id);

      
            DB::table('personne')
                ->where('id', $id)
                ->update([
                    'num_ss' => $request['num_ss'],
                    'nom' => $request['nom'],
                    'prenom' =>$request['prenom'],
                    'adresse' => $request['adresse'],
                ]);

            DB::table('emp')
                ->where('num_ss', $id)
                ->update([
                    'salaire' =>$request['salaire'],
                    'type' => $request['emp_type'],
                ]);

        $emp->save();
        return redirect()->back();

    }

     public function delete(Request $request)
    {
        
        $id = $request->id;
        $emp= personne::findOrFail($id);

        /*$emp->delete();*/
      DB::delete('delete from personne where id = ? ',[$emp->id]);
      DB::delete('delete from employes where num_ss = ?',[$emp->id]);

        return redirect()->back();


        
    }

    
}
