@extends('layouts.app')

@section('title')
{{ getPageData(12, 'title') }}
@endsection

@section('meta')
<meta name="keywords" content="{{ getPageData(12, 'keywords') }}">
<meta name="description" content="{{ getPageData(12, 'descrip') }}">

<!-- Social media meta -->
<!--<meta property="og:image" content="'Social Share')) }}" />-->
<meta property="og:title" content="{{ 'Not found page | '.getSettings('short').' '.getSettings() }}" />
<meta property="og:description" content="{{ getPageData(12, 'descrip') }}" />
@endsection

@section('header')
<style type="text/css">
	.notFound{
		min-height: 550px;
		padding: 50px;
		font-family: arial;
		font-size: 20px;
	}
	.notFound h5{
		font-size: 40px;
		font-weight: bold;
		margin-top: 40px 

	}
</style>
@endsection

@section('content')
	<div class="text-center notFound">
		<div class="container">
			<h5>{{ getPageData(12, 'title') }}</h5>
			{!! getPageData(12, 'body') !!}
			<br><a href="{{ url('/') }}" title="home page">Go to home page</a>
			
		</div>
	</div>
@endsection