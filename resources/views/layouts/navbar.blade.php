<nav class="navbar navbar-expand-lg navbar-dark primary-color">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="myNavbar">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            @if(empty($post_type_cat))

            @else

            @foreach($post_type_cat['type'] as $type)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="politicsLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $type->name }}</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="politicstLink">
                    @foreach($post_type_cat['category'] as $category)
                    <a class="dropdown-item" href="{{ route('posts.type.category', ['type_id' => $type->id, 'category_id' => $category->id] ) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </li>
            @endforeach
            @endif

            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="#">Weather</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="#">Contact Us</a>
            </li>


        </ul>
        <!-- Links -->
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">

                <a id="logOut" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-primary" aria-labelledby="logOut">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a href="{{ route('posts.create') }}" class="dropdown-item">Add Post</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
        <form class="form-inline">
            <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </div>
        </form>
    </div>
    <!-- Collapsible content -->

</nav>