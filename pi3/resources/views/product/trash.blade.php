<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista de Produtos - Apagados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script type="text/javascript">
        
        function restore(){
            return confirm('Deseja realmente excluir esse produto?');
        }

    </script>
</head>
<body >
    @include('layouts.menu')
    <main class="container mt-5">
    <h1>Lista de Produtos Apagados</h1> 
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <a href="{{ Route('product.create') }}" class="btn btn-lg btn-primary">Cadastrar produtos</a>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->name}}</td>
                    <td>{{$produto->price}}</td>
                    <td>{{$produto->category->name}}</td>
                    <td>
                        <form class="d-inline" method="POST" action="{{route('product.restore', $produto->id)}}" onsubmit="return restore();">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Restaurar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</main>
</body>

</html>