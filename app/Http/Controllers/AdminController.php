<?php

namespace App\Http\Controllers;

use App\Building;
use App\Contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(User $user ,Building $building , Contact $contact)
    {
        $buContactive = countAllBuAppendToStatus(1);
        $buWaitting = countAllBuAppendToStatus(0);
        $usersCount = $user->count();
        $contactUsCount = $contact->count();
        $mapping = $building->select('bu_langtuide' , 'bu_latitude' , 'bu_name')->get();
        $chart = $building->select(DB::raw('COUNT(*) as counting, month'))->where('year' , date('Y'))->groupBy('month')->orderBy('month','asc')->get();
        $latestUsers = $user->take('8')->orderBy('id','desc')->get();
        $latestbu = $building->take('10')->orderBy('id','desc')->get();
        $contact = $contact->take('5')->orderBy('id','desc')->get();

        return view('admin.home.index',
            compact('buContactive','buWaitting','usersCount','contactUsCount','mapping','chart','latestUsers','latestbu','contact'));
    }
}
