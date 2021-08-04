@extends('layouts.master-2')

@section('title', 'test tab')

@section('head')
<style type="text/css">
@keyframes ldio-s8ivy0n9h8n {
  0% { transform: translate(-50%,-50%) rotate(0deg); }
  100% { transform: translate(-50%,-50%) rotate(360deg); }
}
.ldio-s8ivy0n9h8n div {
  position: absolute;
  width: 30px;
  height: 30px;
  border: 3px solid #14ade0;
  border-top-color: transparent;
  border-radius: 50%;
}
.ldio-s8ivy0n9h8n div {
  animation: ldio-s8ivy0n9h8n 1.8518518518518516s linear infinite;
  top: 52px;
  left: 52px
}
.loadingio-spinner-rolling-4rkxmlu7c2u {
  width: 104px;
  height: 104px;
  display: inline-block;
  overflow: hidden;
  background: none;
}
.ldio-s8ivy0n9h8n {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(1);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
}
.ldio-s8ivy0n9h8n div { box-sizing: content-box; }

.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s;
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

</style>

@endsection

@section('loading')
<div id="loader">
        @include('contents.test_loading')
</div>
@endsection


@section('header')
<div id="myDiv1" style="display:none;" class="animate-bottom">
        @include('contents.login_header')
</div>

@endsection

@section('top_content')
<div id="myDiv2" style="display:none;" class="animate-bottom">

        @include('contents.test_tab')
</div>
@endsection


@section('script')


<script>
$(function () {
        // $(window).load(function(){
        //         $('.loadingio-spinner-rolling-4rkxmlu7c2u').hide(5000);
        // });
        // var setT = setTimeout(function() { 
        //         $('.loadingio-spinner-rolling-4rkxmlu7c2u').hide();
        // }, 5000);
});

        var myVar;

        function myFunction() {
                myVar = setTimeout(showPage, 1500);
        }

        function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("myDiv1").style.display = "block";
                document.getElementById("myDiv2").style.display = "block";
        }


</script>

@endsection