@extends('layouts.app')

@section('title')

   تواصل معنا

@endsection

@section('header')

    {!! Html::style('cus/buildingall.css') !!}

@endsection

@section('content')
    <br>
    <br>
    <div class="container">
        <h1>تواصل معنا</h1>

        <div class="row">
            <div class="col-md-8">
                <div class="well well-sm">
                    {!! Form::open(['url'=>'/contact', 'method'=>'post']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        الرساله</label>
                                    <textarea name="contact_message" id="message" class="form-control" rows="9" cols="25" required="required"
                                              placeholder="محتوى الرسالة ..."></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        الاسم</label>
                                    <input type="text" class="form-control" name="contact_name" id="name" placeholder="ادخل الاسم" required="required" />
                                </div>

                                <div class="form-group">
                                    <label for="email">
                                        البريد الالكتروني</label>
                                    <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                        <input type="email" name="contact_email" class="form-control" id="email" placeholder="ادخل البريد الاكتروني " value="{{ \Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->email : '' }}" required="required" /></div>
                                </div>

                                <div class="form-group">
                                    <label for="subject">
                                        الموضوع</label>
                                    <select id="subject" name="contact_type" class="form-control" required="required">
                                        @foreach(contact() as $key =>$con)
                                            <option value="{{ $key }}">{{ $con }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="banner_btn pull-right" id="btnContactUs">
                                     ارسال</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-4">
                <form>
                    <legend><i class="fa fa-outdent"></i>  مكتبنا</legend>
                    <address>

                        العنوان : شارع الثورة بالغربيه ..
                        <abbr title="Phone">
                            </abbr>
                       رقم الهاتف : 01111111111
                    </address>
                    <address>
                        <strong>الاسم بالكامل </strong><br>
                        <a href="mailto:#">first.last@example.com</a>
                    </address>
                </form>
            </div>
        </div>
    </div>

@endsection