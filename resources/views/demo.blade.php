<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tiêu đề trang</title>
    <link rel="stylesheet" href="đường_dẫn_tới_file_css" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<x-test-text/>
{{-- <h2></h2>
@include('header'); --}}
<h2>đây là Log In</h2>
    <p ><img style="width:20%; height: 20%;" src="storage/bg.jpg" alt="" ></p>
    
    <a class="btn btn-success" href="{{route('download').'?imge='.public_path('storage/bg.jpg')}}">download ảnh</a>
    <a class="btn btn-success" href="{{route('downloaddoc').'?file='.public_path('storage/demo.pdf')}}">download file</a>
@section('header')
    @include('header')
    @show
@yield('test')
<h2>đây là Sign In</h2>
@yield('signin')
<script src="đường_dẫn_tới_file_js"></script>
</body>
</html>