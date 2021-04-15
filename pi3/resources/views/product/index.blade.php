<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script type="text/javascript">
        
        function remover(){
            return confirm('Deseja realmente excluir esse produto?');
        }

    </script>
</head>
<body >
    @include('layouts.menu')
    <main class="container mt-5">
    <h1>Lista de Produtos</h1> 
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
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td><img src="{{ asset($produto->image) }}" style="width: 40px;"></td>
                    <td>{{$produto->name}}</td>
                    <td>{{$produto->price}}</td>
                    <td>{{$produto->description}}</td>
                    <td>{{$produto->category->name}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-success">Visualizar</a>
                        <a href="{{ route('product.edit', $produto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form class="d-inline" method="POST" action="{{route('product.destroy', $produto->id)}}" onsubmit="return remover();">
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