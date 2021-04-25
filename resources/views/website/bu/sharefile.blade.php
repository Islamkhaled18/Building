@if(count($building) > 0)

    @foreach ( $building as $key=> $building )
        @if($key % 3 == 0 && $key != 0)
            <div class="clearfix"></div>
        @endif

        <div class="col-md-3 pull-right">
            <div class="productbox">
                <img src="{{ asset('/website/bu_images/' . $building->bu_image)  }}" class="img-responsive">
                <div class="producttitle">{{ $building->bu_name }}</div>
                <p class="text-justify">{{ $building->bu_small_disc }}</p>
                <div class="productprice">
                    <span >المساحة : {{ $building->bu_square }}</span>
                    <br>
                    <span>نوع العملية : {{ bu_rent()[$building->bu_rent ] }}</span>
                    <br>
                    <span>نوع العقار : {{ bu_type()[$building->bu_type ] }}</span>
                    <br>
                    <div class="pull-left">
                        @if($building->bu_status == 0)
                            <span class="btn btn-danger btm-sm" role="button">في انتظار التفعيل <span class="fa fa-arrow-circle-o-right" style="color:white;"></span></span>
                            <a href="{{ url('/user/edit/building/' . $building->id) }}" class="btn btn-warning btm-sm" >تعديل العقار</a>
                        @else
                            <a href="{{ url( '/SingleBuilding/'. $building->id ) }}" class="btn btn-primary btm-sm" role="button">اظهر التفاصيل <span class="fa fa-arrow-circle-o-right" style="color:white;"></span></a>
                        @endif
                    </div>
                        <div class="pricetext">{{ $building->bu_price }}</div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="clearfix"></div>
    <br>
@else
    <div class="alert alert-danger">

        لا يوجد عقارات متاحه
    </div>

@endif