<?php

namespace App\Http\Controllers;

use App\Models\ClickAndCollect;
use App\Models\Dates;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

class DatesController extends Controller
{
    public function show(){
        //delete old dates
        $dayDate = today()->format('Y-m-d');
        Dates::where('closingDate', '<', $dayDate)->delete();
        //show closing days
        $dates = Dates::orderBy('closingDate', 'asc')->get();
        return view('admin.dayClose', compact('dates'));
    }

    public function apiDates(){
        $time = time();
        $times = strtotime('+1 hours, +15 minutes', $time);
        $dates = Dates::orderBy('closingDate', 'asc')->get();
        $less15m = date("G:i:s", $times);
        $collectTimeToday = ClickAndCollect::orderBy('clickAndCollectTime', 'asc')->get('clickAndCollectTime')->Where('clickAndCollectTime','>',$less15m);
        $collectTimeTomorow = ClickAndCollect::orderBy('clickAndCollectTime', 'asc')->get('clickAndCollectTime')->all();
        return compact('dates', 'collectTimeToday', 'collectTimeTomorow');
    }

    public function store(){
        $date = Dates::firstOrCreate([
            "closingDate"=>\request("closingDate"),
        ]);
        \session()->flash('notifSuccess', [
            "type"=>"success",
            "notif"=>"La date de fermeture a bien était ajouté"]);
        return redirect()->back();
    }

    public function delete($id){
        Dates::find($id)->delete();
        \session()->flash('notifSuccess', [
            "type"=>"danger",
            "notif"=>"La date à etait supprimée"]);
        return redirect()->back();
    }
}
