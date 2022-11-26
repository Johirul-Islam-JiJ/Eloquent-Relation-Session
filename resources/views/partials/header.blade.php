<nav class="navbar navbar-expand-lg shadow">
    <div class="container">
        <a class="navbar-brand"
           href="{{ config('app.url') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"
             id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link"
                       aria-current="page"
                       href="{{ url('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       aria-current="page"
                       href="{{ route('authors.index') }}">Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       aria-current="page"
                       href="{{ route('publishers.index') }}">Publishers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       aria-current="page"
                       href="{{ route('books.index') }}">Books</a>
                </li>
            </ul>
            {{--<form class="d-flex"
                  role="search">
                <input class="form-control me-2"
                       type="search"
                       placeholder="Search"
                       aria-label="Search">
                <button class="btn btn-outline-success"
                        type="submit">Search
                </button>
            </form>--}}
        </div>
    </div>
</nav>
