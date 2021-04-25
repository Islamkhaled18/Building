<div class="text2{{ $errors->has('contact_name') ? 'has-error' : '' }}">
    <div class="col-md-18">
        {!! Form::text('contact_name' , null , ['class' => 'form-control']) !!}
        @if($errors->has('contact_name'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-2">
        اسم المرسل
    </div>
</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('contact_email') ? 'has-error' : '' }}">
    <div class="col-md-18">
        {!! Form::text('contact_email' , null , ['class' => 'form-control']) !!}
        @if($errors->has('contact_email'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_email') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-2">
         البريد الالكتروني للمرسل
    </div>
</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('contact_message') ? 'has-error' : '' }}">
    <div class="col-md-18">
        {!! Form::textarea('contact_message' , null , ['class' => 'form-control']) !!}
        @if($errors->has('contact_message'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_message') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-2">
         المرسل
    </div>
</div>
<div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('contact_type') ? 'has-error' : '' }}">
    <div class="col-md-18">
        {!! Form::select('contact_type' , contact() , null ,  ['class' => 'form-control']) !!}
        @if($errors->has('contact_type'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_type') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-2">
         نوع الرساله
    </div>
</div>
<div class="clearfix"></div>
<br>

<div class="text2{{ $errors->has('contact_type') ? 'has-error' : '' }}">
    <div class="col-md-18">
        {!! Form::submit('تنفيذ' , ['class' => 'btn btn-warning']) !!}
    </div>
</div>
<div class="clearfix"></div>
<br>
