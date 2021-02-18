@extends('layouts.admin')
@section('adminContent')
    <form method="post" id="orderStatusUpdate" action="/print/{{ $orderPrint->id }}">
        @csrf
        <input type="hidden" name="orderStatus" value="1">
            <button type="submit" class="btn @if($orderPrint->orderStatus == 0) btn-info @else btn-success @endif startPrint col-12 py-5 ">
                Imprimer <i class="fas fa-print"></i>
            </button>
    </form>
<div class="display-3" id="ticketBeforePrint">
    <div id="ticket" class="bg-white pb-5 px-5">
        <div class="d-flex justify-content-center m-0 p-0">
            <img class="m-0 p-0" src="{{ asset('/media/logoTicket.png') }}" style="width:580px" alt="logo naga">
        </div>
        <p class="text-center font-weight-bold my-1">www.naga-nice.com</p>
        <p class="text-center text-muted ticketMenu">Siret: 89323230600017<br>TVA: FR53893232306</p>
        <div class="pt-5">
            <p class="m-0 font-weight-bolder ticketMenu">Nom: {{ $user->firstName }} {{ $user->lastName }}</p>
            <p class="m-0 font-weight-bolder ticketMenu">Tel.: {{ $user->phone }}</p>
            <p class="m-0 font-weight-bold">
                Retrait à {{str_replace(":", "h", $orderPrint->deliTime)}}
            @if($orderPrint->deliType === "Retrait" && $orderPrint->payMethod === 'TR-PAPIER' || $orderPrint->payMethod === 'ESPÈCES')
                <p class="font-weight-bold text-uppercase">À payer</p>
            @else
                <p class="font-weight-bold text-uppercase">Payé en ligne</p>
            @endif
        </div>
        <hr class="my-5">
        <p class="pb-5 font-weight-bolder ticketMenu">Commande n°{{ $orderPrint->orderId }}</p>
        <div class="font-weight-bolder m-0 ticketMenu">
            <div class="row">
            @foreach($orderPrint->orderList as $key=>$item)
                @if($key > 20)
                        <div class="col-9 font-weight-bolder">{{ $item['quantity'] }} x {{ $item['attributes']['code'] !== null ? $item['attributes']['code'] : $item['name']}}</div>
                        <div class="col-3 d-flex font-weight-bolder justify-content-end">{{number_format($item['quantity'] * $item['price'], 2, ',', ' ')}} €</div>
                    @if($item['attributes']['extra'] !== null)
                            @foreach($item['attributes']['extra'] as $attr)
                                <div class="col-9 font-weight-bolder" style="font-size: 42px">{{ $item['quantity'] }} x {{ $attr['name']}}</div>
                                @if($attr['price'] > 0)
                                    <div class="col-3 font-weight-bolder d-flex justify-content-end" style="font-size: 42px">{{number_format($item['quantity'] * $attr['price'], 2, ',', ' ')}} €</div>
                                @endif
                            @endforeach
                    @endif
                @else
                        <div class="col-9">{{ $item['qty'] }} x {{ $item['code'] !== null ? $item['code'] : $item['name']}}</div>
                        <div class="col-3 d-flex justify-content-end">{{number_format($item['qty'] * $item['price'], 2, ',', ' ')}} €</div>
                @endif
            @endforeach
            </div>

        <span class="">{{ $orderPrint->utensils }}</span>
        @if($orderPrint->infoOrder)
        <p class="font-weight-bolder">Commentaire<br>{{$orderPrint->infoOrder}}</p>
        @endif
        <hr class="my-5">
        <p class="d-flex justify-content-end font-weight-bolder pt-5">Total TTC: {{number_format($orderPrint->totalPrice, 2, ',', ' ')}} €</p>
        <div class="text-muted tvaSection pb-5">
            @if($orderPrint->tva6 > 0)
                <div class="d-flex justify-content-between">
                    <p class="m-0">T.V.A. 5.5%</p><span class="ml-5">{{number_format($orderPrint->tva6, 2, ',', ' ')}} €</span>
                </div>
            @endif
            @if($orderPrint->tva10 > 0)
                    <div class="d-flex justify-content-between">
                        <p class="m-0">T.V.A. 10%</p><span class="ml-5">{{number_format($orderPrint->tva10, 2, ',', ' ')}} €</span>
                    </div>

            @endif
            @if($orderPrint->tva20 > 0)
                    <div class="d-flex justify-content-between">
                        <p class="m-0">T.V.A. 20%</p><span class="ml-5">{{number_format($orderPrint->tva20, 2, ',', ' ')}} €</span>
                    </div>
            @endif
                <p class="d-flex justify-content-end mt-2">Total HT: {{number_format($orderPrint->totalPrice - $orderPrint->tva20 - $orderPrint->tva10 - $orderPrint->tva6, 2, ',', ' ') }} €</p>

        </div>

        <p class="text-center font-weight-bold pt-5">Bon appétit et à bientôt</p>
        <p class="text-center pb-5">Le {{date("d/m/Y à H:i")}}</p>

    </div>
</div>

@endsection
