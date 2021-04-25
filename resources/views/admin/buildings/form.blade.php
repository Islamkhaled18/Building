
    <div class="text2{{ $errors->has('bu_name') ? 'has_error' : '' }}">
        <label class="col-md-2">
            اسم العقار
        </label>
        <div class="col-md-12">
            {!! Form::text("bu_name" , null , ['class'=>"form-control"]) !!}
            @if($errors->has('bu_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br>   

    <div class="text2{{ $errors->has('bu_rooms') ? 'has_error' : '' }}">
        <label class="col-md-2">
            عدد غرف العقار
        </label>
        <div class="col-md-12">
            {!! Form::select("bu_rooms" , roomsnumber() , null , ['class'=>"form-control"]) !!}
            @if($errors->has('bu_rooms'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_rooms') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br>      

    <div class="text2{{ $errors->has('bu_price') ? 'has_error' : '' }}">
        <label class="col-md-2">
            سعر العقار
        </label>
        <div class="col-md-12">
            {!! Form::text("bu_price" , null , ['class'=>"form-control"]) !!}
            @if($errors->has('bu_price'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_price') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br>    

    <div class="text2{{ $errors->has('bu_rent') ? 'has_error' : '' }}">
        <label class="col-md-2">
            نوع العمليه الخاصه بالعقار
        </label>
        <div class="col-md-12">
            {!! Form::select("bu_rent" , bu_rent() ,null ,  ['class'=>"form-control"]) !!}
            @if($errors->has('bu_rent'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_rent') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br>   


    <div class="text2{{ $errors->has('bu_square') ? 'has_error' : '' }}">
        <label class="col-md-2">
            مساحة العقار

        </label>
        <div class="col-md-12">
            {!! Form::text("bu_square" , null ,  ['class'=>"form-control"]) !!}
            @if($errors->has('bu_square'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_square') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br> 

    <div class="text2{{ $errors->has('bu_type') ? 'has_error' : '' }}">
        <label class="col-md-2">
            نوع العقار

        </label>
        <div class="col-md-12">
            {!! Form::select("bu_type" , bu_type() , null ,  ['class'=>"form-control"]) !!}
            @if($errors->has('bu_type'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_type') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br>  

    @if(!isset($user))
    <div class="text2{{ $errors->has('bu_status') ? 'has_error' : '' }}">
        <label class="col-md-2">
        حالة العقار

        </label>
        <div class="col-md-12">
            {!! Form::select("bu_status" ,bu_status(), null ,  ['class'=>"form-control"]) !!}
            @if($errors->has('bu_status'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_status') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
    <br>
    @endif


    <div class="text2{{ $errors->has('bu_meta') ? 'has_error' : '' }}">
        <label class="col-md-2">
            الكلمات الدلاليه

        </label>
        <div class="col-md-12">
            {!! Form::text("bu_meta" , null ,  ['class'=>"form-control"]) !!}
            @if($errors->has('bu_meta'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_meta') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br>

    @if(!isset($user))
    <div class="text2{{ $errors->has('bu_small_disc') ? 'has_error' : '' }}">
        <label class="col-md-2">
            وصف العقار لمحركات البحث

        </label>
        <div class="col-md-12">
            {!! Form::textarea("bu_small_disc" , null ,  ['class'=>"form-control" , 'rows'=> '4' ]) !!}
            @if($errors->has('bu_small_disc'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_small_disc') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br>
    @endif

    <div class="text2{{ $errors->has('bu_langtuide') ? 'has_error' : '' }}">
        <label class="col-md-2">
            خط الطول

        </label>
        <div class="col-md-12">
            {!! Form::text("bu_langtuide" , null ,  ['class'=>"form-control"]) !!}
            @if($errors->has('bu_langtuide'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_langtuide') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br> 

    <div class="text2{{ $errors->has('bu_latitude') ? 'has_error' : '' }}">
        <label class="col-md-2">
            خط العرض

        </label>
        <div class="col-md-12">
            {!! Form::text("bu_latitude" , null ,  ['class'=>"form-control"]) !!}
            @if($errors->has('bu_latitude'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_latitude') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br> 

    <div class="text2{{ $errors->has('bu_large_disc') ? 'has_error' : '' }}">
        <label class="col-md-2">
          الوصف المطول للعقار

        </label>
        <div class="col-md-12">
            {!! Form::textarea("bu_large_disc" , null ,  ['class'=>"form-control"]) !!}
            @if($errors->has('bu_large_disc'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_large_disc') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br> 

    <div class="text2{{ $errors->has('bu_image') ? 'has_error' : '' }}">
        <label class="col-md-2">
            صور العقار
        </label>
        <div class="col-md-12">
            @if(isset($building))
            @if ($building->image != '')

                <img src="{{ Request::root() , "/website/bu_images/". $building->image}}" width="100" />
                
            @endif
            @endif
            {!! Form::file("bu_image" , null ,  ['class'=>"form-control"]) !!}
            @if($errors->has('bu_image'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_image') }}</strong>
                </span>
            @endif
        </div>
    </div>
        <div class="clearfix"></div>
<br> 

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                تسجيل العقار
            </button>
        </div>
    </div>
</form>