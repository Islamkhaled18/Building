@extends('admin.layouts.layout')

@section('title')

إضافة عضو

@endsection

@section('header')



@endsection

@section('content')

    <section class="content-header">
        <h1>
        إضافة عضو 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{ url('/adminpanel/users') }}">التحكم في الاعضاء </a></li>
            <li class="active"><a href="{{ url('/adminpanel/users/create') }}"> إضافة عضو جديد </a></li>
        </ol>
    </section>

     <!-- Main content -->
    <section class="content">
       <div class="row">
           <div class="col-xs-12">
               <div class="box">
                   <div class="box-header">
                        <h3 class="box-title">
                            اضف عضو جديد
                        </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <form method="POST" action="{{ url('/adminpanel/users') }}" style="float: right">

                            @include('admin.users.form')

                        </form>

                    </div>
                </div>
            <div>
        </div>
    </section>



@endsection

@section('footer')



@endsection
