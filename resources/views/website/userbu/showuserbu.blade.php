@extends('layouts.app')

@section('title')

    عقاراتي
    {{ $user->name }}

@endsection

@section('header')

    {!! Html::style('cus/buildingall.css') !!}

@endsection

@section('content')

    <div class="container">
        <div class="row profile">
            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">الرئيسية</a></li>
                    <li><a href="{{ url('/showAllBuildings') }}">كل العقارات</a></li>
                    <li>
                        <a href="#">
                            عقاراتي
                            {{ $user->name }}
                        </a>
                    </li>
                </ol>

                <div class="profile-content">
                    @include('website.bu.sharefile', ['building'=> $building])
                    <div class="text-center">
                        {{ $building->appends(Request::except('page'))->render() }}
                    </div>
                </div>
            </div>
            @include('website.bu.pages')
        </div>
    </div>

    <br>
    <br>

@endsection