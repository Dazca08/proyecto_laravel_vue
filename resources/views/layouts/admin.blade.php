@php $modulos =  App\Models\Administracion\Modulo::where('estado', 1)->get(); @endphp
<div class="app-admin-wrap layout-sidebar-compact sidebar-blue sidenav-open clearfix">
    <div class="side-content-wrap">        
        <div class="sidebar-left open rtl-ps-none ps" data-perfect-scrollbar="" data-suppress-scroll-x="true">
            <ul class="navigation-left">
                @foreach ($modulos as $modulo)
                    <li class="nav-item" data-item="{{ strtolower($modulo->nombre) }}">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon {{ $modulo->icono }}"></i>
                            <span class="nav-text">{{ $modulo->nombre }}</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
            <i class="sidebar-close i-Close" click="toggelSidebar()"></i>
            <header>
                <div class="logo">
                    <a href="{{ asset('home') }}"><img src="{{ asset('/images/logo.png') }}" alt=""></a>
                </div>
            </header>
            @foreach ($modulos as $modulo)
                <div class="submenu-area" data-parent="{{ strtolower($modulo->nombre) }}">
                    <header>
                        <a href="#"><h3>{{ $modulo->nombre }}</h3></a>
                    </header>
                </ul>
                <ul class="childNav" data-parent="uikits">
                        @php $categorias =  App\Models\Administracion\Categoria::where(['estado'=> 1,'modulo_id'=> $modulo->id])->get(); @endphp
                        @foreach ($categorias as $categoria)
                        <li class="nav-item dropdown-sidemenu">
                            <a>
                                <i class="nav-icon i-Tag-4"></i>
                                <span class="item-name">{{ $categoria->nombre }}</span>
                                <i class="dd-arrow i-Arrow-Down"></i>
                            </a>
                            <ul class="submenu">
                                @php $actividades =  App\Models\Administracion\Actividad::where(['estado'=> 1,'categoria_id'=> $categoria->id])->get(); @endphp
                                @foreach ($actividades as $actividad)
                                <li>
                                    <a href="{{ asset( $actividad->url) }}">{{ $actividad->nombre }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
    @include('layouts.nav')
    <div class="main-content">