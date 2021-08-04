@extends('layouts.master-2')

@section('title', 'test tab')

@section('head')
<style type="text/css">

.preloader {
	background: #fff;
	position: fixed;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	z-index: 100000;
	-webkit-backface-visibility: hidden;
	-moz-backface-visibility: hidden;
	-o-backface-visibility: hidden;
	-ms-backface-visibility: hidden;
	backface-visibility: hidden;
}

.preloader .loader-status {
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	width: 54px;
	height: 54px;
	margin: auto;
}

.preloader .spinner {
	width: 100px;
	height: 100px;
	background-color: #F24141;
	border-radius: 100%;  
	-webkit-animation: sk-scaleout 1.5s infinite ease-in-out;
	animation: sk-scaleout 1.5s infinite ease-in-out;
}

.preloader .spinner > p {
	font-size: 1rem;
	color: white;
	text-align: center;
	line-height: 100px;
}

@-webkit-keyframes sk-scaleout {
	0% { -webkit-transform: scale(0) }
	100% {
		-webkit-transform: scale(1.0);
		opacity: 0;
	}
}

@keyframes sk-scaleout {
	0% { 
		-webkit-transform: scale(0);
		transform: scale(0);
	} 100% {
		-webkit-transform: scale(1.0);
		transform: scale(1.0);
		opacity: 0;
	}
}

.test:focus {
	outline: none;
}

.test span {
	position: relative;
	width: 30px;
	margin: 0 auto;
	background: #fff;
	-webkit-transition: background .2s .2s ease-in-out;
	-moz-transition: background .2s .2s ease-in-out;
	-o-transition: background .2s .2s ease-in-out;
	transition: background .2s .2s ease-in-out;
}

.test span,
.test span:before,
.test span:after {
	display: block;
	height: 2px;
	-webkit-background-clip: padding-box;
	-moz-background-clip: padding;
	background-clip: padding-box;
}

.test span:before,
.test span:after {
	position: absolute;
	content: '';
	width: 15px;
	background: #fff;
	-webkit-transform-origin: 50% 50%;
	-moz-transform-origin: 50% 50%;
	-o-transform-origin: 50% 50%;
	-ms-transform-origin: 50% 50%;
	transform-origin: 50% 50%;
	-webkit-transition: top .2s .4s ease-in-out, left .2s .2s ease-in-out, right .2s .2s ease-in-out, width .2s .2s ease-in-out, -webkit-transform .2s ease-in-out;
	-moz-transition: top .2s .4s ease-in-out, left .2s .2s ease-in-out, right .2s .2s ease-in-out, width .2s .2s ease-in-out, -moz-transform .2s ease-in-out;
	-o-transition: top .2s .4s ease-in-out, left .2s .2s ease-in-out, right .2s .2s ease-in-out, width .2s .2s ease-in-out, -o-transform .2s ease-in-out;
	transition: top .2s .4s ease-in-out, left .2s .2s ease-in-out, right .2s .2s ease-in-out, width .2s .2s ease-in-out, transform .2s ease-in-out;
}

.test span:before {
	top: 10px;
	left: 15px;
}

.test span:after {
	top: -10px;
	right: 15px;
}

.test.open span {
	background: transparent !important;
	-webkit-transition: background .2s 0s ease-in-out;
	-moz-transition: background .2s 0s ease-in-out;
	-o-transition: background .2s 0s ease-in-out;
	transition: background .2s 0s ease-in-out;
}

.test.open span:before,
.test.open span:after {
	top: 0;
	width: 30px;
	-webkit-transition: top .2s ease-in-out, left .2s .2s ease-in-out, right .2s .2s ease-in-out, width .2s .2s ease-in-out, -webkit-transform .2s .4s ease-in-out;
	-moz-transition: top .2s ease-in-out, left .2s .2s ease-in-out, right .2s .2s ease-in-out, width .2s .2s ease-in-out, -moz-transform .2s .4s ease-in-out;
	-o-transition: top .2s ease-in-out, left .2s .2s ease-in-out, right .2s .2s ease-in-out, width .2s .2s ease-in-out, -o-transform .2s .4s ease-in-out;
	transition: top .2s ease-in-out, left .2s .2s ease-in-out, right .2s .2s ease-in-out, width .2s .2s ease-in-out, transform .2s .4s ease-in-out;
}

.test.open span:before {
	left: 0;
	-webkit-transform: rotate3d(0, 0, 1, 45deg);
	-moz-transform: rotate3d(0, 0, 1, 45deg);
	-o-transform: rotate3d(0, 0, 1, 45deg);
	-ms-transform: rotate3d(0, 0, 1, 45deg);
	transform: rotate3d(0, 0, 1, 45deg);
}

.test.open span:after {
	right: 0;
	-webkit-transform: rotate3d(0, 0, 1, -45deg);
	-moz-transform: rotate3d(0, 0, 1, -45deg);
	-o-transform: rotate3d(0, 0, 1, -45deg);
	-ms-transform: rotate3d(0, 0, 1, -45deg);
	transform: rotate3d(0, 0, 1, -45deg);
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>

@endsection

@section('header')
  @include('contents.test_menubuttonanimate')
@endsection

@section('script')

<script>

  var myVar;

  function myFunction() {
      myVar = setTimeout(showPage, 450);
  }

  function showPage() {
      document.getElementById("preloader").style.display = "none";

  }
  $(function (){
    $('#test').on('click', function(event) {
      $(this).toggleClass('open');
    });

	//TweenMax.to('#logo', 6, {scale:0,ease:Bounce.easeIn});
	//TweenMax.from('#logo', 6, {scale:0,ease:Bounce.easeIn});

	//gsap.fromTo('#logo', {opacity:0},{opacity:1})

	// var tl = gsap.timeline();
  	// tl.from('#test-1', {duration: 2, opacity: 0, ease: "bounce.inOut"})
	// 	//1 second after end of timeline (gap)
	// 	.from('#test-2', {duration: 2, opacity: 0}, "-=1")
	// 	// .add("another", "+=1")
	// 	// .to("#test-1", {duration: 2, rotation: 360}, "another")

	var tween = gsap.to("#test-1",{duration: 3, opacity: 0, ease: "bounce.inOut"});

  });


</script>

@endsection