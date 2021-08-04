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

    .listTo {
        margin-top: 30px;
        color: #757575;
        font-size: 18px;
        padding: 0;
    }
    .listTo li{
        width: 100%;
        padding: 15px;
        background: #fff;
        margin: 10px auto;
        border-radius:12px;
        border: 1px dashed #e3e3e4;
        list-style:none;
        display: inline-flex;
        align-items:center;
        box-shadow: 0 0 6px 3px rgba(0, 0, 0, .12);
    }
    .listTo li:last-child{
        border-bottom: none;
    }
    .istyle{
        color: #f44336;
        margin-left:auto;
        width: 30px;
        cursor: pointer;
    }

    .testcss3{
        position:absolute;
        display: block;
        left:0;
        width:50px;
        height:50px;
        background:#f00;
        /* animation-name:oxxo;
        animation-duration:2s;
        animation-delay:2s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in; */
        animation:oxxo 2s 2s ease-in infinite;
    }

    @keyframes oxxo{
        0% {background-color:#333333;}
        50%{background-color:#f00;}
        50%{color:#ffffff;}
        100%{background:#000000;}
    }   

    #google_loading>div{
        left:100px;
        width:50px;
        height:100px;
        background-color: #9B59B6;
        border-radius:0 50px 50px 0;
        position:absolute;
        z-index:10;
        perspective:200px;
        transform:rotateY(0deg);
        animation:bgColor1 4s linear infinite both,rotate 4s infinite both;
        transform-origin:0 50%;
    }

    @keyframes bgColor1{
        0%  {background: #ffd539;}
        50% {background: #3a71f8;}
        100% {background: #3a71f8;}
    }

    @keyframes rotate{
        0%{
            -webkit-transform:rotate(0deg);
        }
        25%{
            -webkit-transform:rotate(90deg);
        }
        50%{
            -webkit-transform:rotate(180deg);
        }
        75%{
            -webkit-transform:rotate(270deg);
        }
        100%{
            -webkit-transform:rotate(0deg);
        }
    }

    #google_loading>div:after{
        content:'';
        position:absolute;
        z-index:10;
        top:0;
        left:-50px;
        width:50px;
        height:100px;
        border-radius:50px 0 0 50px;
        background:#ccc;
        animation:bgColor2 4s linear infinite both;
    }

    @keyframes bgColor2{
        0%  {background: #f52d27;}
        25% {background: #00b262;}
        75% {background: #f52d27;}
        100% {background: #f52d27;}
    }
    #google_loading>div:before{
        content:'';
        position:absolute;
        z-index:11;
        top:0;
        left:0px;
        width:50px;
        height:100px;
        border-radius:0 50px 50px 0;
        /* background-color:#FA1471; */
        transform-origin:0 50%;
        transform:rotateY(0deg) rotateZ(0deg);
        animation:flipColor 4s linear infinite both,flip 4s linear infinite both;
    }
    @keyframes flip{
        0%    {-webkit-transform:rotateY(0deg);}
        12.5% {-webkit-transform:rotateY(90deg);}
        25%   {-webkit-transform:rotateY(180deg);}
        37.5% {-webkit-transform:rotateY(90deg);}
        50%   {-webkit-transform:rotateY(0deg);}
        62.5% {-webkit-transform:rotateY(90deg);}
        75%   {-webkit-transform:rotateY(180deg);}
        87.5% {-webkit-transform:rotateY(90deg);}
        100%  {-webkit-transform:rotateY(0deg);}
    }
    @keyframes flipColor{
        0%    {background: #333333;}
        12.5% {background: #999999;}
        25%   {background: #333333;}
        37.5% {background: #999999;}
        50%   {background: #333333;}
        62.5% {background: #999999;}
        75%   {background: #333333;}
        87.5% {background: #999999;}
        100%  {background: #333333;}
    }

    .a{
        position:absolute;
        top:50px;
        left:50px;
        width:100px;
        height:100px;
        border-radius:50%;
        background:#363;
        transition:.2s;
    }
    .a::before,.a::after{
        content:"";
        position:absolute;
        width:12px;
        height:0;
        top:24px;
        border-style:solid;
        border-width:0 0 54px 0;
    }
    .a::before{
        left:27px;
        border-color:#fff rgba(255,255,255,0) #fff rgba(255,255,255,0);
        transition:.1s;
    }
    .a::after{
        left:54px;
        border-color: rgba(255,255,255,0) rgba(255,255,255,0) #fff #fff ;
        transition:.1s;
    }

    .a:hover:before{
        top:26px;
        left:45px;
        width:0;
        transform:scale(2,1.17) rotate(90deg);
        border-width:0 0 24px 24px;
        
    }
    .a:hover:after{
        top:53px;
        left:45px;
        width:0;
        transform:scale(2,1.17) rotate(90deg);
        border-width:0 24px 24px 0;
        
    }
    .a:hover{
        background:#095;
        transition:.4s;
    }

    .b{
  position:absolute;
  top:50px;
  left:160px;
  width:100px;
  height:100px;
  border-radius:50%;
  background:#09c;
  transition:.2s;
}
.b i{
  position:absolute;
  display:block;
  width:56px;
  height:10px;
  background:#fff;
  left:22px;
  border-radius:2px;
  transition:.2s;
}
.b1{
  top:24px;
}
.b2{
  top:44px;
}
.b3{
  top:64px;
}
.b:hover .b1{
  left:15px;
  width:70px;
  transform:translateY(20px) rotate(45deg);
}
.b:hover .b3{
  left:15px;
  width:70px;
  transform:translateY(-20px) rotate(-45deg);
}
.b:hover .b2{
  left:50px;
  width:0;
}

    #BorderBox {
        border-color: #333 #F90B9C #777 #999 ;
        border-style:solid;
        border-width:0 24px 24px 0;
        width:100px;
        height:100px;
        position:absolute;
        top:200px;
        left:100px;
        transform:scale(2,1.17) rotate(90deg);
    }

    #m{
        /* background-color: #666; */
        margin-top:250px;
        margin-left:50px;
        position:relative;
        width:50px;
        height:100px;
        overflow:hidden;
        border-radius:0 50px 50px 0;
        -webkit-animation:a 5s infinite linear;
    }

    #m:before,#m:after{
        content:"";
        box-sizing:border-box;
        position:absolute;
        top:0;
        right:0; 
        width:100px;
        height:50px;
        background:#0ce;
        border-style:solid;
        border-color:#555555;
        border-width:6px 6px 0;
        border-radius:50px 50px 0 0;
        transform-origin:50px 50px;
    }
    #m:before{
        z-index:1;
        -webkit-animation:a1 5s infinite linear;
        transform:rotate(-90deg);
    }
    #m:after{
        opacity:0;
        z-index:2;
        transform:rotate(90deg);
        -webkit-animation:a2 5s infinite linear;
    }

    @-webkit-keyframes a1{
        0%{ 
            transform:rotate(-90deg);
        }
        100%{ 
            transform:rotate(270deg);
        }
    }
    @-webkit-keyframes a2{
        0%{
            opacity:0;
        }
        49.99%{
            opacity:0;
        }
        50%{
            opacity:1;
        }
        100%{
            opacity:1;
        }
    }
    @-webkit-keyframes a{
        0%{
            margin-left:50px;
            width:50px;
            border-radius:0 50px 50px 0;
        }
        49.99%{
            margin-left:50px;
            width:50px;
            border-radius:0 50px 50px 0;
        }
        50%{
            margin-left:0;
            width:100px;
            border-radius:0;
        }
        100%{
            margin-left:0;
            width:100px;
            border-radius:0;
        }
    }

    input[type=range] {
        -webkit-appearance: none;
        width: 300px;
        border-radius: 10px; /*這個屬性設定使填充進度條時的圖形為圓角*/
        background: -webkit-linear-gradient(#059CFA, #059CFA) no-repeat;
        background-size: 0% 100%;
    }

    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
    }

    input[type=range]::-webkit-slider-runnable-track {
        height: 15px;
        border-radius: 10px; /*將軌道設為圓角的*/
        box-shadow: 0 1px 1px #def3f8, inset 0 .125em .125em #999; /*軌道內建陰影效果*/
    }
    input[type=range]:focus {
        outline: none;
    }

    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        height: 25px;
        width: 25px;
        margin-top: -5px; /*使滑塊超出軌道部分的偏移量相等*/
        background: #059CFA; 
        border-radius: 50%; /*外觀設定為圓形*/
        border: solid 0.125em rgba(225, 225, 225, 0.5); /*設定邊框*/
    }

    #test {

        background: #007991;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #78ffd6, #007991 70%, #007991);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #78ffd6, #007991 70%, #007991); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        width:500px;
        height:100px;
        display: block;
        margin:10px;
    }
</style>

<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/js/RangeSlider.js') }}"></script>


@endsection



@section('header')
    @include('contents.test_video')

@endsection


@section('script')



@endsection