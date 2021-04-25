@extends('layouts.app')

@section('title')

العقار

{{ $showInfo->bu_name }}

@endsection

@section('header')

{!! Html::style('cus/buildingall.css') !!}
    
@endsection

@section('content')

<div class="container">
    <div class="row profile">
		

        <div class="col-md-9">
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"></a>الرئيسية</li>
                <li><a href="{{ url('/showAllBuildings') }}">كل العقارات</a></li>
                <li><a href="{{ url('/SingleBuilding/'.$showInfo->id) }}">{{ $showInfo->bu_name }}</a></li>
                
            </ol>

            <div class="profile-content">
                <h1>{{ $showInfo->bu_name }}</h1>
                <hr>
                <div class='btn-group' role='group'>
                    <div class="addthis_inline_share_toolbox_bztn"></div>
                    <a href="{{ url('search?bu_price=' . $showInfo ->bu_price) }}" class="btn btn-default">
                        سعر العقار :
                        {{ $showInfo ->bu_price }}
                    </a>
                    <a href="{{ url('search?bu_rooms=' . $showInfo ->bu_rooms) }}" class="btn btn-default">
                        عدد غرف العقار :
                        {{ $showInfo ->bu_rooms }}
                    </a>
                    <a href="{{ url('search?bu_rent=' . $showInfo ->bu_rent) }}" class="btn btn-default">
                        حالة العقار :
                        {{ bu_rent()[$showInfo ->bu_rent] }}
                    </a>
                    <a href="{{ url('search?bu_square=' . $showInfo ->bu_square) }}" class="btn btn-default">
                        مساحة العقار :
                        {{ $showInfo ->bu_square }}
                    </a>
                    <a href="{{ url('search?bu_type=' . $showInfo ->bu_type) }}" class="btn btn-default">
                        نوع العقار :
                        {{ bu_type()[$showInfo ->bu_type] }}
                    </a>

                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-607afe1af3738f8a"></script>

                    <hr>
                    <p>
                        وصف العقار :
                        {!! $showInfo ->bu_large_disc !!}
                    </p>
                    <img src="{{ url('search?bu_price='. $showInfo ->bu_image) }}" class="img-responsive" />
                </div>
            </div>
            <div class="profile-content">
                <h3>عقارات اخرى  قد تهمك</h3>
                @include('website.bu.sharefile' , ['building' => $same_rent])
                @include('website.bu.sharefile' , ['building' => $same_type])
            </div>

		</div>
        @include('website.bu.pages')
	</div>
</div>

<br>
<br>

@endsection