@extends('padrao')

@section('conteudo')
<div class="col-lg-8 col-lg-offset-2">
	<div class="container-fluid">
		<div class="panel panel-primary">
			<div class="panel-heading text-center text-responsive">
				<h3>Calculo do PIB</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('validar') }}" method="post" class="form-horizontal">
					<div class="form-group">
						<label for="inputConsumo" class="col-sm-3 control-label">Consumo:</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="consumo" placeholder="00000.0" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputInvestimento" class="col-sm-3 control-label">Investimento:</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="consumo" placeholder="00000.0" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputGastosGoverno" class="col-sm-3 control-label">Gastos Governo:</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="consumo" placeholder="00000.0" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputExportacoes" class="col-sm-3 control-label">Exportacões:</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="consumo" placeholder="00000.0" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputImportacoes" class="col-sm-3 control-label">Importacões:</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="consumo" placeholder="00000.0" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputImportacoes" class="col-sm-3 control-label">População:</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="populacao" placeholder="0000" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPais" class="col-sm-3 control-label">Pais:</label>
						<div class="col-sm-9">
							<select class="form-control" required>
								<option>Selecione um Pais</option>
								@foreach ($pais as $element)
									<option value="{{ $element->id }}">{{ $element->pais }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
					    <div class="col-sm-offset-3 col-sm-6">
					      	<button type="submit" class="btn btn-primary">Calcular</button>
					    </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection