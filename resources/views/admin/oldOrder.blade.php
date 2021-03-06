@extends('layouts.admin')
@section('adminContent')
        <div class="col-md-12 px-2">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body px-2">
                    <div class="table-responsive px-0">
                        <h4 class="text-center font-weight-bold pb-4">Historique des commandes</h4>
                        @if(session()->has('notifSuccess'))
                            <div class="alertFade alert alert-{!! session()->get('notifSuccess.type') !!} text-center py-3">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <span>{!! session()->get('notifSuccess.notif') !!}</span>
                            </div>
                        @endif
                        <table id="exemple" class="table table-striped table-border" style="width:100%">
                            <thead>
                            <tr>
                                <th>N° commande</th>
                                <th>Commande</th>
                                <th>Client</th>
                                <th>Prix et method</th>
                                <th>Type et date</th>
                                <th>Date commande</th>
                                <th>Info<br>paiement</th>
                                @role('superadministrator')
                                <th>Supprimer</th>
                                @endrole
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>N° commande</th>
                                <th>Commande</th>
                                <th>Client</th>
                                <th>Prix et method</th>
                                <th>Type et date</th>
                                <th>Date commande</th>
                                <th>Info<br>paiement</th>
                                @role('superadministrator')
                                <th>Supprimer</th>
                                @endrole
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($oldOrders as $order)
                                <tr>
                                    <td>{{ $order->orderId }}</td>
                                    <td style="width: 160px">
                                        @foreach($order->orderList as $key=>$item)
                                            @if($key > 20)
                                                <span>{{ $item['quantity'] }} x {{ $item['attributes']['code'] !== null ? $item['attributes']['code'] : $item['name']}}</span><br>
                                                @if($item['attributes']['extra'] !== null)
                                                    @foreach($item['attributes']['extra'] as $attr)
                                                        <span class="pl-1 text-muted">{{ $item['quantity'] }} x {{ $attr['name']}}</span><br>
                                                    @endforeach
                                                @endif
                                            @else
                                                <span>{{ $item['qty'] }} x {{ $item['code'] !== null ? $item['code'] : $item['name']}}</span><br>
                                            @endif
                                        @endforeach
                                        <hr>
                                        <span>{{ $order->utensils }}</span>
                                    </td>
                                    <td><a href="/admin/client/{{ $order->user_id }}">{{ $order->firstName }}<br>{{ $order->lastName }}</a></td>
                                    <td class="text-center">{{ $order->totalPrice }} €</td>
                                    <td>{{ $order->deliType }} {{ str_replace(":", 'h',$order->deliTime) }}<br>{{ date('d/m/Y', strtotime($order->deliDate)) }}</td>
                                    <td>{{ date('Y/m/d H:i:s', strtotime($order->created_at)) }}</td>
                                    <td class="text-center">
                                        @if($order->payMethod === "TR-PAPIER" || $order->payMethod === "ESPÈCES")
                                            <form class="text-center m-2" method="post" action="/update-TR-info/{{ $order->id }}">
                                                @csrf
                                                @if($order->ticketResto < 0.01)
                                                <span>TR</span>
                                                <input style="width: 100px" class="" name="trInfo" value="" type="number" required step="0.01" placeholder="0.00">
                                                    <button class="ml-1 btn"><i class="text-success fas fa-check-circle"></i></button><br>
                                                @else
                                                    <span>TR: {{ number_format($order->ticketResto, 2, ",", ".") }} €</span>
                                                    <a href="/delete-TR-info/{{ $order->id }}" class="ml-2 btn"><i class="text-danger fas fa-times-circle"></i></a><br>
                                                @endif
                                            </form>
                                            <form class="text-center m-2" method="post" action="/update-CB-info/{{ $order->id }}">
                                                @csrf
                                                @if($order->cbResto < 0.01)
                                                <span>CB</span>
                                                <input style="width: 100px" class="" name="cbResto" value="" type="number" required step="0.01" placeholder="0.00">
                                                    <button class="ml-1 btn"><i class="text-success fas fa-check-circle"></i></button><br>
                                                @else
                                                    <span>CB: {{ number_format($order->cbResto, 2, ",", ".") }} €</span>
                                                    <a href="/delete-CB-info/{{ $order->id }}" class="ml-2 btn"><i class="text-danger fas fa-times-circle"></i></a><br>
                                                @endif
                                            </form>
                                            <span>Espèces: {{ number_format($order->totalPrice - $order->cbResto - $order->ticketResto, 2, ",", ".") }} €</span>
                                        @else
                                            <p>Payé en ligne</p>
                                        @endif
                                    </td>
                                    @role('superadministrator')
                                    <td class="text-center">
                                        <a class="deleteBtnConfirm" href="/admin/delete/{{ $order->id }}"><i class="far fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                                @endrole
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
