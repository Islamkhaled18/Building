@extends('layouts.app')

@section('title')

    {{ $messageTitle }}

@endsection

@section('header')

    {!! Html::style('cus/buildingall.css') !!}

@endsection

@section('content')

    <div class="container">
        <div class="row profile">


            <div class="col-md-9">

                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"></a>الرئيسية</li>
                    <li><a href="{{ url('/showAllBuildings') }}">كل العقارات</a></li>
                    <li><a href="{{ url('/SingleBuilding/'.$showInfo->id) }}">{{ $showInfo->bu_name }}</a></li>
                </ol>

                <div class="profile-content">
                    <div class="alert alert-danger">
                        {{ $messagebody }}
                    </div>
                </div>
            </div>
            @include('website.bu.pages')
        </div>
    </div>

    <br>
    <br>

@endsection