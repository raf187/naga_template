<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function show(){
        $array = [];
        $dayOrder = Order::all()->where('paymentStatus',1)->sortBy('deliDate');

        $day = $dayOrder->groupBy(function ($res, $key){
           return $res->deliDate;
        })->map(function ($itm, $key){
            $totalCBresto = $itm->sum('cbResto');
            $totalTR = $itm->whereNotIn('payMethod', ['CB','TRD','RESTOFLASH'])->sum('ticketResto');
            $total = $itm->sum('totalPrice');
            $totalPG = $itm->whereNotIn('payMethod', ['TR-PAPIER','ESPÈCES'])->sum('totalPrice');
            $totalMoney = ($total - $totalTR - $totalCBresto) - $totalPG;
            $tva6 = $itm->sum('tva6');
            $tva10 = $itm->sum('tva10') + ($itm->sum('deliSup') - ($itm->sum('deliSup') / 1.1));
            $tva20 = $itm->sum('tva20');

            return [
                'totalCBresto'=>$totalCBresto,
                'totalTR'=>$totalTR,
                'totalMoney'=>$totalMoney,
                'totalPG'=>$totalPG,
                'tva6'=>$tva6,
                'tva10'=>$tva10,
                'tva20'=>$tva20,
                'totalHT'=>$total - $tva6 - $tva10 - $tva20,
                'totalTTC'=>$total
            ];
        });
        return view('admin.revenue', compact('day'));
    }
}
