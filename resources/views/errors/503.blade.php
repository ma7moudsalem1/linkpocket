@extends('layouts.app')

@section('title')
503 Something went wrong
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
			<h5>503</h5>We are sorry something went wrong!! <a href="{{ url('/') }}">Go to home page</a>
			</div>
		</div>
	</div>
@endsection