@extends('adminlte::page')

@section('title', 'Servicios Escolares')

@section('content_header')
    <h1>Servicios Escolares</h1>
@stop

@section('content')

<!-- MENSAJE -->
@if(Session::has('message'))
<div class="alert alert-success" role="alert" id="msj">
    {{ Session::get('message') }}
</div>
@endif

<!-- BOTÓN -->
<a href="{{ route('alumnos.create') }}" class="btn btn-success mb-3">
    AGREGAR
</a>

<!-- CARD -->
<div class="card">

<div class="card-header bg-primary">
<h3 class="card-title text-white">
Listado de Alumnos
</h3>
</div>

<div class="card-body">

<!-- TABLA -->
<div class="table-responsive">

<table id="tablaAlumnos" class="table table-striped table-bordered table-hover text-center align-middle">

<thead class="table-dark">
<tr>
<th>Número de Control</th>
<th>Nombre</th>
<th>Semestre</th>
<th>Fecha Nacimiento</th>
<th>Acciones</th>
</tr>
</thead>

<tbody>

@foreach ($alumnos as $a)
<tr>

<td>{{ $a->Num_Control }}</td>
<td>{{ $a->Nombre }}</td>
<td>{{ $a->Semestre }}</td>

<td>
{{ \Carbon\Carbon::parse($a->Fecha_Nac)->format('d/m/Y') }}
</td>

<td>
<form action="{{ route('alumnos.destroy', $a->id) }}"
method="POST"
class="d-inline"
onsubmit="return confirmarEliminacion()">

@csrf
@method('DELETE')

<a class="btn btn-primary btn-sm"
href="{{ route('alumnos.show', $a->id) }}">
Detalle
</a>

<a class="btn btn-warning btn-sm"
href="{{ route('alumnos.edit', $a->id) }}">
Editar
</a>

<button type="submit"
class="btn btn-danger btn-sm">
Eliminar
</button>

</form>
</td>

</tr>
@endforeach

</tbody>

</table>

</div>

</div>

</div>

@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@stop

@section('js')

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>

// mensaje automático
setTimeout(function () {
    $('#msj').fadeOut(1500);
}, 3000);

// confirmación eliminar
function confirmarEliminacion() {
    return confirm("¿Estás seguro de eliminar este alumno?");
}

// DATATABLE BIEN CONFIGURADO
$(document).ready(function () {
    $('#tablaAlumnos').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});

</script>

@stop
