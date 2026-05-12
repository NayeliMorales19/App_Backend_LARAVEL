<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<title>Editar Alumno</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">

<style>
body{
background: linear-gradient(135deg,#4e73df,#1cc88a);
min-height:100vh;
}

.navbar{
box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

.card-box{
background:white;
border-radius:20px;
box-shadow:0 20px 40px rgba(0,0,0,0.2);
padding:35px;
margin-top:40px;
}

.titulo{
font-weight:700;
color:#4e73df;
}

.form-label{
font-weight:600;
color:#555;
}

.form-control{
border-radius:10px !important;
height:45px;
}

.btn{
border-radius:10px;
font-weight:600;
}
</style>
</head>

<body>

<nav class="navbar navbar-dark bg-primary">
<div class="container">

<a class="navbar-brand fw-bold" href="{{ route('alumnos.index') }}">
<i class="bi bi-mortarboard-fill"></i> Sistema de Alumnos
</a>

</div>
</nav>

<div class="container">

<div class="card-box">

<h3 class="titulo mb-4">
<i class="bi bi-pencil-square"></i> Editar Alumno
</h3>

<form method="POST"
action="{{ route('alumnos.update', $alumno->id) }}"
id="formEditar">

@csrf
@method('PUT')

<div class="row g-3">

<div class="col-md-4">
<label class="form-label">Número de Control</label>
<input type="text"
name="NumControl"
value="{{ $alumno->Num_Control }}"
class="form-control">
</div>

<div class="col-md-4">
<label class="form-label">Nombre</label>
<input type="text"
name="Nombre"
value="{{ $alumno->Nombre }}"
class="form-control">
</div>

<div class="col-md-4">
<label class="form-label">Semestre</label>
<input type="number"
name="Semestre"
value="{{ $alumno->Semestre }}"
class="form-control">
</div>

<div class="col-md-4">
<label class="form-label">Fecha de Nacimiento</label>

<input type="date"
name="FechaNac"
value="{{ \Carbon\Carbon::parse($alumno->FechaNac)->format('Y-m-d') }}"
class="form-control">

</div>

</div>

<div class="mt-4 d-flex gap-3">

<button type="button"
onclick="confirmarEdicion()"
class="btn btn-warning w-100">

<i class="bi bi-save"></i> Actualizar

</button>

<a href="{{ route('alumnos.index') }}"
class="btn btn-secondary w-100">

<i class="bi bi-x-circle"></i> Cancelar

</a>

</div>

</form>

</div>

</div>

<!-- SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- CONFIRMAR EDICIÓN -->
<script>
function confirmarEdicion(){

    Swal.fire({
        title: '¿Guardar cambios?',
        text: 'Se actualizará la información del alumno',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#ffc107',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Sí, actualizar'
    }).then((result) => {

        if (result.isConfirmed){
            document.getElementById('formEditar').submit();
        }

    });

}
</script>

<!-- ALERTA DESPUÉS DE EDITAR -->
@if(Session::has('message'))

<script>

window.onload = function(){

    Swal.fire({
        icon: 'success',
        title: 'Actualizado',
        text: '{{ Session::get("message") }}',
        confirmButtonColor: '#28a745'
    }).then(() => {

        window.location.href = "{{ route('alumnos.index') }}";

    });

}

</script>

@endif

</body>
</html>
