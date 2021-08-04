@extends('layouts.master-2')

@section('title', 'test js_const & let')

@section('head')
<style>
    
    * {
        margin: 0;
        padding: 0;
        list-style: none;
    }

   
</style>


@endsection



@section('header')
    
        @include('contents.test_js_const')
    
@endsection

@section('script')

<script>
	const tmp = "JavaScript";
	console.log(tmp);
	function f (){
		var tmp = "hello world";
		console.log(tmp);
	};
	f(); 

	function CopyTextToClipboard(test) {

		var TextRange = document.createRange();

		TextRange.selectNode(document.getElementById("test"));

		sel = window.getSelection();

		sel.removeAllRanges();

		sel.addRange(TextRange);

		document.execCommand("copy");

		alert("複製完成！")  //此行可加可不加

	}
</script>


@endsection