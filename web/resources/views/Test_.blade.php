@extends('layouts.master')

@section('title', 'test web-layout')

@section('head')

<style>

    html, body {
        background-color: #efeeef;
        margin: 0;
        padding: 0;
        list-style: none;
        font-size:12px;
    }
    body {
        height: 100vh;
    }

    h2 {
        font-size: 2rem;
    }

    p {
        font-size: 1rem;
    }
    .page_header {
        top: 0;
        width: 100vw;
        z-index: 99;
    }
    .top_content {
        margin-bottom:100px;
    }
    .left_content {
    }
    .right_top_content {
    }
    .right_bottom_content {
    }
    .bottom_content {
        clear: both;
        z-index: 23;
    }
    .page_footer {
        clear: both;
        -webkit-flex: 1;
        z-index: 10;
    }
    #email_error_msg { 
        color: red;   
        padding:2px 5px;
    }
    #send_pwd_msg {
        width: 100%;
        text-align: left;
        line-height: 48px;
        color: rgb(50,150,250);
        margin: 0;
        padding: 0;
    }
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }
    .video-container iframe, .video-container object, .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* 進度條的css */
    .progress {
    position:relative; 
    width:400px;
    height: 25px; 
    border: 1px solid #ddd; 
    padding: 1px; 
    border-radius: 3px; 
    }
    .bar { 
    background-color: #7cc7ee; 
    width:0%; 
    height:20px; 
    border-radius: 3px; 
    }
    .percent { 
    position:absolute; 
    display:inline-block; 
    top:3px; 
    left:48%; 
    }

    .banner{
        width: 100%;
        height: 600px;
        position: inherit;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        position: relative;
        z-index: 0;
        background-color: #ccc;
        background:
            linear-gradient(115deg, #F1C40F 35%, transparent 75%) center center / 100% 100%,
            url(https://picsum.photos/1920/1080?random=100) right center / auto 100%;
    }
    /* .container{
        max-width: 100vw;
        height: 100%;
        margin: auto;
    } */
    /* .banner-txt{
        height: 100%;
        display: -webkit-box;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
                flex-direction: column;
        -webkit-box-pack: center;
                justify-content: center;
        -webkit-box-align: start;
                align-items: flex-start;
    }
    .banner-txt h1{
        font-size: 80px;
        border-bottom: 1px solid #333;
        font-weight: 900;
        padding-bottom: .3em;
        margin-bottom: .3em;
    }
    .banner-txt h1 small{
        display: block;
        font-size: 53px;
        font-weight: 700;
    }
    .banner-txt h2{
        font-size: 50px;
        font-weight: 700;
    }
    .banner-txt p{
        font-size: 20px;
        font-weight: 300;
        /* padding-left: 1.25rem; */
    } */

    /* .main-header{
        position:absolute;
        top:10;
        padding:0;
        width:100vw;
        height:20px;
        z-index: 9999;
        background: linear-gradient(45deg,#ffffff,#000000,transparent 60%);
    } */

    #mainNav for test gradients {
        /* background-color: linear-gradient(45deg, #555555,#ffffff, transparent 10%); */
        background-image: -webkit-linear-gradient(to right, #434343 0%, black 100%);
        background-image: -o-linear-gradient(to right, #434343 0%, black 100%);
        background-image: -moz-linear-gradient(to right, #434343 0%, black 100%);
        background-image: linear-gradient(to right, #434343 0%, black 100%);
        opacity: 0.6;
        position: absolute;
        top:0;
        z-index: 9999;
    }

    .ftco-navbar-light {
        background: transparent !important;
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        z-index: 3;
        padding: 0; 
    }

    @media (max-width: 991.98px) {
        .ftco-navbar-light {
            background: #000000 !important;
            position: relative;
            top: 0;
            padding: 10px 15px; } }
        .ftco-navbar-light .navbar-brand {
            color: #000000; }
        .ftco-navbar-light .navbar-brand:hover {
            color: #000000; }
    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-brand {
        color: #fff; } }
  @media (max-width: 991.98px) {
    .ftco-navbar-light .navbar-nav {
      padding-bottom: 10px; } }
  .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
    font-size: 15px;
    padding-top: .9rem;
    padding-bottom: .9rem;
    padding-left: 20px;
    padding-right: 20px;
    color: #F0F0F0;
    font-weight: 600;
    opacity: 1 !important; }
    .ftco-navbar-light .navbar-nav > .nav-item > .nav-link:hover {
      color: #FF0A73; }
    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
        padding-left: 0;
        padding-right: 0;
        padding-bottom: 0;
        color: #fff; } }
  .ftco-navbar-light .navbar-nav > .nav-item .dropdown-menu {
    border: none;
    background: #fff;
    -webkit-box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41);
    -moz-box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41);
    box-shadow: 0px 10px 34px -20px rgba(0, 0, 0, 0.41); }
  .ftco-navbar-light .navbar-nav > .nav-item.ftco-seperator {
    position: relative;
    margin-left: 20px;
    padding-left: 20px; }
    @media (max-width: 991.98px) {
      .ftco-navbar-light .navbar-nav > .nav-item.ftco-seperator {
        padding-left: 0;
        margin-left: 0; } }
    .ftco-navbar-light .navbar-nav > .nav-item.ftco-seperator:before {
      position: absolute;
      content: "";
      top: 10px;
      bottom: 10px;
      left: 0;
      width: 2px;
      background: rgba(255, 255, 255, 0.05); }
      @media (max-width: 991.98px) {
        .ftco-navbar-light .navbar-nav > .nav-item.ftco-seperator:before {
          display: none; } }
  .ftco-navbar-light .navbar-nav > .nav-item.cta > a {
    color: #fff;
    border: 1px solid #21bf73;
    padding-top: .5rem;
    padding-bottom: .5rem;
    padding-left: 18px;
    padding-right: 18px;
    margin-top: 4px;
    background: #FF0A73;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
    border-radius: 2px; }
    .ftco-navbar-light .navbar-nav > .nav-item.cta > a span {
      display: inline-block;
      color: #fff; }
    .ftco-navbar-light .navbar-nav > .nav-item.cta > a:hover {
      background: #FF0A73;
      border: 1px solid #FF0A73; }
  .ftco-navbar-light .navbar-nav > .nav-item.cta.cta-colored a {
    border: 1px solid #FF0A73;
    background: #FF0A73 !important; }
  .ftco-navbar-light .navbar-nav > .nav-item.active > a {
    color: #FF0A73; /* active 變色*/}
  @media (max-width: 991.98px) {
    .ftco-navbar-light .navbar-nav > .nav-item.active > a {
      color: #FF0A73; } }
  .ftco-navbar-light .navbar-toggler {
    border: none;
    color: rgba(255, 255, 255, 0.5) !important;
    cursor: pointer;
    padding-right: 0;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: .1em; }
    .ftco-navbar-light .navbar-toggler:hover, .ftco-navbar-light .navbar-toggler:focus {
      text-decoration: none;
      color: #FF0A73;
      outline: none !important; }
  .ftco-navbar-light.scrolled {
    position: fixed;
    right: 0;
    left: 0;
    top: 0;
    margin-top: -130px;
    background: #fff !important;
    -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1); }
    @media (max-width: 991.98px) {
      .ftco-navbar-light.scrolled .nav-item > .nav-link {
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-bottom: 0 !important; } }
    .ftco-navbar-light.scrolled .nav-item.active > a {
      color: #FF0A73 !important; }
    .ftco-navbar-light.scrolled .nav-item.cta > a {
      color: #fff !important;
      background: #FF0A73;
      border: none !important;
      padding-top: 0.5rem !important;
      padding-bottom: .5rem !important;
      padding-left: 20px !important;
      padding-right: 20px !important;
      margin-top: 6px !important;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      border-radius: 5px; }
      .ftco-navbar-light.scrolled .nav-item.cta > a span {
        display: inline-block;
        color: #fff !important; }
    .ftco-navbar-light.scrolled .nav-item.cta.cta-colored span {
      border-color: #FF0A73; }
    @media (max-width: 991.98px) {
      .ftco-navbar-light.scrolled .navbar-nav {
        background: none;
        border-radius: 0px;
        padding-left: 0rem !important;
        padding-right: 0rem !important; } }
    .ftco-navbar-light.scrolled .navbar-toggler {
      border: none;
      color: rgba(0, 0, 0, 0.5) !important;
      border-color: rgba(0, 0, 0, 0.5) !important;
      cursor: pointer;
      padding-right: 0;
      text-transform: uppercase;
      font-size: 16px;
      letter-spacing: .1em; }
    .ftco-navbar-light.scrolled .nav-link {
      padding-top: 0.9rem !important;
      padding-bottom: 0.9rem !important;
      color: #000000 !important; }
      .ftco-navbar-light.scrolled .nav-link.active {
        color: #FF0A73 !important; }
    .ftco-navbar-light.scrolled.awake {
      margin-top: 0px;
      -webkit-transition: .3s all ease-out;
      -o-transition: .3s all ease-out;
      transition: .3s all ease-out; }
    .ftco-navbar-light.scrolled.sleep {
      -webkit-transition: .3s all ease-out;
      -o-transition: .3s all ease-out;
      transition: .3s all ease-out; }
    .ftco-navbar-light.scrolled .navbar-brand {
      color: #000000; }

    .test-transition-nav {
        background-image: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
        padding: 50px 0;
    }
    .test-transition-nav a{
        text-decoration: none;
        color: #fff;
        padding: 5px 1em;
        position: relative;
        display: inline-block !important; 
        transform: translateY(0px);
        -webkit-transform:translateY(0px);
        -moz-transform:translateY(0px);
        -o-transform:translateY(0px); 
        transition: .3s;
    }
    .test-transition-nav a:hover {
	    transform: translateY(-10px);
        -webkit-transform:translateY(-10px);
        -moz-transform:translateY(-10px);
        -o-transform:translateY(-10px);
        /* transition: .6s; */
    }
    .test-transition-nav a:after {
        content: '';
        position: absolute;
        left: 50%;
        right: 50%;
        bottom: 0px;
        height: 0;
        border-bottom: 1px solid #fff;
        transition: .5s;

    }

    .main-nav a:hover:after{
        left: 0;
        right: 0;
    }

    .wrap{
	width: 100%;
	display: flex;
	
    }
    .item{
        width: 25%;
        position: relative;
    }
    .item img{
        width: 100%;
        vertical-align: middle;
    }
    .item .txt{
        position: absolute;
        top: -10;
        right: 0;
        bottom: 0;
        left: 0;
        padding: 20px;
        background-color: rgba(0,0,0,.6);
        display: flex;
        justify-content: center;
        flex-direction: column;
        opacity: 0;
        transition: opacity 1s;
    }
    .item:hover .txt{
        opacity: .8;
    }
    .item h2{
        font-size: 24px;
        color: #ff0;
        font-weight: 500;
    }
    .item h2:after{
        content: '';
        display: block;
        width: 0%;
        height: 1px;
        margin: 10px 0;
        background-color: #ff0;
        transition: width .5s .3s;
    }
    .item:hover h2:after{
        width: 100%;
    }
    .item p{
        font-size: 14px;
        color: #fff;
        font-weight: 100;
    }

    .wrap2{
        width: 100%;
        display: flex;
        margin: 0;
        padding-right: 2%;
        padding-left: 2%;
        background-color: #65E327;
    }
    .item2{
        width:  30%;
        margin: 2.2%;
        text-align: center;
        background-color: #fff;
        border: 1px solid #ccc;
        transform: translateY(0px);
        transition: .5s;
    }
    .item2 img{
        width: 100%;
        vertical-align: middle;
    }
    .item2 h2{
        border-bottom: 1px solid #888;
        padding-bottom: .3em;
        margin-bottom: .4em;
        font-weight: 900;
        transition: .25s;
    }
    .item2 p{
        line-height: 1.6;
        font-weight: 300;
        transition: .25s;
    }
    .item2 .txt{
        padding: 20px;
        position: relative;
    }
    .item2 .txt:before{
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        left: 0;
        top: 0;
        border-top: 50px solid transparent;
        border-left: 50px solid #fff;
        border-right: 50px solid #fff;
        transform: translateY(-100%);
    }
    .item2:hover{
        transform: translateY(-20px);
    }
    .item2:hover .txt{
        background-image: linear-gradient(to top,#B01B59, #FF0A6E);
    }
    .item2:hover .txt:before{
        border-left: 184px solid #FF0A6E;
        border-right: 184px solid #FF0A6E;
    }
    .item2:hover h2{
        color: #fff;
        border-bottom-color: #fff;
    }
    .item2:hover p{
        color: #fff;
    }

    .wrap3{
        width: 100%;
        margin: auto;
        background-image: linear-gradient(to top,#FBFBFB, #8D8D8D);
    }
    .item3{
        display: flex;
        align-items: center;
        margin-bottom: 70px;
    }
    .item3 h2{ 
        font-weight: 900;
        margin-bottom: 1em;
    }
    .item3 p{ 
        font-weight: 300;
        line-height: 1.6;
    }
    .item3 .pic{
        width: 55%;
        flex-shrink: 0;
    }
    .item3 .pic img{
        width: 100%;
        vertical-align: middle;
    }
    .item3 .txt{
        width: 55%;
        flex-shrink: 0;
        padding: 50px 30px;
        box-sizing: border-box;
        position: relative;
        z-index: 1;
    }
    .item3 > :first-child{
        margin-right: -10%;
    }
    .item3:nth-child(1) .txt{
        background-color: rgba(240, 174, 193, .8);
    }
    .item3:nth-child(2) .txt{
        background-color: rgba(42, 253, 208, .8);
    }
    .item3:nth-child(3) .txt{
        background-color: rgba(254, 201, 121, .8);
    }
    .item3:nth-child(4) .txt{
        background-color: rgba(149, 219, 214, .8);
    }
    
    .wrap4{
        width: 100%;
        height:500px;
        /* margin: 0 !important;
        padding: 0 !important; */
        overflow: hidden;
        
    }
    .item4{
        position: relative;
        float: left;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
    /* .item4 img{
        width: 100%;
        vertical-align: middle;
    } */
    .item4:first-child{
        background-image: url("https://picsum.photos/1024/768?random=10");
        
        width: 50%;
        height:100%; 
    }
    .item4:not(:first-child){
        float: left;
        width: 25%;
        height:50%;
    }
    .item4:nth-child(2) {
        background-image: url("https://picsum.photos/1024/768?random=20");
    }
    .item4:nth-child(3) {
        background-image: url("https://picsum.photos/1024/768?random=30");
    }
    .item4:nth-child(4) {
        background-image: url("https://picsum.photos/1024/768?random=40");
    }
    .item4:nth-child(5) {
        background-image: url("https://picsum.photos/1024/768?random=50");
    }
    .item4 .txt{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        padding: 15px;
        box-sizing: border-box;
        text-align: center;
        color: #fff;
        background-color: rgba(0,0,0,.7);
        display: flex;
        opacity: 0;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transform: scale(0);
        transition: .5s;
    }
    .item4:hover .txt{
        transform: scale(1);
        opacity: 1;
    }
    .item4 h3{
        margin-bottom: .4em;
        color: #cfd9df;
    }
    .item4 p{
        font-weight: 100;
        line-height: 1.7;
    }
    .body{
        display: flex;
        align-items: center;
        background-image: linear-gradient(-45deg,#fffaf0,#f8c3c1 );
    }
    .wrap5{
        display: flex;
        width: 1200px;
        margin: 100px auto;
        /*background-color: #999;*/
        padding-top: 75px;
    }
    .item5{
        width: 370px;
        margin: 0 15px;
        text-align: center;
        border: 10px solid  #f9cec2;
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 10px 20px 50px #f7b6a7;
        display:block !important;
        
    }
    .item5 h3{
        color: #f5afac;
        font-size: 24px;
        margin-bottom: 1em;
    }
    .item5 p{
        color: #ccc;
        line-height: 1.7;
    }
    .item5 .icon{
        width: 150px;
        height: 150px;
        background-color: #fff;
        margin: -75px auto 0;
        font-size: 85px;
        line-height: 150px;
        border-radius: 50%;
        color: #f5afac;
        position: relative;
        
    }
    .item5 .icon:before{
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-top: 15px solid #f9cec2;
        border-right: 15px solid #f9cec2;
        border-bottom: 10px solid transparent;
        border-left: 10px solid transparent;
        left: 0px;
        top: -5px;
        border-radius: 50%;
        transform: rotate(-45deg);
    }
    /* .item5:hover .fa{

        
        animation: ss .2s linear 0s infinite alternate;
        -moz-animation: ss .2s linear 0s infinite alternate;
        -webkit-animation: ss .2s linear 0s infinite alternate;
        -o-animation: ss .2s linear 0s infinite alternate;
        -ms-animation: ss .2s linear 0s infinite alternate; 

        animation-name: ss;
        -moz-animation-name: ss;
        -webkit-animation-name: ss;
        -o-animation-name: ss;
        animation-duration:1s;
        -webkit-animation-duration:1s;
    } */
    .item5 .txt{
        padding: 20px 20px 2em;
    }
    @keyframes ss{
        0%{ transform: rotate(-10deg); }
        100%{ transform: rotate(10deg); }
    }

    @-moz-keyframes ss{
        0%{ -moz-transform: rotate(-10deg); }
        100%{ -moz-transform: rotate(10deg); }
    }

    @-webkit-keyframes ss{
        from{ -webkit-transform: rotate(-10deg); }
        to{ -webkit-transform: rotate(10deg); }
    }

    @-o-keyframes ss{
        0%{ -o-transform: rotate(-10deg); }
        100%{ -o-transform: rotate(10deg); }
    }

    @-ms-keyframes ss{
        0%{ -ms-transform: rotate(-10deg); }
        100%{ -ms-transform: rotate(10deg); }
    }

    .item5:hover .test {
        -webkit-animation-duration: .2s;
        -webkit-animation-name: shake;
        -webkit-animation-iteration-count:infinite;
    }

    @-webkit-keyframes shake {
        0%{ -webkit-transform: rotate(-10deg); }
        100%{ -webkit-transform: rotate(10deg); }
        /* from {
            -webkit-transform: rotate(-10deg);
        }
        
        to {
            -webkit-transform: rotate(10deg);
        } */
    }

    .searchBlock{
		width: 180px;
        height: 38px;
		border:solid 1px #ddd;
		border-radius: 5px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		-o-border-radius: 5px;
        margin: 5px;
	}
	
	.searchBlock span{
		float: left;
	}
	.searchText{
		border: none;
		width: 138px;
		margin: 2px 5px;
		outline: 0 none;
        background: transparent;
	}
	.searchBtn{
        /* float: right; */
		border: none;
		width: 16px;
		height: 16px;
		cursor: pointer;
		display: inline;
		margin: 4px 0px;
	}


    .main-footer {
        width:100%;
        background: linear-gradient(-20deg,#3f5494,#08c7a5); 
    }
    .main-footer .container{
        display: flex;
        padding: 50px 10px; 
        margin: auto;
    }
    .footer-item{
        width: 0;
        flex-grow: 1;
        margin: 0 20px;
    }
    .footer-item h4{
        font-size: 24px;
        color: #fff;
        border-bottom: 1px dotted #fff;
        margin-bottom: .5em;
        padding-bottom: .5em;
    }
    .footer-item nav{
        display: flex;
        flex-direction: column;
    }
    .footer-item nav a{
        color: #fff;
        line-height: 1.4;
        text-decoration: none;
        padding: 5px 0;
    }
    .footer-item nav a:hover{
        color: #fa0;
    }
    .footer-subs {
        display: flex;
        flex-direction: column;
    }
    .footer-subs form{
        display: flex;
        width: 100%;
        margin: auto 0px;
    }
    .footer-subs input[type="text"],
    .footer-subs input[type="submit"]{
        border:none;
        padding: 5px 10px;
    }

    .footer-subs input[type="text"]{
        width: 0;
        flex-grow: 1;
    }
    .footer-subs input[type="submit"]{
        color: #70f6df;
        background-color: #3e5293; 
    }
    .conpyright{
        width: 100%;
        text-align: center;
        margin: 150px 0 0 ;
        padding: 10px 0px;
        background-color: #3e5293;
        color: #70f6df;
    }

.square {
    width: 20px;
    height: 20px;
    border-radius: 10px;
    background: #FF10B9;
    display: block;
    position: relative;

    /* animation 參數設定 */
    animation-name: MoveToUp, Fade;   /*動畫名稱，需與 keyframe 名稱對應*/
    animation-duration: 4s, 4s;    /*動畫持續時間，單位為秒*/
    animation-delay: 1s, 4.5s;    /*動畫延遲開始時間*/
    animation-iteration-count: 1, infinite;    /*動畫次數，infinite 為無限次*/ 
    animation-fill-mode: forwards, forwards;
    /* animation-timing-function: ease-in-out; */
    
}

/* .fade {
    position: absolute;
    animation: Fade 5s ease-in-out infinite;
} */

/* 關鍵影格(@keyframe) */
@keyframes MoveToUp {
    /* 0% { left: 0; }
    25% { left: 30%; }
    50% { left: 50%; }
    75% { left: 65%; }
    100% { left: 80%; } */

    from { top: 90%;
        opacity:0.1;
    }
    to { top: 0%;
        opacity:1;
    }
}

@keyframes Fade {
  0%  {opacity:1;}
  10%  {opacity:0.3;}
  20% {opacity:1;}
  30%  {opacity:0.3;}
  40% {opacity:1;}
  50%  {opacity:0.3;}
  60% {opacity:1;}
  70%  {opacity:0.3;}
  80% {opacity:1;}
  90%  {opacity:0.3;}
  100% {opacity:1;}
}

</style>

<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/js/pdf/jspdf.js') }}"></script>
<script src="https://cdn.bootcss.com/jspdf/1.3.5/jspdf.debug.js"></script>

@endsection



@section('header')
    @include('contents.test_banner')

@endsection

@section('top_content')
<div class="top_content">
    @include('contents.test_layout')
</div>
@endsection

@section('script')

<script>
    
    // var date = new Date();
    // console.log(date.toLocaleDateString());  //獲取當時時間 格式為20XX/XX/XX
    // var inputdate = document.getElementById("test").value;
    // if (inputdate < date.toLocaleDateString()) {
    //     alert("不可早於今天");
    // }
</script>

@endsection