@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="jumbotron" style="padding:15px">
			     <form class="form-inline col-md-offset-3">
				  <div class="form-group col-md-offset-1">

			             <!--  <div class="dropdown">
						  <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown"> <span id="selected">Choisir type</span>
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
							    @foreach($test->lists('type') as $t)
								    <li><a class="dropdown-item">{{$t}}</a></li>
								 @endforeach
						  </ul> -->
						 <div class="form-group">
						 <select class="typeEmp" name="emp_type">
						 <option value=""> Choisir type </option>
							    @foreach($test->lists('type') as $t)
						    <option value="{{$t}}">{{$t}}</option>
						       @endforeach
						</select>
						</div>
						<div class="form-group">

						   <button type="submit" class="btn btn-success col-md-offset-1">Afficher</button>
					    </div>
			</div>
			 </form>
	</div>
    		

		            <div class="panel panel-default panel-table">
		              <div class="panel-heading">
		                <div class="row">
		                  <div class="col col-xs-6">
		                    <h3 class="panel-title">Nos employés</h3>
		                  </div>
		                  <div class="col col-xs-6 text-right">
		                    <button type="button" class="btn btn-sm btn-primary btn-create" 
		                    data-toggle="modal" 
   							data-target="#favoritesModal">Ajouter</button>
		                  </div>
		                </div>
		              </div>
		              <div class="table-responsive" class="panel-body">
		                <table id ="myTable" class="table table-striped table-bordered table-list">
		                  <thead>
		                    <tr>
		                         <th>N° sécurité sociale</th>
						         <th>Nom </th>
						         <th>Prénom</th>
						         <th>Adresse</th>
						         <th>Salaire</th>
						         <th>Type</th>

		                        <th><em class="fa fa-cog"></em></th>

		                    </tr> 
		                  </thead>
		                <tbody>
		                	@foreach($employes as $emp)
                          <tr class="content">
                            <td>{{$emp-> num_ss}}</td>
                            <td>{{$emp-> nom}}</td>
                            <td>{{$emp-> prenom}}</td>
                            <td>{{$emp-> adresse}}</td>
                            <td>{{$emp-> salaire}}</td>
                            <td>{{$emp-> type}}</td>


                            <td align="center">
                              <a class="btn btn-default" 
                              data-toggle="modal" 
                              data-target="#favoritesModal1"><em class="fa fa-pencil"></em></a>
                              <meta name="csrf-token" content="{{ csrf_token() }}">
							   <a href="{{ route('employe.delete', $emp->id) }}" 
							  	data-method="delete" class="btn btn-danger">
							  	<em class="fa fa-trash"></em>
							  </a> 
                      
 							 </td>
                          </tr>
                          @endforeach
                        </tbody>
                </table>
                <div class="panel-footer">
                <div class="row">
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
                </div>
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
			        id="favoritesModalLabel">Ajouter un employé</h4>
			      </div>
			     <div class="modal-body">
                  <form class="form-group" role="form" method="POST" action="employe/add" novalidate>
                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
				    <div>
				    <label>N° séc. sociale</label>
				    <input type="text" name="num_ss" class="form-control" placeholder="N° séc. sociale">
				  </div>
				  <div class="form-group">
				    <label>Nom</label>
				    <input type="text" name="nom" class="form-control"  placeholder="Nom">
				  </div>
				  <div class="form-group">
				    <label>Prénom</label>
				    <input type="text" name="prenom" class="form-control" placeholder="Prénom">
				  </div>
				  <div class="form-group">
				    <label>Adresse</label>
				    <input type="text" name="adresse" class="form-control" placeholder="Adresse">
				  </div>
				  <div class="form-group">
				    <label>Salaire</label>
				    <input type="text" name="salaire" class="form-control" placeholder="Salaire">
				  </div>
				  <div class="form-group">
				    <label>Type employé</label>
				  @foreach($test->lists('type') as $t)
					<div class="checkbox">
					 <label><input type='radio' value="{{$t}}" name='emp_type'>{{$t}}</label>
					</div>
					@endforeach			 
					 </div>
				  
			      <div class="modal-footer">
			      	<span style="margin-right:10px;">
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
			        id="favoritesModalLabel">Modifier un employé</h4>
			      </div>
			     <div class="modal-body">
                  <form class="form-group" role="form" method="POST" action="employe/update/{{$emp->id}}" novalidate>
                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
				    <div>
				    <label>N° séc. sociale</label>
				    <input type="text" name="num_ss" value="{{$emp->num_ss}}" class="form-control" placeholder="N° séc. sociale">
				  </div>
				  <div class="form-group">
				    <label>Nom</label>
				    <input type="text" name="nom" value="{{$emp->nom}}" class="form-control"  placeholder="Nom">
				  </div>
				  <div class="form-group">
				    <label>Prénom</label>
				    <input type="text" name="prenom" value="{{$emp->prenom}}" class="form-control" placeholder="Prénom">
				  </div>
				  <div class="form-group">
				    <label>Adresse</label>
				    <input type="text" name="adresse" value="{{$emp->adresse}}" class="form-control" placeholder="Adresse">
				  </div>
				  <div class="form-group">
				    <label>Salaire</label>
				    <input type="text" name="salaire" value="{{$emp->salaire}}" class="form-control" placeholder="Salaire">
				  </div>
				  <div class="form-group">
				    <label>Type employé</label>
				   @foreach($test->lists('type') as $t)
					<div class="checkbox">
					 <label><input type='radio' value="{{$t}}" name='emp_type'>{{$t}}</label>
					</div>
					@endforeach			 
					 </div>
			      <div class="modal-footer">
			      <span style="margin-right:10px;">
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
