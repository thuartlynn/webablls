@extends('layouts.master-2')

@section('title', 'test video bg')

@section('head')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Krona+One&display=swap');

    body {
        margin: 0;
        font-family: 'Roboto', sans-serif;
        font-size: 1rem;
           
    }
    .header {
        top: 0;
        width: 100vw;
        background-color: #777;
    }
    .top_content {
        background-color: #999;
    }

    /* #myVideo {
        position: fixed;
        left: 0;
        bottom: 0;
        min-width: 100%; 
        min-height: 100%;
        
    }

    .content {
        position: fixed;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        color: #f1f1f1;
        width: 100%;
        padding: 20px;
    }

    .content h1 { color: #f1f1f1; }

    #myBtn {
        width: 200px;
        font-size: 18px;
        padding: 10px;
        border: none;
        background: #000;
        color: #fff;
        cursor: pointer;
    }

    #myBtn:hover {
        background: #ddd;
        color: black;
    } */

    .collapsible {
        background-color: #777;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }

    .active, .collapsible:hover {
        background-color: #555;
    }

    .content {
        padding: 1rem;
        display: none;
        overflow: hidden;
        background-color: #f1f1f1;
    }


    /* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
    .flip-card {
        background-color: transparent;
        width: 300px;
        height: 400px;
        border: 1px solid #f1f1f1;
        perspective: 1000px; /* Remove this if you don't want the 3D effect */
    }
    /* This container is needed to position the front and back side */
    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.4s;
        transform-style: preserve-3d;
    }

    /* Do an horizontal flip when you move the mouse over the flip box container */
    .flip-card:hover .flip-card-inner {
        transform: rotateX(180deg);
    }

    /* Position the front and back side */
    .flip-card-front, .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        -webkit-backface-visibility: hidden; /* Safari */
        backface-visibility: hidden;
    }

    /* Style the front side (fallback if image is missing) */
    .flip-card-front {
        /* background-color: #bbb; */
        color: black;
    }

    /* Style the back side */
    .flip-card-back {
        height: 100%;
        background-color: dodgerblue;
        color: white;
        transform: rotateX(180deg);
    }

    .image-container {
        background-image: url("images/person-01.jpg"); /* The image used - important! */
        background-size: cover; 
        position: relative; /* Needed to position the cutout text in the middle of the image */
        height: 300px; /* Some height */
        margin-top: 5rem;
    }

    .text {
        font-family: 'Krona One';
        background-color: white;
        color: black;
        font-size: 10vw; /* Responsive font size */
        margin: 0 auto; /* Center the text container */
        padding: 10px;
        text-align: center; /* Center text */
        position: absolute; /* Position text */
        top: 50%; /* Position text in the middle */
        left: 50%; /* Position text in the middle */
        transform: translate(-50%, -50%); /* Position text in the middle */
        mix-blend-mode: screen; /* This makes the cutout text possible */
    }

    #testlogo {
        background-color: #f1f1f1;
        padding: 50px 10px;
        color: black;
        text-align: center;

        width: 50%;
        transition: 0.4s;
    }
</style>

<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/js/RangeSlider.js') }}"></script>


@endsection



@section('header')
    
        @include('contents.test_collapsibles')
    
@endsection

@section('script')



@endsection