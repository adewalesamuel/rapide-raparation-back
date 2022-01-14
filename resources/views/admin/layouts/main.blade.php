@include('admin.shared.header')
@include('admin.shared.navbar')
    <div class="container-fluid page-body-wrapper"> 
        @include('admin.shared.sidebar')    
        <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
            <div class="col-sm-12">
                @yield('content')
            </div>
            </div>
        </div>
@include('admin.shared.footer')
