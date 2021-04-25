@extends('admin.layouts.layout')

@section('title')

تعديل اعدادات الموقع

@endsection

@section('header')



@endsection

@section('content')

    <section class="content-header">
        <h1>
            تعديل اعدادات الموقع
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/adminpanel/siteSetting') }}">تعديل اعدادات الموقع </a></li>
        </ol>
    </section>

     <!-- Main content -->
    <section class="content">
       <div class="row">
           <div class="col-xs-12">
               <div class="box">
                   <div class="box-header">
                        <h3 class="box-title">
                            تعديل اعدادات الموقع
                        </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form class="{{ url('/adminpanel/sitesettings') }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}

                            @foreach($siteSettings as $siteSetting )
                                <div class="text2{{ $errors->has('name') ? 'has-error' : '' }}">
                                    <div class="col-lg-2">
                                        {{ $siteSetting->slug }}
                                    </div>
                
                                    <div class="col-md-18">
                                        @if($siteSetting->type == 0)
                                        {!! Form::text($siteSetting->namesetting , $siteSetting->value , ['class' => 'form-control']) !!}
                                        @elseif($siteSetting->type == 3)
                                            @if($siteSetting->value != '')
                                                <img src="{{ checkIfImageIsExists($siteSetting->value , '/public/website/slider/' , '/website/slider/') }}" width="150" />
                                                <br>
                                            @endif
                                        {!! Form::file($siteSetting->namesetting ,['class' => 'form-control']) !!}
                                        @else
                                        {!! Form::textarea($siteSetting->namesetting , $siteSetting->value , ['class' => 'form-control']) !!}
                                        @endif
                                        <br>
                                        @if($errors->has($siteSetting->namesetting))
                                            <span class="help-block">
                                                <strong>{{ $errors->first($siteSetting->namesetting) }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            @endforeach

                            <button name='submit' class="btn btn-app" type='submit'><i class="fa fa-save"></i>
                                حفظ
                            </button>
                        </form>
                        <br>
                    </div>
                </div>
            <div>
        </div>
    </section>



@endsection

