@extends('layouts.app')

@section('title')

    اضافة عقار جديد

@endsection

@section('header')

    {!! Html::style('cus/buildingall.css') !!}

@endsection

@section('content')

    <div class="container">
        <div class="row profile">


            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"></a></li>
                    <li><a href="{{ url('/user/create/building') }}">اضافة عقار جديد</a></li>
                </ol>

                <div class="profile-content">
                    {!! Form::open( ['url'=> '/user/create/building', 'method'=> ' post' , 'files'=> true] ) !!}
                        @include('admin.buildings.form',['user'=> 1])
                    {!! Form::close() !!}

                    <div class="text-center">

                    </div>
                </div>
            </div>
            @include('website.bu.pages')
        </div>
    </div>

    <br>
    <br>

@endsection