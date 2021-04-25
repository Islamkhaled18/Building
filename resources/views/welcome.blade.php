@extends('layouts.app')

@section('title')

اهلا بك زائرنا الكريم

@endsection

@section('header')

  <style>
    .banner{
      background: url({{ checkIfImageIsexists(getSetting('main_slider') ,
       '/public/website/slider/' , '/website/slider/') }}) no-repeat center;
      min-height: 500px;
      width: 100%;
      /*-webkit-background-size :100%;*/
      /*-moz-background-size:100px;*/
      /*-o-background-size: 100%;*/
      /*-o-background-size: 100%;*/
      /*-webkit-background-size :cover;*/
      /*-moz-background-size:cover;*/
      /*-o-background-size: cover;*/
      /*-o-background-size: cover;*/
      /*padding-bottom: 100%;*/
    }
  </style>
<link rel="stylesheet" href="{{ url('/') }}/main/css/reset.css">

<link rel="stylesheet" href="{{ url('/') }}/main/css/style.css">
<!-- Resource style -->
<script src="{{ url('/') }}/main/js/modernizr.js"></script>
<!-- Modernizr -->

@endsection


@section('content')

<div class="banner text-center">
    <div class="container">
      <div class="banner-info">
        <h1> اهلا بك في موقع العقارات</h1>
          <p>
            {!! Form::open(['url'=>'search' , 'action'=> 'get']) !!}
                @csrf
                {{ method_field('GET') }}
                <div class="row">
                  <div class="col-lg-2">
                    
                    {!! Form::select('bu_rent' ,bu_rent() , null , ['class' => 'form-control' , 'placeholder'=> 'حالة العقار']) !!}
                  </div>
                  <div class="col-lg-2">
                    
                    {!! Form::select('bu_type' ,bu_type() , null , ['class' => 'form-control' , 'placeholder'=> 'نوع العقار']) !!}
                  </div>
                  <div class="col-lg-2">
                    {!! Form::select('bu_rooms' ,roomsnumber() , null , ['class' => 'form-control select2' , 'placeholder'=> 'عدد غرف العقار']) !!}

                  </div>
                  <div class="col-lg-2">
                    {!! Form::text('bu_square' , null , ['class' => 'form-control' , 'placeholder'=> 'مساحة العقار']) !!}

                  </div>
                  <div class="col-lg-2">
                    
                    {!! Form::text('bu_price_to' , null , ['class' => 'form-control' , 'placeholder'=> 'سعر العقار الى']) !!}
                  </div>
                  <div class="col-lg-2">
                    {!! Form::text('bu_price_from' , null , ['class' => 'form-control' , 'placeholder'=> ' سعر العقار من']) !!}

                  </div>
                    {!! Form::submit('ابحث', ['class' => 'banner_btn']) !!}
                </div>

            {!! Form::close() !!}
          </p>
        <a class="banner_btn" href="{{ url('/user/create/building') }}">اضف عقار جديد</a> </div>
    </div>
  </div>
  <div class="main">

    <ul class="cd-items cd-container">

      @foreach(\App\Building::where('bu_status' , 1)->get() as $building)


      <li class="cd-item shadow6 ">
        <img src="{{ checkIfImageIsExists($building->bu_image) }}" alt="{{ $building->bu_name }}" title="{{ $building->name }}" >
        <a href="#0" data-id ="{{ $building->id  }}"  class="cd-trigger" title="{{ $building->bu_name }}">نبذه سريعة</a>
      </li>
        <!-- cd-item -->
      @endforeach

    </ul>
    <!-- cd-items -->

    <div class="cd-quick-view">
      <div class="cd-slider-wrapper">
        <ul class="cd-slider">
          <li><img src="" class="imagebox" alt="Product 1"></li>
        </ul>
      </div>
      <!-- cd-slider-wrapper -->

      <div class="cd-item-info">
        <h2 class="titlebox"></h2>
        <p class="disbox"></p>

        <ul class="cd-item-action">
          <li><a href="" class="add-to-cart pricebox"></a></li>
          <li><a href="" class="morebox">اقرأ المزيد</a></li>
        </ul>
        <!-- cd-item-action -->
      </div>
      <!-- cd-item-info -->
      <a href="#0" class="cd-close">Close</a>
    </div>

  </div>

@endsection

@section('footer')
  <!-- cd-quick-view -->
  <script src="{{ url('/') }}/main/js/jquery-2.1.1.js"></script>
  <script src="{{ url('/') }}/main/js/velocity.min.js"></script>
  <script>

    function urlHome(){
      return '{{ Request::root() }}';
    }

    function noImageUrl(){
      return '{{ getSetting('no_image') }}';
    }

  </script>
  <script src="{{ url('/') }}/main/js/main.js"></script>
  <!-- Resource jQuery -->

@endsection