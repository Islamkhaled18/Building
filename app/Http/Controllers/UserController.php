<?php

namespace App\Http\Controllers;

use App\Http\Requests\userUpdateRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\AddUserRequestAdmin;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::when($request->search , function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('created_at', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        
        return view('admin.users.index' , compact('user'));
    }

    public function create(){

        return view('admin.users.add');
    }

    public function store(AddUserRequestAdmin $request , User $user)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success','تم اضافة العضو بنجاح');
        return redirect('/adminpanel/users' , compact('user'));

    }
    

    public function edit(User $user){

       // $user = User::where('id', $id)->first();
        return view('admin.users.edit',compact('user'));
    }


    public function update(Request $request,User $user)
    {
      //  $user = User::find($id);
        // $user::fill($request->all());
        $user->update($request->all());
        
        session()->flash('success', 'تم التعيل بنجاح');
        return redirect()->route('users.index', compact('user'));
    }
    
    function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', ('تم الحذف بنجاح'));
        return redirect()->route('users.index', compact('user'));

    }//end of destroy

//    public function userEditInfo(){
//        $user = Auth::user();
//        return view('website.profile.edit' , compact('user'));
//    }
//
//    public function userUpdateProfile(userUpdateRequest $request ,User $users){
//        $user = Auth::user();
//        if($request->email != $user->email){
//            $chechmail = $users::where('email' , $request->email)->count();
//            if($chechmail == 0){
//                $user->fill($request->all())->save();
//            }else{
//                return Redirect::back()->whithFlashMessage('هذا الايميل موجود مسبقا');
//            }
//        }else{
//            $user->fill(['name' => $request->name])->save();
//        }
//        return Redirect::back()->withFlashMessage('تم التعديل بنجاح');
//    }
}
