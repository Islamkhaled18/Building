<div class="col-md-3">
    @if(Auth::user())
    <div class="profile-sidebar">
        <h2 style="margin-right:10%">خيارات العضو</h2>
        <div class="profile-usermenu">
            <ul class="nav" style="margin-right:0px; padding-right:0px;">
{{--                <li class="active">--}}
{{--                    <a href="{{ url('/user/editsetting') }}">--}}
{{--                        <i class="glyphicon glyphicon-home"></i>--}}
{{--                       تعديل المعلومات الشخصية</a>--}}
{{--                </li>--}}
                <li class="{{ setActive(['user' , 'buildingShow']) }}">
                    <a href="{{ url('/user/buildingShow') }}" >
                        <i class="fa fa-check"></i>
                        العقارات المفعله
                        <label class="label label-default pull-left"> {{ buildingforuserCount(Auth::user()->id , 1) }} </label>
                    </a>

                </li>
                <li class="{{ setActive(['user' , 'buildingShowwaiting']) }}">
                    <a href="{{ url('/user/buildingShowwaiting') }}" >
                        <i class="fa fa-clock-o"></i>
                         عقارات في انتظار التفعيل
                        <label class="label label-default pull-left"> {{ buildingforuserCount(Auth::user()->id , 0) }} </label>
                    </a>

                </li>
                <li class="{{ setActive(['user' , 'create' , 'building']) }}">
                    <a href="{{ url('/user/create/building') }}">
                        <i class="fa fa-plus"></i>
                        اضافة عقار جديد </a>
                </li>
            </ul>
        </div>
    </div>
    @endif


    <div class="profile-sidebar" style="padding:5%">

        <h2 style="margin-right:10%">البحث المتقدم</h2>
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            {!! Form::open(['url'=>'search' , 'action'=> 'get']) !!}
                @csrf
                {{ method_field('GET') }}

            <ul class="nav" style="margin-right:0px; padding-right:0px;">
                <li>
                    {!! Form::text('bu_price_from' , null , ['class' => 'form-control' , 'placeholder'=> ' سعر العقار من']) !!}
                </li>
                <li>
                    {!! Form::text('bu_price_to' , null , ['class' => 'form-control' , 'placeholder'=> 'سعر العقار الى']) !!}
                </li>
                <li>
                    {!! Form::select('bu_rooms' ,roomsnumber() , null , ['class' => 'form-control' , 'placeholder'=> 'عدد غرف العقار']) !!}
                </li>
                <li>
                    {!! Form::text('bu_square' , null , ['class' => 'form-control' , 'placeholder'=> 'مساحة العقار']) !!}
                </li>
                <li>
                    {!! Form::select('bu_type' ,bu_type() , null , ['class' => 'form-control' , 'placeholder'=> 'نوع العقار']) !!}
                </li>
                <li>
                    {!! Form::select('bu_rent' ,bu_rent() , null , ['class' => 'form-control' , 'placeholder'=> 'حالة العقار']) !!}
                </li>
                <li>
                    {!! Form::submit('ابحث', ['class' => 'banner_btn']) !!}
                </li>
            </ul>
            {!! Form::close() !!}
        </div>
        <!-- END MENU -->
    </div>
    <br>

    <div class="profile-sidebar">
        <h2 style="margin-right:10%">خيارات العقارات</h2>
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav" style="margin-right:0px; padding-right:0px;">


                <li class="{{ setActive(['showAllBuildings']) }}">
                    <a href="{{ url('/showAllBuildings') }}">
                    <i class="fa fa-building"></i>
                    كل العقارات </a>
                </li>

                <li class="{{ setActive(['ForRent']) }}">
                    <a href="{{ url('/ForRent') }}">
                    <i class="fa fa-building-o"></i>
                    ايجار </a>
                </li>



                <li class="{{ setActive(['ForBuy']) }}" >
                    <a href="{{ url('/ForBuy') }}">
                    <i class="fa fa-building-o"></i>
                    تمليك </a>
                </li>
                <li class="{{ setActive(['type' , '0']) }}">
                    <a href="{{ url('/type/0') }}">
                    <i class="fa fa-bullseye"></i>
                    شقة </a>
                </li>
                <li  class="{{ setActive(['type' , '1']) }}" >
                    <a href="{{ url('/type/1') }}">
                    <i class="fa fa-bullseye"></i>
                    فيلا </a>
                </li>
                <li  class="{{ setActive(['type' , '2']) }}" >
                    <a href="{{ url('/type/2') }}">
                    <i class="fa fa-bullseye"></i>
                    شالية </a>
                </li>
                
            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>