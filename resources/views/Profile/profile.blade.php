@extends('layouts.app')

@section('content')

    <div class="container-fluid">
      <div class="row">
        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
          	<div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8">
          			<h2>Profile of {{Auth::user()->name}}</h2>

          			<div class="jumbotron">
          				<div class="row row-">
          					<div class="col-md-4">Name</div>
          					<div class="col-md-8">{{Auth::user()->name}} </div>
          				</div>

          				<div class="row">
          					<div class="col-md-4">Email</div>
	          				<div class="col-md-8">{{Auth::user()->email}}</div>
          				</div>

          				<div class="row">
          					<div class="col-md-4">Mobile No</div>
	          				<div class="col-md-8">{{Auth::user()->phone}}</div>
          				</div>

						<div class="row">
							<div class="col-md-4">Role</div>
							<div class="col-md-8">{{Auth::user()->role}}</div>
						</div>
						@if(count(Auth::user()->interests)>0)
							<div class="row">
								<div class="col-md-4">Interest</div>
								<div class="col-md-8">
								@foreach (Auth::user()->interests as $interest)
									{{$interest->interest }}<br>
								@endforeach
								</div>
							</div>
						@endif

          			</div>

				  	<div class="button-container-right">
						<button type="button" class="btn btn-default active"><a href="{{url('/home/profile/edit')}}" style="text-decoration: none">Update</a></button>
					</div>

          		</div>
          	</div>

        </main>
      </div>
    </div>
@endsection

{{--@section('css')--}}
	{{--<style type="text/css">--}}
		{{--.img_container {--}}
			{{--position: relative;--}}
		{{--}--}}

		{{--img {--}}
		  {{--position: absolute;--}}
		  {{--width: 250px;--}}
		  {{--height: 250px;--}}
		{{--}--}}

		{{--#btn_pic {--}}
		  {{--position: absolute;--}}
		  {{--left: 95px;--}}
		  {{--bottom: 30px;--}}
		  {{--text-align: center;--}}
		  {{--opacity: 0;--}}
		  {{--transition: opacity .35s ease;--}}
		  {{--border: 2px solid;--}}
		{{--}--}}

		{{--.img_container:hover #btn_pic {--}}
		  {{--opacity: 1;--}}
		{{--}--}}

	{{--</style>--}}

{{--@endsection--}}

@section('script')

@endsection
