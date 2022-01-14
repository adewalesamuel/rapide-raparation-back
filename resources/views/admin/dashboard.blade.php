@extends('admin.layouts.main')
@section('content')
<div class="home-tab">
hello world
</div>    
@endsection
@push('scripts')
<script src={{asset("js/dashboard.js")}}></script>
@endpush