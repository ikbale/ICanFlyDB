@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

		            <div class="panel panel-default panel-table">
		              <div class="panel-heading">
		                <div class="row">
		                  <div class="col col-xs-6">
		                    <h3 class="panel-title">Détails billet</h3>
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
		                         <th>N° Billet</th>
						         <th>Prix </th>
						         <th>Date émission</th>
						         <th>Ref. Vol</th>
						         <th>Ref. Client</th>
		                         <th><em class="fa fa-cog"></em></th>

		                    </tr> 
		                  </thead>
		                <tbody>
		                @foreach($billets as $bil)
                          <tr>
                            <td>{{$bil-> num_billet}}</td>
                            <td>{{$bil-> prix}}</td>
                            <td>{{$bil-> date_emission}}</td>
                            <td>{{$bil-> num_vol}}</td>
                            <td>{{$bil-> num_ss}}</td>
                            <td align="center">
                              <a class="btn btn-default" data-toggle="modal" data-target="#favoritesModal1"><em class="fa fa-pencil"></em></a>
 								<a href="{{ route('billet.delete', $bil->id) }}"
							  	data-method="delete"  class="btn btn-danger">
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
			        id="favoritesModalLabel">Réserver un billet</h4>
			      </div>
			    <div class="modal-body">
				<form class="form-group" role="form" method="POST" action="billet/add" novalidate>
                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">				  <div class="form-group">
				    <label >N° Billet</label>
				    <input type="text" class="form-control" name ="num_billet" placeholder="N° Billet">
				  </div>
				  <div class="form-group">
				    <label>Prix</label>
				    <input type="text" class="form-control"  name="prix" placeholder="Prix">
				  </div>
				  <div class="form-group">
				    <label>Date d'émission</label>
				    <input type="text"  class="datepicker" class="form-control" name="date_emission">
				  </div>
				  <div class="form-group">
						<select name="num_vol">
						 <option value=""> Ref. Vol </option>
						   @foreach($numVols as $numVol)
						    <option value="{{$numVol->id}}">{{$numVol->num_vol}}</option>
						  @endforeach
						</select>
				  </div>
				  <div class="form-group">
						<select name="num_ss">
						 <option value=""> Ref. Client </option>
						   @foreach($numClients as $numClient)
						    <option value="{{$numClient->id}}">{{$numClient->num_ss}}</option>
						  @endforeach
						</select>

				  </div>
			      <div class="modal-footer">
			      <span style="margin-right:8px;">
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
			        id="favoritesModalLabel">Modifier billet</h4>
			      </div>
			    <div class="modal-body">
				<form class="form-group" role="form" method="POST" action="billet/update/{{$bil->id}}" novalidate>
                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">				
                    <div class="form-group">
				    <label >N° Billet</label>
				    <input type="text" class="form-control" name ="num_billet">
				  </div>
				  <div class="form-group">
				    <label>Prix</label>
				    <input type="text" class="form-control"  name="prix" value="{{$bil->prix}}">
				  </div>
				  <div class="form-group">
				    <label>Date d'émission</label>
				    <input type="text"  class="datepicker" class="form-control" value="{{$bil->date_emission}}" name="date_emission">
				  </div>
				  <div class="form-group">
						<select name="num_vol">
						 <option value=""> Ref. Vol </option>
						   @foreach($numVols as $numVol)
						    <option value="{{$numVol->id}}">{{$numVol->num_vol}}</option>
						  @endforeach
						</select>
				  </div>
				   <div class="form-group">
						<select name="num_ss">
						 <option value=""> Ref. Client </option>
						   @foreach($numClients as $numClient)
						    <option value="{{$numClient->id}}">{{$numClient->num_ss}}</option>
						  @endforeach
						</select>

				  </div>
			      <div class="modal-footer">
			      	<span style="margin-right:8px;">
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
</div>

@endsection
