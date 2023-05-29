@php use Illuminate\Support\Facades\Auth; @endphp
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{asset('front-assets/img/icon-deal.png')}}" alt="Icon"
                     style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">My Land</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                <a href="{{route('properties.list')}}" class="nav-item nav-link">List Properties</a>
                <a href="{{route('home')}}" class="nav-item nav-link">News</a>
            </div>
            <div class="d-flex">
                @role('Agent')
                <a href="{{route('properties.create')}}" class="btn btn-primary px-3 d-none d-lg-flex" style="margin-right: 20px">Add Property</a>
                @endrole
                @if(!Auth::check())
                    <a href="{{route('login')}}" class="btn btn-primary px-3 d-none d-lg-flex">Login</a>
                @else
                    <div class="dropdown">
                        <a class="btn btn-primary px-3 d-none d-lg-flex dropdown-toggle" data-bs-toggle="dropdown">Xin chào : {{Auth::user()->name}}</a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('agents.index')}}">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </nav>
</div>
