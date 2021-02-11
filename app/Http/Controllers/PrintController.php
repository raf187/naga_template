<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function printTicket($id){
        $orderPrint = Order::findOrFail($id);

        $user = User::findOrFail($orderPrint->user_id);
        return view('print.ticket', compact('orderPrint', 'user'));
    }

    public function updateStatus($id){

        Order::findOrFail($id)->update([
            'orderStatus'=>\request('orderStatus')
        ]);

        return redirect('/admin');

}
}
