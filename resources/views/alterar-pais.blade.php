@extends('padrao')
@section('conteudo')
<div class="col-lg-8 col-lg-offset-2">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4" style="margin-bottom: 50px">
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cadastrarPais">
				Cadastrar Pais
			</button>
		</div>
	</div>
	<table id="example" class="table table-responsive table-hover">
		<thead>
			<tr>
				<th>População</th>
				<th>Pais</th>
				<th>Deletar</th>
			</tr>
		</thead>
		<tbody>
			@if (isset($pais))
			@foreach ($pais as $element)
			<tr>
				<td>{{ number_format($element->populacao, 0, '', ',') }}</td>
				<td>{{ $element->pais }}</td>
				<td>
					<a href="{{ route('deletarPais') ."/". $element->id  }}" class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</a>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
	<!-- Modal -->
	<div class="modal fade" id="cadastrarPais" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        			<span aria-hidden="true">&times;</span>
	        		</button>
	        		<h4 class="modal-title text-info text-center" id="myModalLabel">Cadastrar Pais</h4>
	      		</div>
	      		<div class="modal-body">
	        		<form class="form-horizontal" action="{{ route('cadastrarPais') }}" method="post" accept-charset="utf-8">
	        			<div class="form-group">
	        				<label for="populacao" class="form-label col-sm-2">População</label>
	        				<div class="col-sm-10">
	        					<input class="form-control" type="number" name="populacao" required>
	        				</div>
	        			</div>
	        			<div class="form-group">
	        				<label for="pais" class="form-label col-sm-2">Pais</label>
	        				<div class="col-sm-10">
	        					<input class="form-control" type="text" name="pais" required>
	        				</div>
	        			</div>
	        			<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        			<button type="submit" class="btn btn-primary">Cadastrar</button>
	        			{{ csrf_field() }}
	        		</form>
	      		</div>
	    	</div>
	  	</div>
	</div>
</div>
@endsection