@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-10 col-md-offset-1">

		            <div class="panel panel-default panel-table">
		              <div class="panel-heading">
		                <div class="row">
		                  <div class="col col-xs-6">
		                    <h3 class="panel-title">Nos passagers</h3>
		                  </div>
		                  <div class="col col-xs-6 text-right">
		                    <button type="button" class="btn btn-sm btn-primary btn-create" 
		                    data-toggle="modal" 
   							data-target="#favoritesModal">Ajouter</button>
		                  </div>
		                </div>
		              </div>
		              <div class="table-responsive" class="panel-body">
		                <table class="table table-striped table-bordered table-list">
		                  <thead>
		                    <tr>
		                         <th>N° sécurité sociale</th>
						         <th>Nom </th>
						         <th>Prénom</th>
						         <th>Adresse</th>
		                        <th><em class="fa fa-cog"></em></th>

		                    </tr> 
		                  </thead>
		                <tbody>
                            @foreach($clients as $pers)
                          <tr>
                            <td>{{$pers-> num_ss}}</td>
                            <td>{{$pers-> nom}}</td>
                            <td>{{$pers-> prenom}}</td>
                            <td>{{$pers-> adresse}}</td>

                            <td align="center">
                              <a class="btn btn-default" data-toggle="modal" data-target="#favoritesModal1"><em class="fa fa-pencil"></em></a>
								<meta name="csrf-token" content="{{ csrf_token() }}">
							   <a href="{{ route('client.delete', $pers->id) }}" 
							  	data-method="delete" class="btn btn-danger">
							  	<em class="fa fa-trash"></em>
							  </a>                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                </table>
                <div class="panel-footer">
                <div class="row">
                <!--   <div class="col col-xs-4">Page 1 de 5
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
                  </div> -->
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
			        id="favoritesModalLabel">Ajouter un passager</h4>
			      </div>
			      <div class="modal-body">
			     <form class="form-group" role="form" method="POST" action="clients/add" novalidate>
                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
				  <div class="form-group">
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
				   <div class="modal-footer">
			        <button type="button" 
			           class="btn btn-default" 
			           data-dismiss="modal">Fermer</button>
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
			        id="favoritesModalLabel">Modifier un passager</h4>
			      </div>
			      <div class="modal-body">
			     <form class="form-group" role="form" method="POST" action="clients/update/{{$pers->id}}" novalidate>
                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
				  <div class="form-group">
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
				   <div class="modal-footer">
			        <button type="button" 
			           class="btn btn-default" 
			           data-dismiss="modal">Fermer</button>
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
