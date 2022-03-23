@include('commercial-terrain.shared.header')
@include('commercial-terrain.shared.navbar')
    <div class="container-fluid page-body-wrapper"> 
        @include('commercial-terrain.shared.sidebar')    
        <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
            <div class="col-sm-12">
                @yield('content')
            </div>
            </div>
        </div>
@include('commercial-terrain.shared.footer')
