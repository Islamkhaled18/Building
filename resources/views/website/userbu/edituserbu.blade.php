@extends('layouts.app')

@section('title')

تعديل العقار
{{ $showInfo->bu_name }}
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
                    <li><a href="{{ url('/user/buildingShowwaiting') }}">عقارات في انتظار التفعيل</a></li>
                    <li><a href="{{ url('/user/edit/building' .$showInfo->id ) }}">تعديل العقار
                            {{ $showInfo->bu_name }}
                        </a></li>
                </ol>

                <div class="profile-content">
                    {!! Form::model( $showInfo ,['url'=> '/user/update/building', 'method'=> 'patch' , 'files'=> true] ) !!}
                    <input type="hidden" name="building_id" value="{{ $building_id  }}" />
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