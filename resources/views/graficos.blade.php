@extends('padrao')

@section('conteudo')
	<div class="row" style="margin-bottom: 5%">
		<div class="col-lg-8 col-lg-offset-2">
			<form accept-charset="utf-8" class="form-horizontal">
				<div class="row">
					<h4 class="text-center text-info text-responsive">Para ver o PIB de todos os paises de acordo com o Ano</h4>
				</div>
				<select id="anoPibSelect" name="anoPibSelect" class="form-control" onchange="graficos();">
					<option>Selecione o ano</option>
					@if (isset($anoPib))
						@foreach ($anoPib as $element)
							@if (isset($anoPibSelect) && $anoPibSelect == $element->ano)
								<option value="{{ $element->ano }}" selected>{{ $element->ano }}</option>
							@else
								<option value="{{ $element->ano }}">{{ $element->ano }}</option>
							@endif
						@endforeach
					@endif
				</select>
				<div class="row">
					<h4 class="text-center text-info text-responsive">Selecione o pais para Ver o Desenvovimento Econômico</h4>
				</div>
				<select id="paisPibSelect" name="paisPibSelect" class="form-control" onchange="graficos();">
					<option>Selecione o pais</option>
					@if (isset($paisPib))
						@foreach ($paisPib as $element)
							@if (isset($anoPibSelect) && $anoPibSelect == $element->pais)
								<option value="{{ $element->pais }}" selected>{{ $element->pais }}</option>
							@else
								<option value="{{ $element->pais }}">{{ $element->pais }}</option>
							@endif
						@endforeach
					@endif
				</select>
			</form>
		</div>
	</div>
    <div id="myChartCont1" class="col-sm-3 col-md-6" style="margin-bottom: 10%"></div>
	<div id="myChartCont2" class="col-sm-3 col-md-6" style="margin-bottom: 10%"></div>
    <div id="myChartCont3" class="col-sm-3 col-md-6"></div>
	<div id="myChartCont4" class="col-sm-3 col-md-6"></div>
@endsection