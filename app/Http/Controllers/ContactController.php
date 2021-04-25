<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function index(){

        return view('admin.contact.index');

    }



    public function store(Requests\ContactRequest $request , Contact $contact)
    {
        $contact->create($request->all());
        return Redirect::back()->withFlashMessage('تم ارسال رسالتك بنجاح');
    }


    public function edit(Request $request, $id){
        $contact = Contact::find($id);
        $contact->fill(['view' => 1])->save();
        return view('admin.contact.edit', compact('contact' ,'id'));
    }

    public function update($id , Contact $contact , Request $request){
        $contactupdate = $contact->find($id);
        $contactupdate->fill($request->all())->save();

        session()->flash('success','تم التعديل بنجاح');
        return redirect()->back();
    }

    public function delete($id , Contact $contact){
        $contact->find($id)->delete();
        return Redirect::back()->withFlashMessage('تم الحذف بنجاح');
    }


    public function anyData(Contact $contact){

        $contact = $contact->all();
        return DataTables::of($contact)

//        ->editColumn('contact_name', function ($model)
//        {
//
//            return url('/adminpanel/contact/'. $model->id . '/edit');
//        })
            ->editColumn('contact_type', function ($model)
        {
            return contact()[$model->contact_type];
        })


//        ->addColumn('view', function($model) {
//
//            })
        ->addColumn('edit_url', function($model) {
            return url('/adminpanel/contact/'. $model->id . '/edit');
        })
        ->addColumn('delete_url', function($model) {
            return url('/adminpanel/contact/'. $model->id . '/delete');
        })
            ->make(true);
    }
}
