<section id="accueil" class="container-fluid">
    @if(session()->has('notifSuccess'))
        <div id="notif" class="position-absolute mt-3">
            <div class="msgDivAlert alert alert-{!! session()->get('notifSuccess.type') !!} text-center py-5">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
                <span class="py-5">{!! session()->get('notifSuccess.notif') !!}</span>
            </div>
        </div>
    @endif
    <div class="col-md-10 welcome mx-auto text-center position-relative">
        <img class="img-responsive" src="{{ asset('media/logoHome.png') }}" alt="Logo Nâga Sophia combodia street food">
        <h2 class="font-weight-bold my-md-2 text-white logoPara">Livraison ou retrait au restaurant <br>Nice la Madeleine.</h2>
        <div class="row d-flex justify-content-center col-md-12">
            <button class="font-weight-bolder btn btn-success m-2 px-2 col-md-4" data-toggle="modal" data-target="#deli_uber">
                Livraison
            </button>
            <a href="#menu" class="font-weight-bolder btn btn-success m-2 px-2 col-md-4 typeTake">Retrait au restaurant</a>
        </div>
    </div>

</section>
