<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

</head>
<style>
    .navbar {
        background: rgb(0, 132, 255);
    }

    .navbar span {
        color: white !important;

    }

    .container {
        margin: 20px auto;
    }

    h1 {
        text-align: center;
    }
</style>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Usuarios</span>
        </div>
    </nav>
    <div class="container">
        <h1>Crud usuarios</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card  shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('users.store') }}" method="POST">
                            <div class="form-row" style="display: flex;">
                                <div class="col-sm-3">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="tabla table table-striped  shadow p-3 mb-5 bg-body rounded">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    <!-- helper -->
                                    @method('DELETE')
                                    @csrf
                                    <!-- <input type="submit" value="Eliminar" class="btn btn-sm btn-danger"
                                        onclick="return confirm(`¿Desea eliminar el usuario?`)"> -->
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar el usuario?')">
                                        <i class="bi bi-trash-fill"></i>
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

</body>

</html>
