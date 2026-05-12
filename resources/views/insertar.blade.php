<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Nuevo Alumno</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">

<style>

body{
background: linear-gradient(135deg,#4e73df,#1cc88a);
min-height:100vh;
display:flex;
flex-direction:column;
}

.navbar{
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

.card-box{
background:white;
padding:35px;
border-radius:20px;
box-shadow:0 20px 40px rgba(0,0,0,0.2);
margin:auto;
margin-top:40px;
margin-bottom:40px;
width:850px;
max-width:95%;
}

.titulo{
font-weight:700;
}

.form-label{
font-weight:600;
color:#555;
}

.form-control,
.form-select{
border-radius:10px !important;
height:45px;
}

.input-group-text{
background:#4e73df;
color:white;
border:none;
}

button{
border-radius:10px !important;
font-weight:600;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand"
href="{{ route('alumnos.index') }}">

<i class="bi bi-mortarboard-fill"></i>
Sistema de Alumnos

</a>

</div>

</nav>

<div class="card-box">

<h3 class="mb-4 text-primary titulo">

<i class="bi bi-person-plus-fill"></i>
Registrar Alumno

</h3>

@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form method="POST" action="{{ route('alumnos.store') }}">

@csrf

<div class="row g-3">

<!-- NUMERO CONTROL -->
<div class="col-md-4">

<label class="form-label">
Número de Control
</label>

<input type="text"
name="Num_Control"
class="form-control"
value="{{ old('Num_Control') }}"
required>

</div>

<!-- NOMBRE -->
<div class="col-md-4">

<label class="form-label">
Nombre
</label>

<input type="text"
name="Nombre"
class="form-control"
value="{{ old('Nombre') }}"
required>

</div>

<!-- PRIMER APELLIDO -->
<div class="col-md-4">

<label class="form-label">
Primer Apellido
</label>

<input type="text"
name="Primer_Ap"
class="form-control"
value="{{ old('Primer_Ap') }}"
required>

</div>

<!-- SEGUNDO APELLIDO -->
<div class="col-md-4">

<label class="form-label">
Segundo Apellido
</label>

<input type="text"
name="Segundo_Ap"
class="form-control"
value="{{ old('Segundo_Ap') }}"
required>

</div>

<!-- FECHA NACIMIENTO -->
<div class="col-md-4">

<label class="form-label">
Fecha de Nacimiento
</label>

<input type="date"
name="Fecha_Nac"
class="form-control"
value="{{ old('Fecha_Nac') }}"
required>

</div>

<!-- SEMESTRE -->
<div class="col-md-2">

<label class="form-label">
Semestre
</label>

<input type="number"
name="Semestre"
class="form-control"
value="{{ old('Semestre') }}"
required>

</div>

<!-- CARRERA -->
<div class="col-md-6">

<label class="form-label">
Carrera
</label>

<input type="text"
name="Carrera"
class="form-control"
value="{{ old('Carrera') }}"
required>

</div>

</div>

<div class="mt-4 d-flex gap-3">

<button type="submit"
class="btn btn-success w-100">

<i class="bi bi-save"></i>
Guardar

</button>

<a href="{{ route('alumnos.index') }}"
class="btn btn-secondary w-100">

<i class="bi bi-x-circle"></i>
Cancelar

</a>

</div>

</form>

</div>

<!-- SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(Session::has('message'))

<script>

window.onload = function(){

    Swal.fire({
        icon: 'success',
        title: 'Éxito',
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
