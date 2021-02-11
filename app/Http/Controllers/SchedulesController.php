<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class SchedulesController extends Controller
{
    public function show(){
        $time =  Schedules::first();
        return view('admin.settings.schedules', compact('time'));
    }

    public function save(Request $request){
        Schedules::first()->update([
            'sundayMorning1'=>\request('sundayMorning1'),
            'sundayMorning2'=>\request('sundayMorning2'),
            'sundayNigth1'=>\request('sundayNigth1'),
            'sundayNigth2'=>\request('sundayNigth2'),
            'sundayOpenMorning'=>$request->has('sundayOpenMorning') ? 1 :0,
            'sundayOpenNigth'=>$request->has('sundayOpenNigth') ? 1 :0,
            'mondayMorning1'=>\request('mondayMorning1'),
            'mondayMorning2'=>\request('mondayMorning2'),
            'mondayNigth1'=>\request('mondayNigth1'),
            'mondayNigth2'=>\request('mondayNigth2'),
            'mondayOpenMorning'=>$request->has('mondayOpenMorning') ? 1 :0,
            'mondayOpenNigth'=>$request->has('mondayOpenNigth') ? 1 :0,
            'tuesdayMorning1'=>\request('tuesdayMorning1'),
            'tuesdayMorning2'=>\request('tuesdayMorning2'),
            'tuesdayNigth1'=>\request('tuesdayNigth1'),
            'tuesdayNigth2'=>\request('tuesdayNigth2'),
            'tuesdayOpenMorning'=>$request->has('tuesdayOpenMorning') ? 1 :0,
            'tuesdayOpenNigth'=>$request->has('tuesdayOpenNigth') ? 1 :0,
            'wednesdayMorning1'=>\request('wednesdayMorning1'),
            'wednesdayMorning2'=>\request('wednesdayMorning2'),
            'wednesdayNigth1'=>\request('wednesdayNigth1'),
            'wednesdayNigth2'=>\request('wednesdayNigth2'),
            'wednesdayOpenMorning'=>$request->has('wednesdayOpenMorning') ? 1 :0,
            'wednesdayOpenNigth'=>$request->has('wednesdayOpenNigth') ? 1 :0,
            'thursdayMorning1'=>\request( 'thursdayMorning1'),
            'thursdayMorning2'=>\request('thursdayMorning2'),
            'thursdayNigth1'=>\request('thursdayNigth1'),
            'thursdayNigth2'=>\request('thursdayNigth2'),
            'thursdayOpenMorning'=>$request->has('thursdayOpenMorning') ? 1 :0,
            'thursdayOpenNigth'=>$request->has('thursdayOpenNigth') ? 1 :0,
            'fridayMorning1'=>\request('fridayMorning1'),
            'fridayMorning2'=>\request('fridayMorning2'),
            'fridayNigth1'=>\request('fridayNigth1'),
            'fridayNigth2'=>\request('fridayNigth2'),
            'fridayOpenMorning'=>$request->has('fridayOpenMorning') ? 1 :0,
            'fridayOpenNigth'=>$request->has('fridayOpenNigth') ? 1 :0,
            'saturdayMorning1'=>\request('saturdayMorning1'),
            'saturdayMorning2'=>\request('saturdayMorning2'),
            'saturdayNigth1'=>\request('saturdayNigth1'),
            'saturdayNigth2'=>\request('saturdayNigth2'),
            'saturdayOpenMorning'=>$request->has('saturdayOpenMorning') ? 1 :0,
            'saturdayOpenNigth'=>$request->has('saturdayOpenNigth') ? 1 :0,
        ]);

        \session()->flash('notifSuccess', [
            "type"=>"success",
            "notif"=>"Horaires mis à jour"]);

        return redirect()->back();
    }
}
