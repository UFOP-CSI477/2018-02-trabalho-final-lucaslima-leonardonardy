@extends('padrao')

@section('conteudo')
<div class="col-lg-8 col-lg-offset-2">
	<div class="container-fluid">
		<div class="panel panel-primary">
			<div class="panel-heading text-center text-responsive">
				<h3>Cadastrar PIB</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('validar') }}" method="post" class="form-horizontal">
					<div class="form-group">
						<label for="inputConsumo" class="col-sm-3 control-label">Consumo:</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="consumo" placeholder="00000.0" value="{{ old('consumo') }}" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputInvestimento" class="col-sm-3 control-label">Investimento:</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="investimento" placeholder="00000.0" value="{{ old('investimento') }}" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputGastosGoverno" class="col-sm-3 control-label">Gastos Governo:</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="gastosGoverno" placeholder="00000.0" value="{{ old('gastosGoverno') }}" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputExportacoes" class="col-sm-3 control-label">Exportacões:</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="exportacoes" placeholder="00000.0" value="{{ old('exportacoes') }}" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputImportacoes" class="col-sm-3 control-label">Importacões:</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="importacoes" placeholder="00000.0" value="{{ old('importacoes') }}" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPais" class="col-sm-3 control-label">Pais:</label>
						<div class="col-sm-9">
							<select name="idPais" class="form-control" value="{{ old('pais') }}" required>
								<option>Selecione um Pais</option>
								@foreach ($pais as $element)
									@if (!empty(old('pais')) && old('pais') == $element->id)
										<option value="{{ $element->id }}" selected>
											{{ $element->pais }}
										</option>
									@else
										<option value="{{ $element->id }}">
											{{ $element->pais }}
										</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPais" class="col-sm-3 control-label">ano:</label>
						<div class="col-sm-9">
							<input class="form-control" type="number" name="ano" value="{{ old('ano') }}" required>
						</div>
					</div>
					<div class="form-group">
					    <div class="col-sm-offset-3 col-sm-6">
					      	<button type="submit" class="btn btn-primary">Calcular</button>
					    </div>
					</div>
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</div>
@endsection