<?php

namespace App\Http\Controllers;

use App\Models\ClickAndCollect;
use App\Models\Dates;
use App\Models\OpenTime;
use Carbon\Carbon;
use Jenssegers\Date\Date;

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
        $dates = Dates::orderBy('closingDate', 'asc')->get();
        $shedulles = OpenTime::all();
        $mornigClose = OpenTime::Where('morningIsClose', '1')->get();
        $nigthClose = OpenTime::Where('nigthIsClose', '1')->get();
        $date = Date::now('Europe/Paris');
        Date::setLocale('fr');
        //dd($date->format('H:m:i'));
        $today = $date->format('H:m:i') > "21:30:00" ? $date->addDay() : $date;
        //get closing time
        $nigthCloseArray = [];
        $mornigCloseArray = [];
        foreach ($nigthClose as $n){
            array_push($nigthCloseArray, $n['dayFr']);
        }
        foreach ($mornigClose as $m){
            array_push($mornigCloseArray, $m['dayFr']);
        }
        //get closing days
        $dayClose = [];
        $dateClose = [];
        foreach ($shedulles as $dClose){
            if ($dClose['morningIsClose'] == 1 && $dClose['nigthIsClose'] == 1){
                array_push($dayClose, $dClose['dayFr']);
            }
        }
        foreach ($dates as $closeDate){
            array_push($dateClose, $closeDate['closingDate']);
        }
        if (count($dayClose) > 0 && count($dateClose) < 1){
            foreach ($dayClose as $dClose){
                if(strtolower($today->format('l')) == strtolower($dClose)){
                    $today = $today->addDay();
                }
            }
        }elseif (count($dateClose) > 0 && count($dayClose) < 1){
            foreach ($dateClose as $close){
                if($today->format('Y-m-d') == $close){
                    $today = $today->addDay();
                }
            }
        }elseif(count($dateClose) > 0 && count($dayClose) > 0){
            foreach ($dayClose as $dClose){
                foreach ($dateClose as $close){
                    if($today->format('Y-m-d') == $close){
                        $today = $today->addDay();
                    }
                }
                if(strtolower($today->format('l')) == strtolower($dClose)){
                    $today = $today->addDay();
                }
            }
        }
        $tomorow = new Date($today);
        $tomorow->addDay();

        if (count($dayClose) > 0 && count($dateClose) < 1){
            foreach ($dayClose as $dClose){
                if(strtolower($tomorow->format('l')) == strtolower($dClose)){
                    $tomorow = $tomorow->addDay();
                }
            }
        }elseif (count($dateClose) > 0 && count($dayClose) < 1){
            foreach ($dateClose as $close){
                if($tomorow->format('Y-m-d') == $close){
                    $tomorow = $tomorow->addDay();
                }
            }
        }elseif(count($dateClose) > 0 && count($dayClose) > 0){
            foreach ($dayClose as $dClose){
                foreach ($dateClose as $close){
                    if($tomorow->format('Y-m-d') == $close){
                        $tomorow = $tomorow->addDay();
                    }
                }
                if(strtolower($tomorow->format('l')) == strtolower($dClose)){
                    $tomorow = $tomorow->addDay();
                }
            }
        }

        $orderDates = [
            [
                'name'=>'today',
                'dayWeek'=>$today->format('l d'),
                'dateFormat'=>$today->format('Y/m/d')],
            [
                'name'=>'tomorow',
                'dayWeek'=>$tomorow->format('l d'),
                'dateFormat'=>$tomorow->format('Y/m/d')],
        ];

        $nigthCloseArray = array_map('strtolower', $nigthCloseArray);
        $mornigCloseArray = array_map('strtolower', $mornigCloseArray);
        //click&collect
        $times15m = strtotime('+1 hours, +15 minutes', $time);
        $less15m = date("G:i:s", $times15m);

        $collectTimeToday = ClickAndCollect::orderBy('clickAndCollectTime', 'asc')->Where('clickAndCollectTime','>',$less15m)->get();

        if (in_array(strtolower($today->format('l')), $mornigCloseArray)){
            $collectTimeToday = ClickAndCollect::orderBy('clickAndCollectTime', 'asc')->Where('clickAndCollectTime','>',['16:00:00', $less15m])->get();
        }
        if (in_array(strtolower($today->format('l')), $nigthCloseArray)){
            $collectTimeToday = ClickAndCollect::orderBy('clickAndCollectTime', 'asc')->Where([['clickAndCollectTime', '<', '16:00:00'],['clickAndCollectTime','>', $less15m]])->get();
        }
        if (strtolower($today->format('l')) !== strtolower(Date::now()->format('l'))){
            $collectTimeToday = ClickAndCollect::orderBy('clickAndCollectTime', 'asc')->get();
        }
        $collectTimeTomorow =
            in_array(strtolower($tomorow->format('l')), $mornigCloseArray)
                ? ClickAndCollect::orderBy('clickAndCollectTime', 'asc')->Where('clickAndCollectTime','>','16:00:00')->get()
                : (in_array(strtolower($tomorow->format('l')), $nigthCloseArray)
                ? ClickAndCollect::orderBy('clickAndCollectTime', 'asc')->Where('clickAndCollectTime', '<', '16:00:00')->get()
                : ClickAndCollect::orderBy('clickAndCollectTime', 'asc')->get());

        return compact('orderDates', 'collectTimeToday', 'collectTimeTomorow', 'shedulles');
    }

    public function store(){
        $date = Dates::firstOrCreate([
            "closingDate"=>\request("closingDate"),
        ]);
        \session()->flash('notifSuccess', [
            "type"=>"success",
            "notif"=>"La date de fermeture a bien ??tait ajout??"]);
        return redirect()->back();
    }

    public function delete($id){
        Dates::find($id)->delete();
        \session()->flash('notifSuccess', [
            "type"=>"danger",
            "notif"=>"La date ?? etait supprim??e"]);
        return redirect()->back();
    }
}
