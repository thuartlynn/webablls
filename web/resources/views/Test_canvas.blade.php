@extends('layouts.master-2')

@section('title', 'test canvas')

@section('head')
<style type="text/css">

</style>

@endsection

@section('header')
  @include('contents.test_canvas')
@endsection

@section('script')

<script>

var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
// Create gradient
// var grd = ctx.createRadialGradient(75, 50, 5, 90, 60, 100);
// grd.addColorStop(0,"red");
// grd.addColorStop(1,"white");

// ctx.beginPath();

drawClock();

function drawClock(){
	console.log("沒進來");
	ctx.arc(95, 50, 20, 0, 2 * Math.PI);
	ctx.strokeStyle = "red";

	ctx.stroke();
}

</script>

@endsection