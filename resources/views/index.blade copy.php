<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="theme-color" content="#000000" />

<title>Servicios Escolares</title>

<!-- Vite -->
@vite(['resources/js/app.js'])

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Mensaje automático -->
<script>
$(document).ready(function () {
    setTimeout(function () {
        $("#msj").fadeOut(1500);
    }, 3000);
});
</script>

</head>

<body>

<!-- NAVBAR -->
<header>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand" href="{{ route('alumnos.index') }}">
<img src="{{ asset('images/estudiantes.png') }}" class="img-fluid" width="50">
</a>

<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarsExample07"
aria-controls="navbarsExample07"
aria-expanded="false"
aria-label="Toggle navigation">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarsExample07">

<ul class="navbar-nav me-auto">

<li class="nav-item">
<a class="nav-link active" href="#">
INICIO
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">
Asignaturas
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">
Docentes
</a>
</li>

</ul>

</div>

</div>

</nav>

</header>

<!-- CONTENIDO -->
<div class="container mt-5 mb-5">

<div class="row">

<div class="col-md-12">

<h1 class="text-center mt-5 mb-4" style="font-size:28px;">
SERVICIOS ESCOLARES
</h1>

<!-- BREADCRUMB -->
<nav aria-label="breadcrumb">

<ol class="breadcrumb">

<li class="breadcrumb-item">
Inicio
</li>

<li class="breadcrumb-item active" aria-current="page">
Alumnos
</li>

</ol>

</nav>

<!-- PANEL -->
<div class="card shadow">

<div class="card-header bg-primary text-white">

<h2 class="mb-0">
Listado de Alumnos
</h2>

</div>

<div class="card-body">

<!-- MENSAJE -->
@if(Session::has('message'))

<div class="alert alert-success" role="alert" id="msj">

{{ Session::get('message') }}

</div>

@endif

<!-- BOTÓN -->
<a href="{{ route('alumnos.create') }}"
class="btn btn-success mt-3 mb-3">

AGREGAR

</a>

<!-- TABLA -->
<div class="table-responsive" id="tablaAlumnos">

<table class="table table-striped table-bordered table-hover text-center align-middle">

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

<!-- PAGINACIÓN -->
<div class="mt-3 d-flex justify-content-center">

{{ $alumnos->links() }}

</div>

</div>

</div>

</div>

</div>

</div>

<hr>

<!-- FOOTER -->
<footer class="text-muted mt-3 mb-3">

<div class="text-center">

FOOTER

</div>

</footer>

<!-- CONFIRMACIÓN -->
<script>

function confirmarEliminacion() {

    return confirm("¿Estás seguro de eliminar este alumno?");

}

</script>

</body>

</html>
