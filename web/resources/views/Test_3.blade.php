@extends('layouts.master')

@section('title', 'test js')

@section('head')

<style>

    * {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    canvas { 
        background: #eee; 
        display: block; 
        margin: 0 auto;
        
    }

    
</style>

<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>

@endsection



@section('header')
    @include('contents.test_js')

@endsection


@section('script')

<script>
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    var x = canvas.width/2;
    var y = canvas.height-30;
    var dx = 2;
    var dy = -2;
    var ballRadius = 5;
    var paddleHeight = 10;
    var paddleWidth = 75;
    var paddleX = (canvas.width-paddleWidth)/2;

    var rightPressed = false;
    var leftPressed = false;

    document.addEventListener("keydown", keyDownHandler, false);
    document.addEventListener("keyup", keyUpHandler, false);

    function keyDownHandler(e) {
        if(e.keyCode == 39) {
            rightPressed = true;
        }
        else if(e.keyCode == 37) {
            leftPressed = true;
        }
    }

    function keyUpHandler(e) {
        if(e.keyCode == 39) {
            rightPressed = false;
        }
        else if(e.keyCode == 37) {
            leftPressed = false;
        }
    }

    function drawBall() {
        // drawing code
        ctx.beginPath();
        ctx.arc(x, y, ballRadius, 0, Math.PI*2);
        ctx.fillStyle = "#FB0C9A";
        ctx.fill();
        ctx.closePath();
        
    }
    function drawPaddle() {
        ctx.beginPath();
        ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
        ctx.fillStyle = "#999999";
        ctx.fill();
        ctx.closePath();
    }
    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawBall();
        drawPaddle();
        if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
            dx = -dx;
            // ctx.fillStyle = "#444444";
            // ctx.fill();
        }
        
        if(y + dy < ballRadius) {
            dy = -dy;
            // ctx.fillStyle = "#0C4BFB";
            // ctx.fill();
        } else if(y + dy > canvas.height-ballRadius) {
            if(x > paddleX && x < paddleX + paddleWidth) {
                dy = -dy;
            }
            else {
                
                alert("Game Over. Are you sure you want to continue?");
	            
                window.location.href = window.location.href; 
                
            }
        }

        if(rightPressed && paddleX < canvas.width-paddleWidth) {
            paddleX += 10;
        }
        else if(leftPressed && paddleX > 0) {
            paddleX -= 10;
        }
        x += dx;
        y += dy;
    }
    setInterval(draw, 15);
    
</script>

@endsection