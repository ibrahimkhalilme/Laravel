@extends('layouts.master')


<!-- Css render -->
@section('styles')

<link rel="stylesheet" href="poststyle.css">

@endsection


<!-- Ceontent -->
@section('repeat')

Hello I'm from Post Blade file.

<!-- If Else --
@if(1==1)
Yes, It's correct
@endif

-->

<!-- If Else MUltiple -->
@if(1==2)  <!-- If it's false then, else will execute | 1==2 -->
Yes, correct


<!-- If else false then, if will execute. -->
@elseif(1**1)
Else if is executing....

@endif


@endsection





<!-- JS -->

@section('js')

<script src="postblade"></script>

@endsection