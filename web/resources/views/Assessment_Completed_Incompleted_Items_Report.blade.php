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

</style>
@endsection

@section('top_content')
<div class="top_content">
    @include('contents.app_webablls_assessment_completed_incompleted_items_report_content')
</div>
@endsection

@section('script')
<script type="text/javascript">
</script>
@endsection