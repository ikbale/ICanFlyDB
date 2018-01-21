@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-10 col-md-offset-1">

		            <div class="panel panel-default panel-table">
		              <div class="panel-heading">
		                <div class="row">
		                  <div class="col col-xs-6">
		                    <h3 class="panel-title">Nos vols</h3>
		                  </div>
		                  <div class="col col-xs-6 text-right">
		                    <button type="button" class="btn btn-sm btn-primary btn-create" 
		                    data-toggle="modal" 
   							data-target="#favoritesModal">Ajouter</button>
		                  </div>
		                </div>
		              </div>
		               <div class="table-responsive">
		                <table id="datatable" class="table table-striped table-bordered table-list">
		                  <thead>
		                    <tr>
		                         <th>N° vol</th>
						         <th>Date dép</th>
						         <th>Date arr</th>
						         <th>Horaire dép</th>
						         <th>Horaire arr</th>
						         <th>Pl. libres</th>
						         <th>Pl.ocp</th>
						         <th>Aéroport dép</th>
						         <th>Aéroport arr</th>
						         <th>Appareil</th>
		                        <th><em class="fa fa-cog"></em></th>

		                    </tr> 
		                  </thead>
		                <tbody>
		                @foreach($vols as $vol)
                          <tr>
                            <td>{{$vol-> num_vol}}</td>
                            <td>{{$vol-> date_dep}}</td>
                            <td>{{$vol-> date_arr}}</td>
                            <td>{{$vol-> horaire_dep}}</td>
                            <td>{{$vol-> horaire_arr}}</td>
                            <td>{{$vol-> nb_place_libre}}</td>
                            <td>{{$vol-> nb_place_occ}}</td>
                            <td>{{$vol-> code_aeroport_dep}}</td>
                            <td>{{$vol-> code_aeroport_arr}}</td>
                            <td>{{$vol-> num_imm}}</td>

                            <td align="center" class="col-sm-2">
                              <a class="btn btn-default" data-toggle="modal" data-target="#favoritesModal"><em class="fa fa-pencil"></em></a>
								<meta name="csrf-token" content="{{ csrf_token() }}">
							   <a href="{{route('vol.delete', $vol->id) }}" 
							  	data-method="delete" class="btn btn-danger">
							  	<em class="fa fa-trash"></em>
							  </a>                            
							   </td>
                          </tr>
                           @endforeach
                        </tbody>
                </table>
                <div class="panel-footer">
               <!--  <div class="row">
                  <div class="col col-xs-4">Page 1 de 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div> -->
              </div>
            </div>
              <div class="modal fade" id="favoritesModal" 
		     tabindex="-1" role="dialog" 
		     aria-labelledby="favoritesModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" 
			          data-dismiss="modal" 
			          aria-label="Close">
			          <span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" 
			        id="favoritesModalLabel">Ajouter un vol</h4>
			      </div>
			      <div class="modal-body">
                  <form class="form-group" role="form" method="POST" action="vol/add" novalidate>
			    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

			<fieldset id="first">
				  <div class="form-group">
				    <label>N° Vol</label>
				    <input type="text" name ="num_vol" class="form-control" placeholder="N° Vol">
				  </div>
				  <div class="form-group">
				    <label>Date départ</label>
				    <input type="text" class="datepicker" name ="date_dep" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Date arrivée</label>
				    <input type="text"  class="datepicker" name ="date_arr" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Horaire départ</label>
				    <input type="text" name ="horaire_dep" class="form-control" placeholder="Adresse">
				  </div>
				  <div class="form-group">
				    <label>Horaire arrivée</label>
				    <input type="text" name ="horaire_arr" class="form-control" placeholder="Adresse">
				  </div>
				 <input id="next_btn1" onclick="next_step1()" class="col-sm-offset-5 btn btn-primary btn-md" type="button" value="Suivant">
	            </fieldset>
			

               <fieldset id="second" style = "width: 500px; margin:  0px auto;">
				  <div class="form-group">
				    <label>Places libres</label>
				    <input type="text" name ="nb_place_libre" class="form-control" placeholder="Places libres">
				  </div>
				   <div class="form-group">
				    <label>Places occuppées</label>
				    <input type="text" name ="nb_place_occ" class="form-control" placeholder="Places occuppées">
				  </div>
			 <input id="pre_btn1" onclick="prev_step1()" class="btn btn-primary btn-md" type="button" value="Retour">
			 <input id="next_btn2" onclick="next_step2()" class="col-sm-offset-8 btn btn-primary btn-md" type="button" value="Suivant">
	
				</fieldset>


             <fieldset id="third" style = "width: 500px; margin:  0px auto;">

              	<div class="form-group">
				  	<label>Ref. Avion</label>
				  	<select name="num_imm">
						    @foreach($num_appareil as $numApp)
						    <option value="{{$numApp->id}}">{{$numApp->num_imm}}</option>
						    @endforeach
						</select>
				  </div>
				   <div class="form-group">
				   <label>Nom aéroport dép</label>
						<select name="nom_aeroport_dep">
						<option value=""> </option>
						   @foreach($aeroport_info as $aero_dep)
						    <option value="{{$aero_dep->nom_aeroport}}">{{$aero_dep->nom_aeroport}}</option>
						    @endforeach
						</select>
				  </div>
				  <div class="form-group">
				    <label>Code aéroport dép</label>
						<select name="code_aeroport_dep">
						    @foreach($aeroport_info as $code_dep)
						    <option value="{{$code_dep->code_aeroport}}">{{$code_dep->code_aeroport}}</option>
						    @endforeach
						</select>
				  </div>
			
				   <div class="form-group">
				    <label>Nom aéroport arr</label>
				    <select name="nom_aeroport_arr">
						    @foreach($aeroport_info as $nom_arr)
						    <option value="{{$nom_arr->nom_aeroport}}">{{$nom_arr->nom_aeroport}}</option>
						    @endforeach
						</select>
		
				  <div class="form-group">
				     <label>Code aéroport arr</label>
				     <select name="code_aeroport_arr">
						    @foreach($aeroport_info as $code_arr)
						    <option value="{{$code_arr->code_aeroport}}">{{$code_arr->code_aeroport}}</option>
						    @endforeach
						</select>
			
				  </div>
				  

				  <div class="modal-footer">
			     <div class="form-group"> 
			    <span class="pull-left">
			     <input id="pre_btn1" onclick="prev_step2()" class="btn btn-primary btn-md" type="button" value="Retour">
  	           </span>
  	        <span style="margin-right:6px;">
                  <button type="button" 
			           class="btn btn-default" 
			           data-dismiss="modal">Fermer</button>
			</span>

			        <span class="pull-right">
			          <button type="submit" class="btn btn-primary">
			            Valider
			          </button>
			        </span>
			     </div>
                </div>
                 </fieldset>
 
                
			   </form>

			      </div>


			   

			    </div>
			  </div>
</div>

		        <div class="modal fade" id="favoritesModal1" 
		     tabindex="-1" role="dialog" 
		     aria-labelledby="favoritesModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" 
			          data-dismiss="modal" 
			          aria-label="Close">
			          <span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" 
			        id="favoritesModalLabel">Modifier un vol</h4>
			      </div>
			      <div class="modal-body">
                  <form class="form-group" role="form" method="POST" action="vol/update/{{$vol->id}}" novalidate>
			    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

			<fieldset id="first">
				  <div class="form-group">
				    <label>N° Vol</label>
				    <input type="text" name ="num_vol" class="form-control" placeholder="N° Vol">
				  </div>
				  <div class="form-group">
				    <label>Date départ</label>
				    <input type="text" class="datepicker" name ="date_dep" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Date arrivée</label>
				    <input type="text"  class="datepicker" name ="date_arr" class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Horaire départ</label>
				    <input type="text" name ="horaire_dep" class="form-control" placeholder="Adresse">
				  </div>
				  <div class="form-group">
				    <label>Horaire arrivée</label>
				    <input type="text" name ="horaire_arr" class="form-control" placeholder="Adresse">
				  </div>
				 <input id="next_btn1" onclick="next_step1()" class="col-sm-offset-5 btn btn-primary btn-md" type="button" value="Suivant">
	            </fieldset>
			

               <fieldset id="second" style = "width: 500px; margin:  0px auto;">
				  <div class="form-group">
				    <label>Places libres</label>
				    <input type="text" name ="nb_place_libre" class="form-control" placeholder="Places libres">
				  </div>
				   <div class="form-group">
				    <label>Places occuppées</label>
				    <input type="text" name ="nb_place_occ" class="form-control" placeholder="Places occuppées">
				  </div>
			 <input id="pre_btn1" onclick="prev_step1()" class="btn btn-primary btn-md" type="button" value="Retour">
			 <input id="next_btn2" onclick="next_step2()" class="col-sm-offset-8 btn btn-primary btn-md" type="button" value="Suivant">
	
				</fieldset>


             <fieldset id="third" style = "width: 500px; margin:  0px auto;">

              	<div class="form-group">
				  	<label>Ref. Avion</label>
				  	<select name="num_imm">
						    @foreach($num_appareil as $numApp)
						    <option value="{{$numApp->id}}">{{$numApp->num_imm}}</option>
						    @endforeach
						</select>
				  </div>
				   <div class="form-group">
				   <label>Nom aéroport dép</label>
						<select name="nom_aeroport_dep">
						<option value=""> </option>
						   @foreach($aeroport_info as $aero_dep)
						    <option value="{{$aero_dep->nom_aeroport}}">{{$aero_dep->nom_aeroport}}</option>
						    @endforeach
						</select>
				  </div>
				  <div class="form-group">
				    <label>Code aéroport dép</label>
						<select name="code_aeroport_dep">
						    @foreach($aeroport_info as $code_dep)
						    <option value="{{$code_dep->code_aeroport}}">{{$code_dep->code_aeroport}}</option>
						    @endforeach
						</select>
				  </div>
			
				   <div class="form-group">
				    <label>Nom aéroport arr</label>
				    <select name="nom_aeroport_arr">
						    @foreach($aeroport_info as $nom_arr)
						    <option value="{{$nom_arr->nom_aeroport}}">{{$nom_arr->nom_aeroport}}</option>
						    @endforeach
						</select>
		
				  <div class="form-group">
				     <label>Code aéroport arr</label>
				     <select name="code_aeroport_arr">
						    @foreach($aeroport_info as $code_arr)
						    <option value="{{$code_arr->code_aeroport}}">{{$code_arr->code_aeroport}}</option>
						    @endforeach
						</select>
			
				  </div>
				  

				  <div class="modal-footer">
			     <div class="form-group"> 
			    <span class="pull-left">
			     <input id="pre_btn1" onclick="prev_step2()" class="btn btn-primary btn-md" type="button" value="Retour">
  	           </span>
  	        <span style="margin-right:6px;">
                  <button type="button" 
			           class="btn btn-default" 
			           data-dismiss="modal">Fermer</button>
			</span>

			        <span class="pull-right">
			          <button type="submit" class="btn btn-primary">
			            Valider
			          </button>
			        </span>
			     </div>
                </div>
                 </fieldset>
 
                
			   </form>

			      </div>


			   

			    </div>
			  </div>
</div>
       
       
		</div>
</div>
          
    </div>
</div>

@endsection
