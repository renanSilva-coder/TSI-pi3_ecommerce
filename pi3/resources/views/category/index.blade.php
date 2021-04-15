<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista de Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script type="text/javascript">
        
        function remover(){
            return confirm('Deseja realmente excluir esse produto?');
        }

    </script>
</head>
<body>
    @include('layouts.menu')
    <main class="container mt-5">
    <h1>Lista de Categorias</h1> 
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <a href="{{route('category.create')}}" class="btn btn-lg btn-primary">Cadastrar Categorias</a>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-success">Visualizar</a>
                        <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form class="d-inline" method="POST" action="{{route('category.destroy', $cat->id)}}" onsubmit="return remover();">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</main>
</body>
</html>