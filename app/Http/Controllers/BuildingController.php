<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;
use App\Http\Requests\BuildingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;



class BuildingController extends Controller
{
 
    public function index()
    {
        return view('admin.buildings.index');
    }

    public function create()
    {
        return view('admin.buildings.add');
    }

 
    public function store(BuildingRequest $buildingRequest , Building $building)
    {
        if($buildingRequest->file('bu_image')){

            $fileName = $buildingRequest->file('bu_image')->getClientOriginalName();
            $buildingRequest->file('bu_image')->move(
            base_path().'/public/website/bu_images/', $fileName
            );
            $image = $fileName;
        }else{
            $image = '';
        }
        $user = Auth::user();
        $data= [
            'bu_name'       => $buildingRequest->bu_name,
            'bu_rooms'      => $buildingRequest->bu_rooms,
            'bu_price'      => $buildingRequest->bu_price,
            'bu_rent'       => $buildingRequest->bu_rent,
            'bu_square'     => $buildingRequest->bu_square,
            'bu_type'       => $buildingRequest->bu_type,
            'bu_status'     => $buildingRequest->bu_status,
            'bu_meta'       => $buildingRequest->bu_meta,
            'bu_small_disc' => $buildingRequest->bu_small_disc,
            'bu_langtuide'  => $buildingRequest->bu_langtuide,
            'bu_latitude'   => $buildingRequest->bu_latitude,
            'bu_large_disc' => $buildingRequest->bu_large_disc,
            'user_id'       => $user->id,
            'bu_image'      => $image,
            'month'         => date['m'],
            'year'         => date['Y'],
        ];
        $building->create($data);
        return redirect('/adminpanel/buildings')->with('success','تم تسجيل المعلومات');
    }
    
    public function edit(Request $request, $id)
    {
        $building = Building::find($id);
        return view('admin.buildings.edit' , compact('building' , 'id'));
    }

    public function update($id, BuildingRequest $request)
    {
        $buildingupdate = Building::find($id);
        $buildingupdate -> fill($request->all())->save();
        if($request->file('bu_image')){

            $fileName = $request->file('bu_image')->getClientOriginalName();
            $request->file('bu_image')->move(
            base_path().'/public/website/bu_images/', $fileName
            );
            $buildingupdate->fill(['bu_image'=>$fileName])->save();
        }
        session()->flash('success','تم التعديل بنجاح');
        return redirect()->back();
    }

    public function anyData()
    {
        $buildings = Building::all();
        return DataTables::of($buildings)
            ->editColumn('created_at', function ($model) {
                return date("d-m-Y", strtotime($model->created_at));
            })
            ->addColumn('edit_url', function($model) {
                return url('/adminpanel/buildings/' . $model->id . '/edit');
            })
            ->addColumn('delete_url', function($model) {
                return url('/adminpanel/buildings/' . $model->id );
            })
            ->make(true);
    }

    public function destroy(Building $building)
    {
        $building->delete();
        session()->flash('success', ('تم الحذف بنجاح'));
        return redirect()->route('buildings.index');
    }

    public function showAllEnable(Building $building){
        $buAll = $building->where('bu_status' , 1)->orderBy('id','desc')->paginate(5);
        return view('website.bu.all' , compact('buAll'));
    }

    public function ForRent(Building $building){
        $buAll = $building->where('bu_status' , 1)->where('bu_rent' , 1)->orderBy('id','desc')->paginate(5);
        return view('website.bu.all' , compact('buAll'));
    }

    public function ForBuy(Building $building){
        $buAll = $building->where('bu_status' , 1)->where('bu_rent', 0)->orderBy('id','desc')->paginate(5);
        return view('website.bu.all' , compact('buAll'));
    }

    public function showByType($type ,Building $building){
        if(in_array($type , ['0' , '1' , '2']))
        {

            $buAll = $building->where('bu_status' , 1)->where('bu_type', $type)->orderBy('id','desc')->paginate(5);
            return view('website.bu.all' , compact('buAll'));
        }
        return redirect()->back();  
    }

    public function search(Request $request, Building $building)
    {

        $requestAll = $request->except( ['submit' , '_token' , 'page' , '_method']);
        $query = DB::table('buildings')->select('*');
        $array=[];
        $count= count($requestAll);
        $i = 0;
        foreach ($requestAll as $key => $req) {
            $i++;
            if($req != ''){
                if( $key == 'bu_price_from' && $request->bu_price_to == ' '  ){
                    $query->where('bu_price' , '>=', $req );
                }elseif( $key == 'bu_price_to' && $request->bu_price_from == ' '  ){
                    $query->where('bu_price' , '<=', $req );
                }else{
                    if($key != 'bu_price_to' && $key != 'bu_price_from'){
                        $query->where( $key , $req);
                    }
                }
                $array[$key] = $req;
            }elseif( $count == $i &&  $request->bu_price_to != 0 && $request->bu_price_from){
                $query->whereBetween( ' bu_price' , [$request->bu_price_from , $request->bu_price_to ]);
                $array[$key] = $req;
            }
        }
        $buAll = $query->paginate(15);
        return view('website.bu.all' , compact('buAll' , 'array'));
    }

    public function showSingle($id , Building $building){

        $showInfo = $building->findOrFail($id);
        if($showInfo->bu_status == 0){
            $messageTitle = 'هذا العقار ينتظر موافقة الادارة';
            $messagebody = '                        <b>تنبية</b>
                        العقار
                        {{ $showInfo->bu_name }}
                        موجود لدينا ولكنه في انتظار موافقه الادارة عليه
                        ويتم نشر العقار في مدة اقصاها 24 ساعه';

            return view('website.bu.noper' ,compact('showInfo' , 'messageTitle' , 'messagebody'));
        }
        $same_rent= $building->where('bu_rent', $showInfo->bu_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
        $same_type= $building->where('bu_type', $showInfo->bu_type)->orderBy(DB::raw('RAND()'))->take(3)->get();
        return view('website.bu.singlebu' ,compact('showInfo', 'same_rent' , 'same_type'));


    }

    public function getAjaxInfo(Request $request , Building $building)
    {
        return $building::find($request->id)->toJson();

    }

    public function userAddView(){
        return view('website.userbu.useradd');
    }

    public function userStore(BuildingRequest $buildingRequest , Building $building){
        if($buildingRequest->file('bu_image')){
            $fileName = $buildingRequest->file('bu_image')->getClientOriginalName();
            $buildingRequest->file('bu_image')->move(
                base_path().'/public/website/bu_images/', $fileName
            );
            $image = $fileName;
        }else{
            $image = '';
        }
        $user = Auth::user() ? Auth::user()->id : 0;
        $data= [
            'bu_name'       => $buildingRequest->bu_name,
            'bu_rooms'      => $buildingRequest->bu_rooms,
            'bu_price'      => $buildingRequest->bu_price,
            'bu_rent'       => $buildingRequest->bu_rent,
            'bu_square'     => $buildingRequest->bu_square,
            'bu_type'       => $buildingRequest->bu_type,
            'bu_meta'       => $buildingRequest->bu_meta,
            'bu_status'     => $buildingRequest->bu_status,
            'bu_small_disc' => $buildingRequest->bu_large_disc,
            'bu_langtuide'  => $buildingRequest->bu_langtuide,
            'bu_latitude'   => $buildingRequest->bu_latitude,
            'bu_large_disc' => $buildingRequest->bu_large_disc,
            'user_id'       => $user->id,
            'bu_image'      => $image,
            'month'         => date['m'],
            'year'         => date['Y'],
        ];
        $building->create($data);
        return view('website.userbu.done');
    }

    public function showUserBuilding(Building $building){
        $user = Auth::user();
        $building = $building->where('user_id' ,$user->id)->where('bu_status' ,1)->paginate(10);
        return view('website.userbu.showuserbu', compact('building' ,'user'));
    }

    public function buildingShowwaiting(Building $building){
        $user = Auth::user();
        $building = $building->where('user_id' ,$user->id)->where('bu_status' ,0)->paginate(10);
        return view('website.userbu.showuserbu', compact('building' ,'user'));
    }

    public function userEditBuilding($id , Building $building){
        $user = Auth::user();
        $showInfo = $building->findOrFail($id);

        $building_id = $showInfo->id;
        if( $user->id != $showInfo->user_id ){
            $messageTitle = 'هذا العقار لم تتم اضافتة';
            $messagebody = '<b>تنبية</b>
                        العقار
                        {{ $showInfo->bu_name }}
                       تم اضافته من خلال عضوية اخرى';
            return view('website.bu.noper' ,compact('showInfo' , 'messageTitle' , 'messagebody'));
        }elseif ($showInfo->bu_status == 1){
            $messageTitle = 'هذا العقار تم افعيلة مسبقا';
            $messagebody = 'هذا العقار تم تفعيلة للموقع مسبقا ';
            return view('website.bu.noper' ,compact('showInfo' , 'messageTitle' , 'messagebody'));
        }
        return view('website.userbu.edituserbu', compact('showInfo' , 'user', 'building_id'));
    }

    public function  userUpdateBuilding(BuildingRequest $request ,Building $building){
        //dd($request->all());
        $building = $building->find($request->building_id);

        $building->update($request->except([
            '_token','_method','building_id'
        ]));
        return Redirect::back()->withFlashMessage('تم التعديل بنجاح');
    }
}
