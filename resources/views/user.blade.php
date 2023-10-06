@extends('layouts.master')



<!-- Css render -->
@section('styles')

<link rel="stylesheet" href="userstyle.css">

@endsection


<!-- Content -->
@section('repeat')

Hello from User blade file.


<!-- If /else -->
@if(1==1)
    Yeah, It's correct!
@endif


@endsection




<!-- JS -->

@section('js')

<script src="userblade"></script>

@endsection