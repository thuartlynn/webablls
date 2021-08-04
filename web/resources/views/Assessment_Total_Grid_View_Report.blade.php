<?php
    $page_id = 1;
?>

@extends('layouts.master')

@section('title', '')

@section('head')

<style>
    html, body {
        background-color: white;
        margin: 0;
        padding: 0;
    }
    body {
        height: 100vh;
    }
    .top_content {
    }
	.tgv {
		position: relative;
	}
	.tgv-category {
		width: 103px; text-align: center; padding-right: 1px; padding-left: 2px; font-size: 7pt; display: inline-block;
	}
	.tgv-category .i {
		border-width: 1px 1px 1px medium; border-style: solid solid solid none; border-color: gray gray gray currentColor; border-image: none; display: inline-block; box-sizing: border-box; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box;
	}
	.tgv-category .i.q {
		width: 15px; height: 15px;
	}
	.tgv-category .i.d {
		width: 30px; height: 15px;
	}
	.tgv-category .i.s {
		width: 60px; height: 15px;
	}
	.tgv-category .r {
		width: 61px; height: 15px; text-align: left; margin-top: 1px; margin-bottom: 1px; border-left-color: gray; border-left-width: 1px; border-left-style: solid; float: left;
	}
	.tgv-category .r.disabled {
		border: currentColor; border-image: none; text-align: center;
	}
	.tgv-category .n {
		width: 108px; height: 50px; text-align: center; font-family: Arial; font-size: 7pt; font-weight: bold; vertical-align: middle; display: table-cell;
	}
	.tgv-category .no {
		background: rgb(233, 233, 149);
	}
	.tgv-category .l {
		width: 20px; height: 16px; text-align: left; font-size: 8pt; margin-top: 0px; margin-left: 4px; float: left;
	}
	.tgv-category .l-disabled {
		width: 20px; height: 16px; text-align: left; font-size: 8pt; margin-top: 0px; margin-left: 4px; float: left;
	}
	.tgv-category .l.re {
		text-decoration: underline;
	}
	.tgv-category .b-disabled {
		width: 14px; height: 14px; float: left;
	}
	.tgv-category .b {
		margin: 2px 0px 0px 2px; background-position: center; border: 1px solid transparent; border-image: none; width: 12px; height: 12px; float: left; background-image: url('<?php echo public_path("/images/tgv/bullet_off.png")?>'); background-repeat: no-repeat;
	}
	.tgv-category .b.s {
		margin: 6px 3px 4px 5px; border-radius: 3px; width: 6px; height: 6px; background-image: none; -moz-border-radius: 3px; -webkit-border-radius: 3px;
	}
	.tgv-category .b.se {
		margin: 6px 3px 4px 5px; border-radius: 3px; width: 6px; height: 6px; background-image: none; -moz-border-radius: 3px; -webkit-border-radius: 3px;
	}
	.tgv-category .b.p {
		margin: 6px 3px 4px 5px; border-radius: 3px; width: 6px; height: 6px; background-image: none; -moz-border-radius: 3px; -webkit-border-radius: 3px;
	}
	.tgv-category .c {
		width: 2px; height: 18px; float: left;
	}
	.tgv-category .w {
		width: 105px; height: 18px;
	}
	.tgv-category .w.selected {
		background-color: rgba(231, 231, 132, 1);
	}
	.tgv-nav {
		margin: auto; width: 995px; height: 20px; color: rgb(18, 126, 191); font-family: Arial; font-size: 8pt; font-weight: bold; position: relative;
	}
	.tgv-nav div {
		cursor: pointer;
	}
	.tgv-nav .left {
		left: 4px; position: absolute;
	}
	.tgv-nav .right {
		right: 14px; position: absolute;
	}
	.tgv-nav .ina {
		color: gray; cursor: default;
	}
	.tgv-page.hidden {
		display: none;
	}
	.tgv-page {
		margin: auto; width: 2946px; background-image: url('<?php echo public_path("/images/tgv/bg2.png")?>');
	}
	.tgv-category.e {
		background-color: rgba(211, 220, 224, 0.5);
	}
	.tgv-category.o {
		background-color: rgba(211, 211, 211, 1);
	}
	.tgv-page .h .sh {
		width: 115.5px; height: 50px; text-align: center; font-family: Arial; font-size: 7pt; font-weight: bold; vertical-align: middle; display: table-cell;
	}
	.tgv-category .l:hover {
		font-weight: bold; cursor: pointer;
	}
</style>
@endsection

@section('top_content')
<div class="left_content">
    @include('contents.app_webablls_assessment_tgv_report')
</div>
@endsection

@section('script')
<script type="text/javascript">
</script>
@endsection