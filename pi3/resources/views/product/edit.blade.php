<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    @include('layouts.menu')
    <main class="container mt-5 bg-light">
    <h1>Editar Produtos</h1>
    <form method="POST" action=" {{ route('product.update', $product->id) }} " enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="row">
    <span class="form-label">Nome</span>
    <input type="text" name="name" class="form-control" value="{{$product->name}}">
    </div>
    <div class="row mt-2">
    <span class="form-label">Descrição</span>
    <textarea name="description" class="form-control">{{$product->description}}</textarea>
    </div>
    <div class="row mt-2">
    <span class="form-label">Preço</span>
    <input name="price" type="number" min="0.00" max="10000.00" step="0.01" class="form-control"  value="{{$product->price}}">
    </div>
    <div class="row mt-2">
    <span class="form-label">Categoria</span>
    <select class="form-select" name="category_id">
        @foreach($categories as $category)
            <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>
                {{$category->name}}
            </option>
        @endforeach
    </select>
    </div>
    <div class="row mt-2">
    <span class="form-label">Tag</span>
    <select class="form-select" name="tags[]" multiple>
        @foreach($tags as $tag)
            <option value="{{$tag->id}}"  @if($product->tags->contains($tag->id)) selected @endif>{{$tag->name}}</option>
        @endforeach
    </select>
    </div>
    <div class="row mt-2">
    <span class="form-label">Imagem</span>
    <input type="file" class="form-control" name="image" >
    </div>
    <div class="row mt-4">
    <button type="submit" class="btn btn-success btn-lg">Salvar</button>
    </div>
    </form>
    </main>
</body>
</html>