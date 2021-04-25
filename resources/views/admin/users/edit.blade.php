@extends('admin.layouts.layout')

@section('title')

    تعديل عضو
    {{ $user->name }}

@endsection

@section('header')



@endsection

@section('content')

    <section class="content-header">
        <h1>
            تعديل عضو

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{ url('/adminpanel/users') }}">التحكم في الاعضاء </a></li>
            <li class="active"><a href="{{ url('/adminpanel/users/' . $user->id . 'edit') }}"> تعديل عضو جديد </a></li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            تعديل عضو
                            {{ $user->name }}
                        </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('put') }}

                            <div class="form-group">
                                <label>الاسم</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>


                            <div class="form-group">
                                <label>البريد الاكتروني</label>
                                <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label>الرقم السري</label>
                                <input type="password" name="password" class="form-control"
                                    value="{{ $user->password }}">
                            </div>

                            @if(!isset($showforusers))
                                <div class="form-group">
                                    <label>الحالة</label>
                                    <select name="text" class="form-control" required>
                                        <option>{{ $user->admin == 1 ? 'عضو' : 'مدير' }}</option>
                                        <option>{{ $user->admin == 0 ? 'عضو' : 'مدير' }}</option>
                                    </select>
                                </div>
                            @endif

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                                    تعديل</button>
                            </div>
                        </form><!-- end of form -->
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('footer')



@endsection
