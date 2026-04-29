<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar bg-body-black bg-primary-subtle border border-primary-subtle">
    <div class="container-fluid ">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/note_4371099.png') }}" alt="Logo" width="23" height="24" class="d-inline-block align-text-top" style="margin-left: 100px">
        Mis Tareas
    </a>
    </div>
</nav>

<div class="container mt-4">

    <!--Mensaje flash-->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>