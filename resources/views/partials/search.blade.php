@if( \Request::is('articles') or \Request::is('articles/search') )
    <form class="d-flex" action="{{ url('articles/search') }}" method="get">
        <input class="form-control me-2" type="search" placeholder="Recherche sur articles" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
@elseif( \Request::is('categories') or \Request::is('categories/search') )
    <form class="d-flex" action="{{ url('categories/search') }}" method="get">
        <input class="form-control me-2" type="search" placeholder="Recherche sur categories" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
@elseif( \Request::is('users') or \Request::is('users/search') )
    <form class="d-flex" action="{{ url('users/search') }}" method="get">
        <input class="form-control me-2" type="search" placeholder="Recherche sur utilisateurs" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
@endif