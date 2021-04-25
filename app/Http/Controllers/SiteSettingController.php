<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;
use App\SiteSetting;

class SiteSettingController extends Controller
{
    public function index(SiteSetting $siteSetting)
    {
        $siteSettings = SiteSetting::paginate(5);

        return view('admin.sitesettings.index' , compact('siteSettings'));

    }

    public function store(Request $request ,SiteSetting $siteSetting)
    {
        foreach($request->except(['_token','submit']) as $key => $req)
        {

            $siteSettingUpdates = SiteSetting::where('namesetting' , $key)->get();

            if(count($siteSettingUpdates)) {
                $siteSettingUpdate = $siteSettingUpdates[0];
            }
            if($siteSettingUpdate->type != 3 ){

                $siteSettingUpdate->fill([ 'value' => $req])->save();
            }else{
                $fileName = UploadImage($req , '/public/website/slider/' ,'1600' ,'500' , base_path().'/public/website/slider/'.$siteSettingUpdate->value);
                if($fileName){
                    $siteSettingUpdate->fill([ 'value' => $fileName])->save();
                }
            }
        }
        return redirect()->back()->withFlashMessage('تم التعديل بنجاح');
    }


}
