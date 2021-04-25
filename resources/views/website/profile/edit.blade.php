@extends('layouts.app')

@section('title')

   تعديل المعلومات الشخصية
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
                    <li class="active">
                        <a href="">
                            تعديل المعلومات الشخصية للعضو
                            {{ $user->name }}
                        </a>
                    </li>
                </ol>

                <div class="profile-content">
                    <form action="{{ route('/user/editsetting', $user->id) }}" method="PATCH">
                        @include('admin.users.edit' , ['showforusers'=> 1])
                    </form><!-- end of form -->

                </div>
            </div>
            @include('website.bu.pages')
        </div>
    </div>

    <br>
    <br>

@endsection