<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;

function getSetting($settingname = 'sitename'){
    $settings = App\SiteSetting::where('nameSetting', $settingname)->get();
    if(count($settings)> 0) {
        return $settings[0]->value;
    }
    return "";
}

function checkIfImageIsExists($imageName , $pathImage = '/public/website/bu_images/' , $url = '/website/bu_images/'){

    if($imageName !== ''){
        $path = base_path(). $pathImage. $imageName;
        if(file_exists($path)){
            return Request::root(). $url . $imageName;
        }
    }else{
        return "https://www.gstatic.com/images/branding/product/2x/photos_96dp.png";
        return getSetting('no_image');
    }
}



function uploadImage($request , $path = '/public/website/bu_images' , $width = '500' , $height = '362', $deleteFileWithName = '' )
{
    if ( $deleteFileWithName != '' ){
        if( file_exists($deleteFileWithName) ){
            \Illuminate\Support\Facades\File::delete($deleteFileWithName);
        }
    }

    $din = getimagesize($request);
    if($din[0] > $width || $din[1] > $height ){

    }
    $fileName = $request->getClientOriginalName();
    $request->move(
        base_path().$path , $fileName
    );
    return $fileName;
}


function bu_type()
{
    $array= [
        'شقة',
        'فيلا',
        'شاليه',

    ];
    return $array;    
}

function bu_rent()
{
    $array= [
        'تمليك',
        'ايجار',
    ];
    return $array;    
}

function bu_status()
{
    $array= [
        'غير مفعل',
        'مفعل',
    ];
    return $array;    
}


function roomsnumber()
{
    $array= [];
    for($i=2; $i <= 40 ; $i++){

       $array[$i]= $i;
    }
    return $array; 
}

function contact(){

    return [
      '1'=>'اعجاب',
      '2'=>'مشكلة',
      '3'=>'اقتراح',
      '4'=>'استفسار',
    ];
}

function unreadMessage(){
    return \App\Contact::where('view',0)->get();
}

function countunreadMessage(){
    return \App\Contact::where('view',0)->count();
}

function setActive($array , $class = "active"){
    if(!empty($array)){
        $seg_array = [];
        foreach( $array as $key => $url ){
            if( Request::segment($key+1) == $url){
                $seg_array[] = $key ;
            }
        }
        if(count($seg_array) == count(Request::segments())){
                return $class;
        }
    }
}

function buildingforuserCount($user_id , $status){

    return \App\Building::where('bu_status' , $status)->where('user_id' , $user_id)->count();

}
function countAllBuAppendToStatus($status){

    return \App\Building::where('bu_status', $status)->count();

}

