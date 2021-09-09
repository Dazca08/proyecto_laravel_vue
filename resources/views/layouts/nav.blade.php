<div class="main-content-wrap d-flex flex-column">
    <!-- HEADER STRAT -->
    <div class="main-header">

        <div class="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div class="d-flex align-items-center">
            <div class="search-bar">
                <input type="text" placeholder="Search" />
                <i class="search-icon text-muted i-Magnifi-Glass1"></i>
            </div>
        </div>

        <a style="font-size: 12px;" href="#">{{ __('Conceptos') }}</a>
        <a style="font-size: 12px;" href="#">{{ __('Ultimas funcionalidades') }}</a>
        <a style="font-size: 12px;" href="#">{{ __('Ayudas') }}</a>
        <a style="font-size: 12px;" href="#">{{ __('Mis Responsabilidades') }}</a>
        <a style="font-size: 12px;" href="#">{{ __('Recursos') }}</a>

        <div class="header-part-right">

            <!-- Notificaiton -->
            <div class="dropdown text-left">
                <div class="badge-top-container" id="dropdownNotification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-primary">3</span>
                    <i class="i-Bell text-muted header-icon"></i>
                </div>
                <!-- Notification dropdown -->
                <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
                    <div class="dropdown-item d-flex">
                        <div class="notification-icon">
                            <i class="i-Speach-Bubble-6 text-primary m-2"></i>
                        </div>
                        <div class="notification-details flex-grow-1">
                            <p class="m-0 d-flex align-items-center">
                                <span>Mensaje Nuevo</span>
                                <span class="badge badge-pill badge-primary ml-1 m-2">Nuevo</span>
                                <span class="flex-grow-1"></span>
                                <span class="text-small text-muted ml-auto">10 seg</span>
                            </p>
                            <p class="text-small text-muted m-0">
                                Mensaje Usuario
                            </p>
                        </div>
                    </div>  
                </div>
            </div>
            <!-- Notificaiton End -->

            <!-- User avatar dropdown -->
            <div class="dropdown">
                <div class="user col align-self-end">
                    <img src="{{ asset('images/profile.jpg') }}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"/>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-header">
                            <i class="i-Lock-User m-2"></i> @php echo Auth::user()->name @endphp
                        </div>
                        <a class="dropdown-item">{{ __('Configuración de Usuario') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Cerrar Sesión') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>