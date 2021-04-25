@extends('layouts.app')

@section('title')

كل العقارات

@endsection

@section('header')

{!! Html::style('cus/buildingall.css') !!}
    
@endsection

@section('content')

<div class="container">
    <div class="row profile">
		

        <div class="col-md-9">

            <div class="profile-content">
			    @include('website.bu.sharefile', ['building'=> $buAll])
                <div class="text-center">
					@if(!isset($search))
                    {{ $buAll->appends(Request::except('page'))->render() }}
					@endif
                </div>
            </div>
		</div>
        @include('website.bu.pages')
	</div>
</div>

<br>
<br>

@endsection