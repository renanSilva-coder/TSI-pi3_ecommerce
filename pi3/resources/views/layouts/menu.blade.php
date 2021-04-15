<header>
    <nav class="nav navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{route('product.index')}}">Produtos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('category.index')}}">Categorias</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('tag.index')}}">Tags</a></li>
        </ul>
        <span> --- </span>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{route('product.trash')}}">Lixeira de Produtos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('category.trash')}}"> Lixeira de Categorias</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('tag.trash')}}"> Lixeira de Tags</a></li>
        </ul>
    </nav>
</header>