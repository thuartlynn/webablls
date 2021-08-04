@extends('layouts.master')

@section('title', 'test Vue upload')

@section('head')

<style>

    html, body {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    body {
        height: 100vh;
        background: url("https://picsum.photos/2560/1440?random=30");  /* fallback for old browsers */
        -webkit-background: url("https://picsum.photos/2560/1440?random=30");  /* Chrome 10-25, Safari 5.1-6 */
        -o-background: url("https://picsum.photos/2560/1440?random=30"); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    
    .side-menu{
        position: relative;
        width: 300px;
        height: 100vh;
        padding: 50px 0;
        box-sizing: border-box;
        background-image: linear-gradient(0deg,#FFFFFF,#E6E6E6);
        display: flex; /*有待商榷*/
        flex-direction: column;
        box-shadow: 5px 0px 10px hsla(240, 40%, 15%,.6);
        transform: translateX(-100%);
        transition: .3s;
    }
    .side-menu form{
        display: flex;
        margin: 0 10px 50px;
        border-radius: 100px;
        border:1px solid rgb(255,255,255,.4);
    }
    .side-menu form input,
    .side-menu form button{
        border:none;
        background-color: transparent;
        color: #fff;
        padding: 5px 10px;
    }
    .side-menu form input{
        width: 230px;
    }
    .side-menu form button{
        width: 50px;
    }
    .side-menu form input:focus,
    .side-menu form button:focus{
        outline: none;
    }
    .side-menu label{
        position: absolute;
        width: 40px;
        height: 80px;
        background-color: #000;
        color: #fff;
        right: -40px;
        top: 0;
        bottom: 0;
        margin: auto;
        line-height: 80px;
        text-align: center;
        font-size: 30px;
        border-radius: 0 10px 10px 0;
    }
    #side-menu-switch{
        position: absolute;
        opacity: 0;
        z-index: -1;
    }
    #side-menu-switch:checked + .side-menu{
        transform: translateX(0);
    }
    #side-menu-switch:checked + .side-menu label .fa{
        transform: scaleX(-1);
    } 
    .side-menu .nav > li > a{
        display: block;
        padding: 10px;
        color: #333;
        text-decoration: none;
        /* position: relative; */
    }
    /* .nav li{
        position: relative;
    } */
    /* .nav li + li a::before{
        content: '';
        position: absolute;
        border-top: 1px solid rgb(255,255,255,.4);
        left: 10px;
        right: 10px;
        top: 0;
    }
    .nav a .fa{
        margin-right: -1.1em;
        transform: scale(0);
        transition: .3s;
    }
    .nav li:hover .fa{
        margin-right: 0em;
        transform: scale(1);
    } */
    /* .nav li:hover > a{
        background-color: rgba(0,0,0,.5);
    }

    .nav > li > ul{
        display: none;
        position: absolute;
        left: 100%;
        width: 300px;
        top: 6px;
        background-color: rgba(255,255,255,.2);
        box-shadow: 5px 5px 10px hsla(240, 40%, 15%,.6);
    }

    .nav li:hover > ul{
        display: block;
    } */

    .login{
        width:500px;
        height:500px;
        background-color: rgba(0,0,0,.5);
        box-shadow: 0 0 60px #555;
        backdrop-filter:blur(20px);
        position: absolute;
        top: 10%;
        right: 25%;
        z-index: 99;
    }

    a{text-decoration:none}

    .main-timeline {
        position: relative
    }
    .main-timeline:before {
        content: "";
        width: 5px;
        height: 100%;
        border-radius: 20px;
        margin: 0 auto;
        background: #242922;
        position:absolute;
        top:0;
        left:0;
        right:0
    }
    .main-timeline .timeline {
        display:inline-block;
        margin-bottom:50px;
        position:relative
    }
    .main-timeline .timeline:before {
        content:"";
        width:20px;
        height:20px;
        border-radius:50%;
        border:4px solid #fff;
        background: #ec496e;
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 1;
        transform: translate(-50% , -50% );
    }
    .main-timeline .timeline-icon {
        display: inline-block;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 3px solid #ec496e;
        padding: 13px;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 30%;
        transform: translateY(-50%);
    }
    .i-size {
            display: block;
            border-radius: 50%;
           
            font-size: 6.25rem;
            color: #fff;
            line-height: 100px;
            z-index: 1;
            position: relative;
    }
    .main-timeline .timeline-icon:after,
    .main-timeline .timeline-icon:before {
        content: "";
        width: 100px;
        height: 4px;
        background: #ec496e;
        position: absolute;
        top: 50%;
        right: -100px;
        transform: translateY(-50%);
    }
    .main-timeline .timeline-icon:after {
        width: 70px;
        height: 40px;
        background: #ffffff;
        top: 90%;
        right: -30px;
    }
    .main-timeline .timeline-content {
        width: 50%;
        padding: 0 50px;
        margin: 70px 0 0;
        float: right;
        position: relative;
    }
    .main-timeline .timeline-content:before {
        content: "";
        width: 70%;
        height: 100%;
        border: 3px solid #ec496e;
        border-top: none;
        border-right: none;
        position: absolute;
        bottom: -13px;
        left: 35px;
    }
    .main-timeline .timeline-content:after {
        content: "";
        width: 37px;
        height: 3px;
        background: #ec496e;
        position: absolute;
        top: 13px;
        left: 0
    }
    .main-timeline.title {
        font-size: 20px;
        font-weight: 600;
        color: #ec496e;
        text-transform: uppercase;
        margin: 0 0 5px;
    }
    .main-timeline .description {
        display: inline-block;
        font-size: 1rem;
        font-weight: 300;
        color: #404040;
        line-height:20px;
        letter-spacing:1px;
        margin: 0 0 0 20px;
    }
    .main-timeline .timeline:nth-child(even) .timeline-icon {
        left:auto;
        right:30%;
    }
    .main-timeline .timeline:nth-child(even) .timeline-icon:before {
        right:auto;
        left:-100px;
    }
    .main-timeline .timeline:nth-child(even) .timeline-icon:after {
        right:auto;
        left:-30px;
    }
    .main-timeline .timeline:nth-child(even) .timeline-content {
        float:left
    }
    .main-timeline .timeline:nth-child(even) .timeline-content:before {
        left:auto;
        right:35px;
        transform:rotateY(180deg)
    }
    .main-timeline .timeline:nth-child(even) .timeline-content:after {
        left:auto;
        right:0;
    }
    .main-timeline .timeline:nth-child(odd) .timeline-icon {
        background: #ec496e;
    }
    .main-timeline .timeline:nth-child(even) .timeline-content:after,
    .main-timeline .timeline:nth-child(even) .timeline-icon,
    .main-timeline .timeline:nth-child(even) .timeline-icon:before,
    .main-timeline .timeline:nth-child(even):before {
        background: #f9850f;
    }
    .main-timeline .timeline:nth-child(even) .timeline-icon {
        border-color: #f9850f;
    }
    .main-timeline .timeline:nth-child(even) .title {
        color: #f9850f
    }
    .main-timeline .timeline:nth-child(2n) .timeline-content:before {
        border-left-color: #f9850f;
        border-bottom-color: #f9850f;
    }
    
    @media only screen and (max-width:1200px) {
        .main-timeline .timeline-icon:before {
            width: 50px;
            right: -50px
        }
        .main-timeline .timeline:nth-child(even) .timeline-icon:before {
            right: auto;
            left: -50px;
        }
        .main-timeline .timeline-content {
            margin-top: 75px;
        }
    }
    @media only screen and (max-width:990px) {
        .main-timeline.timeline {
            margin: 0 0 10px;
        }
        .main-timeline .timeline-icon {
            left: 25%;
        }
        .main-timeline .timeline:nth-child(even) .timeline-icon {
            right: 25%;
        }
        .main-timeline .timeline-content {
            margin-top: 115px;
        }
    }
    @media only screen and (max-width:767px) {
        .main-timeline {
            padding-top: 50px;
        }
        .main-timeline:before {
            left: 80px;
            right: 0;
            margin: 0;
        }
        .main-timeline .timeline {
            margin-bottom: 70px;
        }
        .main-timeline .timeline:before {
            top: 0;
            left: 83px;
            right: 0;
            margin: 0;
        }
        .main-timeline .timeline-icon {
            width: 60px;
            height: 60px;
            line-height: 40px;
            padding: 5px;
            top: 0;
            left: 0
        }
        .main-timeline .timeline:nth-child(even) .timeline-icon {
            left: 0;
            right: auto;
        }
        .main-timeline .timeline-icon:before,
        .main-timeline .timeline:nth-child(even) .timeline-icon: before {
            width: 25px;
            left: auto;
            right: -25px;
        }
        .main-timeline .timeline-icon:after,
        .main-timeline .timeline:nth-child(even) .timeline-icon:after {
            width: 25px;
            height: 30px;
            top: 44px;
            left: auto;
            right: -5px;
        }
        .main-timeline .timeline-icon i {
            font-size: 30px;
            line-height: 45px;
        }
        .main-timeline .timeline-content,
        .main-timeline .timeline:nth-child(even) .timeline-content {
            width: 100%;
            margin-top: -15px;
            padding-left: 130px;
            padding-right: 5px;
        }
        .main-timeline .timeline:nth-child(even) .timeline-content {
            float: right;
        }
        .main-timeline .timeline-content:before,
        .main-timeline .timeline:nth-child(even) .timeline-content:before {
            width: 50 % ;
            left: 120px
        }
        .main-timeline .timeline:nth-child(even) .timeline-content:before {
            right: auto;
            transform: rotateY(0);
        }
        .main-timeline .timeline-content:after,
        .main-timeline .timeline:nth-child(even) .timeline-content:after {
            left: 85px;
        }
    }
    @media only screen and (max-width:479px) {
        .main-timeline .timeline-content, 
        .main-timeline .timeline:nth-child(even) .timeline-content {
            padding-left: 110px;
        }
        .main-timeline .timeline-content:before,
        .main-timeline .timeline:nth-child(even) .timeline-content:before {
            left: 99px;
        }
        .main-timeline .timeline-content:after,
        .main-timeline .timeline:nth-child(even) .timeline - content:after {
            left: 65px;
        }
    }

    ul{
        width: 960px;
        margin: auto;
        padding: 100px 0;
        display: flex;
        flex-wrap: wrap;
        list-style: none;
    }
    li{
        width: 200px;
        height: 200px;
        text-align: center;
        line-height: 200px;
        margin: 0 60px -40px;
        position: relative;
        font-size: 1rem;
    }
    li::before{
        content: '';
        position: absolute;
        z-index: -1;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        border: #cccccc 1px solid;
        transform: rotate(45deg);
    }
    li:nth-child(n+4){
        left: 160px;
    }
    li:nth-child(n+7){
        left: 0;
    }
    .box1::before{ background-color: #3ed0cd; }
    .box2::before{ background-color: #b2e086; }
    .box3::before{ background-color: #ef8899; }
    .box4::before{ background-color: #fc7b51; }
    .box5::before{ background-color: #2fccf9; }
    .box6::before{ background-color: #5f539b; }
    .box7::before{ background-color: #fce920; }
    .box8::before{ background-color: #7cc85c; }
    .box9::before{ background-color: #ffa55e; }
    li:hover{
        color: #fff;
    }
    li:hover::before{
        background-color: #000;
    }

    .banner{
		height: 700px;
		background: url('https://picsum.photos/2560/1440?random=100') center top / cover;
	}
	.sec {
		position: relative;
	}
	.sec .container{
		width: 1200px;
		margin: auto;
		display: flex;
		padding: 100px 0;
		position: relative;
		z-index: 2;
	}
	.sec .item{
		width: 570px;
		margin: 0 15px;
		font-family: 'Noto Sans TC', sans-serif;
	}
	.sec .item h2{
		margin-bottom: 1.3em;
	}
	.sec .item p{
		line-height: 1.7;
		margin-bottom: 1.6em;
	}
	.sec::after{
		content: '';
		display: block;
		position: absolute;
		width: 200px;
		height: 200px;
		background-color: #FFF;
		top: 0;
		left: 50%;
		transform: translateX(-30%) translateY(-50%);
		border-radius: 50%;
		box-shadow: 178px 0 0 30px #fff,
					327px 34px 0 20px #fff,
					480px 9px 0 60px #fff,
					690px 71px 0 60px #fff,
					880px 0 0 89px #fff,

					-178px 0 0 30px #fff,
					-327px 34px 0 20px #fff,
					-480px 9px 0 60px #fff,
					-690px 71px 0 60px #fff,
					-880px 0 0 89px #fff,
					-1100px 50px 0 89px #fff,
					       
					100px 0px 0 56px rgba(0,0,10,.5),
					298px 10px 0 56px rgba(0,0,10,.5),
					540px -40px 0 50px rgba(0,0,10,.5),
					740px -30px 0 30px rgba(0,0,10,.5),
					880px -100px 0 80px rgba(0,0,10,.5),
					1000px 0px 0 80px rgba(0,0,10,.5),

							/*...*/
					-60px 0px 0 56px rgba(0,0,10,.5),
					-298px 10px 0 56px rgba(0,0,10,.5),
					-540px -40px 0 50px rgba(0,0,10,.5),
					-740px -30px 0 30px rgba(0,0,10,.5),
					-780px -70px 0 80px rgba(0,0,10,.5),
					-1200px 0px 0 80px rgba(0,0,10,.5);
	}
    .sec::before{
        content: '';
        position: absolute;
        width: 100%;
        height: 200px;
        background-color: #fff;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .wrap2{
        margin: 100px 0;
    }
    .container{
        width: 99%;
        margin: auto;
        display: flex;
        justify-content: flex-end;
        box-shadow: 0 0 30px #ccc;
        position: relative;
        overflow: hidden;
    }
    .container h1{
        width: 100%;
        flex-shrink: 0;
        box-sizing: border-box;
        font-size: 10rem;
        padding-left: 15px;
        color: rgba(200,200,200,.3);
        position: absolute;
        left: 0;
        top: 50px;
        line-height: 1em;
    }
    .container .txt{
        width: 600px;
        flex-shrink: 0;
        box-sizing: border-box;
        column-count: 2;
        column-gap: 30px;
        padding: 15px;
        position: relative;
        z-index: 1;
    }
    .container .txt p{
        margin-bottom: 1em;
    }
    .container .txt p:first-child:first-letter{
        font-size: 60px;
        float: left;
        padding-right: 10px;
    }

    input[type="text"]:focus{
        background-color: #F9850F;
    }
    
</style>

<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/js/pdf/jspdf.js') }}"></script>
<script src="https://cdn.bootcss.com/jspdf/1.3.5/jspdf.debug.js"></script>

@endsection



@section('header')
    @include('contents.test_sidemenu')

@endsection


@section('script')

<script>
    
    
</script>

@endsection