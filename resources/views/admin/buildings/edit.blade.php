@extends('admin.layouts.layout')

@section('title')

    تعديل عقار
    {{ $building->bu_name }}

@endsection

@section('header')



@endsection

@section('content')

    <section class="content-header">
        <h1>
            تعديل عقار

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{ url('/adminpanel/buildings') }}">التحكم في العقارات </a></li>
            <li class="active"><a href="{{ url('/adminpanel/buildings/' . $building->id . 'edit') }}"> تعديل عقار جديد </a></li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            تعديل عقار
                            {{ $building->bu_name }}
                        </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        
                        {!! Form::model($building , ['route' => ['buildings.update' , $id ], 'method' => 'PATCH' , 'files'=> true ]) !!}
                            @include('admin.buildings.form')
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('footer')



@endsection
