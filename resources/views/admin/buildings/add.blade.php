@extends('admin.layouts.layout')

@section('title')

إضافة عقار

@endsection

@section('header')



@endsection

@section('content')

    <section class="content-header">
        <h1>
        إضافة عقار 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{ url('/adminpanel/buildings') }}">التحكم في العقارات </a></li>
            <li class="active"><a href="{{ url('/adminpanel/buildings/create') }}"> إضافة عقار جديد </a></li>
        </ol>
    </section>

     <!-- Main content -->
    <section class="content">
       <div class="row">
           <div class="col-xs-12">
               <div class="box">
                   <div class="box-header">
                        <h3 class="box-title">
                            اضف عقار جديد
                        </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        {!! Form::open( ['url'=> '/adminpanel/buildings', 'method'=> ' post' , 'files'=> true] ) !!}

                            @include('admin.buildings.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            <div>
        </div>
    </section>



@endsection

@section('footer')



@endsection
