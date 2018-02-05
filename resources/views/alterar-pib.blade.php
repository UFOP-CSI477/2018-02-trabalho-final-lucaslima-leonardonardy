@extends('padrao')
@section('conteudo')
<div class="col-lg-8 col-lg-offset-2">
	<table id="example" class="table table-responsive table-hover">
		<thead>
			<tr>
				<th>Consumo</th>
				<th>Investimo</th>
				<th>Gastos Governo</th>
				<th>Exportações</th>
				<th>Importações</th>
				<th>Pais</th>
				<th>Ano</th>
				<th>Alterar</th>
				<th>Deletar</th>
			</tr>
		</thead>
		<tbody>
			@if (isset($pib))
			@foreach ($pib as $element)
			<tr>
				<td>{{ "R$" . number_format($element->consumo, 0, '', ',') }}</td>
				<td>{{ "R$" . number_format($element->investimento, 0, '', ',') }}</td>
				<td>{{ "R$" . number_format($element->gastosGoverno, 0, '', ',') }}</td>
				<td>{{ "R$" . number_format($element->exportacoes, 0, '', ',') }}</td>
				<td>{{ "R$" . number_format($element->importacoes, 0, '', ',') }}</td>
				<td>{{ $element->pais }}</td>
				<td>{{ $element->ano }}</td>
				<td>
					<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#alteraPib" onclick="ajaxPibModal({{ $element->id }});">
						<span class="glyphicon glyphicon-wrench"></span>
					</button>
				</td>
				<td>
					<a href="{{ route('deletarPib') ."/".  $element->id}}" class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</a>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
	<!-- Modal -->
	<div class="modal fade" id="alteraPib" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        			<span aria-hidden="true">&times;</span>
	        		</button>
	        		<h4 class="modal-title text-center text-info" id="myModalLabel">Alterar PIB</h4>
	      		</div>
	      		<div class="modal-body">
	        		<form action="{{ route('pibAlterarValidar') }}" method="post" accept-charset="utf-8" class="form-horizontal">
	        			<div class="form-group">
	        				<label for="consumo" class="col-sm-2 form-label">Consumo:</label>
	        				<div class="col-sm-10">
	        					<input type="number" name="consumo" id="consumo" class="form-control" required>
	        				</div>
	        			</div>
	        			<div class="form-group">
	        				<label for="investimento" class="col-sm-2 form-label">Investimento:</label>
	        				<div class="col-sm-10">
	        					<input type="number" name="investimento" id="investimento" class="form-control" required>
	        				</div>
	        			</div>
	        			<div class="form-group">
	        				<label for="gastosGoverno" class="col-sm-2 form-label">Gastos Governo:</label>
	        				<div class="col-sm-10">
	        					<input type="number" name="gastosGoverno" id="gastosGoverno" class="form-control" required>
	        				</div>
	        			</div>
	        			<div class="form-group">
	        				<label for="exportacoes" class="col-sm-2 form-label">Exportacoes:</label>
	        				<div class="col-sm-10">
	        					<input type="number" name="exportacoes" id="exportacoes" class="form-control" required>
	        				</div>
	        			</div>
	        			<div class="form-group">
	        				<label for="importacoes" class="col-sm-2 form-label">Importacoes:</label>
	        				<div class="col-sm-10">
	        					<input type="number" name="importacoes" id="importacoes" class="form-control" required>
	        				</div>
	        			</div>
	        			<div class="form-group">
	        				<label for="ano" class="col-sm-2 form-label">Ano:</label>
	        				<div class="col-sm-10">
	        					<input type="number" name="ano" id="ano" class="form-control" required>
	        				</div>
	        			</div>
	        			{{ csrf_field() }}
	        			<input type="hidden" name="id" id="id">
	        			<input type="hidden" name="idPais" id="idPais">
	        			<button type="button" class="btn btn-default" data-dismiss="modal">Ferchar</button>
	        			<button type="submit" class="btn btn-primary">Alterar</button>
	        		</form>
	      		</div>
	    	</div>
	  	</div>
	</div>	
</div>
@endsection