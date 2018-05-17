@extends ('layout')



@section ('content')

<div class="col-md-4">
	<form method="POST" action="{{ route('Mantenimiento.store') }}">
{{ csrf_field() }}

<!-- cadena para error -->
<div class="form-group  {{ $errors->has('t_equipo') ? 'has-error' : ''}}"> 
<label>Tipo de Equipo</label>
<input type="" name="t_equipo" class="form-control" value=" {{ old ('t_equipo') }}" placeholder="Ingresa aqui el tipo ">
{!! $errors->first('t_equipo', '<span class="help-block">:message</span>') !!}
</div>


<label>Marca</label>
<input type="" name="marca" class="form-control" value=" {{ old ('marca') }}" placeholder="Ingresa aqui la marca ">

<label>Modelo</label>
<input type="" name="modelo" class="form-control" value=" {{ old ('modelo') }}" placeholder="Ingresa aqui el modelo ">

<label>Numero de serie</label>
<input type="" name="n_serie" class="form-control" value=" {{ old ('n_serie') }}" placeholder="Ingresa aqui el numero de serie ">

<div class="form-group">
	<label>Fecha de Mantenimiento</label>

	<div class="input-group date">
	<div class="input-group-addon">
		<i class="fa fa-calendar"></i>
	</div>
		
			<input type="" name="fecha_manten" class="form-control pull-right" value=" {{ old ('fecha_manten') }}" id="datepicker">
	</div>



</div>



<div class="box_footer">
<button type="submit" class="btn btn-primary btn-block">Guardar</button>
	
</div>


</form>
</div>



@stop

@push('styles')
<!--Select 2 -->

<link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

@endpush

@push ('scripts')

<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
	$('#datepicker').datepicker({
		languaje: "es",
		autoclose: true,
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
</script>
@endpush
