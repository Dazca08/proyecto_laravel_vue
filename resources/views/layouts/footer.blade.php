
</div>
</div>
</div>
@include('search.result')
</div>
        <script src="{{ asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/perfect-scrollbar.min.js')}}"></script>
        <script src="{{ asset('assets/js/es5/script.min.js')}}"></script>
        <script src="{{ asset('assets/js/es5/sidebar.compact.script.min.js')}}"></script>
        <script src="{{ asset('assets/js/es5/customizer.script.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/pickadate/picker.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>
        <script src="{{ asset('assets/js/form.validation.script.js')}}"></script>
        <script src="{{ asset('assets/fonts/fontawesome-free-5.10.1-web/js/all.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/sweetalert2.min.js') }}"></script>
        @if (\Request::is('administracion/*'))
        <script src="{{ asset('js/Administracion/app.js') }}"></script>
        @endif
        @if (\Request::is('documentos/*'))
        <script src="{{ asset('js/Documentos/app.js') }}"></script>
        @endif
        @if (\Request::is('indicadores/*'))
        <script src="{{ asset('js/Indicadores/app.js') }}"></script>
        @endif
        @if (\Request::is('riesgos/*'))
        <script src="{{ asset('js/Riesgos/app.js') }}"></script>
        @endif
        @if (\Request::is('planes/*'))
        <script src="{{ asset('js/Planes/app.js') }}"></script>
        @endif
        @if (\Request::is('mejoras/*'))
        <script src="{{ asset('js/Mejoras/app.js') }}"></script>
        @endif
        @if (\Request::is('bsc/*'))
        <script src="{{ asset('js/BSC/app.js') }}"></script>
        @endif
    </body>
</html>