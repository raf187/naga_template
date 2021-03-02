<div class="modal fade" id="nagaInfo" tabindex="1" role="dialog" aria-labelledby="nagaInfo" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content col-md-12">
            <div class="modal-body px-3">
                <h4 class="text-center pt-2 headSec orderComfir">Infos Nâga Nice</h4>
                <hr class="my-4">
                <div class="container infoResto">
                    <h5 class="pb-2">Nous trouver</h5>
                    <p>
                        <a  class="text-dark text-decoration-none" href="https://www.google.com/maps/place/76+Boulevard+de+la+Madeleine,+06000+Nice/@43.6977812,7.2387201,17z/data=!3m1!4b1!4m5!3m4!1s0x12cdd03f0024c00f:0x131a08fc88a41338!8m2!3d43.6977812!4d7.2409088" target="_blank">
                            <i class="fas fa-map-marker-alt pr-2"></i>
                            76, Boulevard de la Madeleine
                        </a>
                    </p>
                    <p><i class="fas fa-phone-alt pr-2"></i>04 93 86 76 09</p>
                    <p><i class="fas fa-at pr-2"></i>contact@naga-nice.com</p>
                    <p><i class="fas fa-clock pr-2"></i>Horaires</p>
                    <ul class="openT px-5">
                      @foreach($schedules as $time)
                        <li class="d-flex justify-content-between"><span class="font-weight-bold col-4">{{$time->dayFr}}:</span><span class="offset-1"> @if($time->morningIsClose == 1 && $time->nigthIsClose == 1) Fermé @else Midi - @if($time->morningOpen == 1) Fermé @else{{ date("H:i", strtotime($time->morningOpen)) }} à {{ date("H:i", strtotime($time->morningClose)) }} @endif<br>Soir - @if($time->nigthIsClose == 1) Fermé @else{{ date("H:i", strtotime($time->nightOpen)) }} à {{ date("H:i", strtotime($time->nightClose)) }} @endif @endif</span></li>
                        <hr class="m-1">
                      @endforeach
                    </ul>
                </div>
                <div class="payMethod container">
                    <h5 class="pb-2">Methodes de paiement</h5>
                    <p><i class="fas fa-credit-card pr-2"></i>Paiement en ligne par CB/Visa/MasterCard et cartes Titres-Restaurant Apetiz/Pass-Restaurant/Chèque-Déjeuner ainsi que Resto Flash et Swile. Paiement est entièrement securisé chez notre partenaire PayGreen.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light mr-4" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
