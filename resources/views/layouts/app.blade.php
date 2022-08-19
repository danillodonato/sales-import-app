<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Import App</title>
    <link rel="stylesheet" href="css/app.css">
    <script>
        var base_url = "{{ url('') }}";
    </script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Importação de Vendas</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link {{ Route::current()->getName() === 'sales' ? 'active' : '' }}" href="{{ route('sales') }}">Vendas</a>
                        <a class="nav-link {{ Route::current()->getName() === 'import' ? 'active' : '' }}" href="{{ route('import') }}">Importar</a>
                    </div>
                </div>
            </div>
        </nav>
        <h4>@yield('title')</h4>
        <div class="row">
            @yield('content')
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>