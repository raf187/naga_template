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
                        <li class="d-flex justify-content-between"><span class="font-weight-bold col-4">Lundi:</span><span class="offset-1"> @if($schedules->mondayOpenMorning === 1 && $schedules->mondayOpenNigth === 1) Fermé @else Midi - @if($schedules->mondayOpenMorning === 1) Fermé @else{{ date("H:i", strtotime($schedules->mondayMorning1)) }} à {{ date("H:i", strtotime($schedules->mondayMorning2)) }} @endif<br>Soir - @if($schedules->mondayOpenNigth === 1) Fermé @else{{ date("H:i", strtotime($schedules->mondayNigth1)) }} à {{ date("H:i", strtotime($schedules->mondayNigth2)) }} @endif @endif</span></li>
                        <hr class="m-1">
                        <li class=" d-flex justify-content-between"><span class="font-weight-bold col-4">Mardi:</span><span class="offset-1">@if($schedules->tuesdayOpenMorning === 1 && $schedules->tuesdayOpenNigth === 1) Fermé @else Midi - @if($schedules->tuesdayOpenMorning === 1) Fermé @else{{ date("H:i", strtotime($schedules->tuesdayMorning1)) }} à {{ date("H:i", strtotime($schedules->tuesdayMorning2)) }} @endif<br>Soir - @if($schedules->tuesdayOpenNigth === 1) Fermé @else{{ date("H:i", strtotime($schedules->tuesdayNigth1)) }} à {{ date("H:i", strtotime($schedules->tuesdayNigth2)) }} @endif @endif</span></li>
                        <hr class="m-1">
                        <li class=" d-flex justify-content-between"><span class="font-weight-bold col-4">Mercredi:</span><span class="offset-1">@if($schedules->wednesdayOpenMorning === 1 && $schedules->wednesdayOpenNigth === 1) Fermé @else Midi - @if($schedules->wednesdayOpenMorning === 1) Fermé @else{{ date("H:i", strtotime($schedules->wednesdayMorning1)) }} à {{ date("H:i", strtotime($schedules->wednesdayMorning2)) }} @endif<br>Soir - @if($schedules->wednesdayOpenNigth === 1) Fermé @else{{ date("H:i", strtotime($schedules->wednesdayNigth1)) }} à {{ date("H:i", strtotime($schedules->wednesdayNigth2)) }} @endif @endif</span></li>
                        <hr class="m-1">
                        <li class=" d-flex justify-content-between"><span class="font-weight-bold col-4">Jeudi:</span><span class="offset-1">@if($schedules->thursdayOpenMorning === 1 && $schedules->thursdayOpenNigth === 1) Fermé @else Midi - @if($schedules->thursdayOpenMorning === 1) Fermé @else{{ date("H:i", strtotime($schedules->thursdayMorning1)) }} à {{ date("H:i", strtotime($schedules->thursdayMorning2)) }} @endif<br>Soir - @if($schedules->thursdayOpenNigth === 1) Fermé @else{{ date("H:i", strtotime($schedules->thursdayNigth1)) }} à {{ date("H:i", strtotime($schedules->thursdayNigth2)) }} @endif @endif</span></li>
                        <hr class="m-1">
                        <li class=" d-flex justify-content-between"><span class="font-weight-bold col-4">Vendredi:</span><span class="offset-1">@if($schedules->fridayOpenMorning === 1 && $schedules->fridayOpenNigth === 1) Fermé @else Midi - @if($schedules->fridayOpenMorning === 1) Fermé @else{{ date("H:i", strtotime($schedules->fridayMorning1)) }} à {{ date("H:i", strtotime($schedules->fridayMorning2)) }} @endif<br>Soir - @if($schedules->fridayOpenNigth === 1) Fermé @else{{ date("H:i", strtotime($schedules->fridayNigth1)) }} à {{ date("H:i", strtotime($schedules->fridayNigth2)) }} @endif @endif</span></li>
                        <hr class="m-1">
                        <li class=" d-flex justify-content-between"><span class="font-weight-bold col-4">Samedi:</span><span class="offset-1">@if($schedules->saturdayOpenMorning === 1 && $schedules->saturdayOpenNigth === 1) Fermé @else Midi - @if($schedules->saturdayOpenMorning === 1) Fermé @else{{ date("H:i", strtotime($schedules->saturdayMorning1)) }} à {{ date("H:i", strtotime($schedules->saturdayMorning2)) }} @endif<br>Soir - @if($schedules->saturdayOpenNigth === 1) Fermé @else{{ date("H:i", strtotime($schedules->saturdayNigth1)) }} à {{ date("H:i", strtotime($schedules->saturdayNigth2)) }} @endif @endif</span></li>
                        <hr class="m-1">
                        <li class=" d-flex justify-content-between"><span class="font-weight-bold col-4">Dimanche:</span><span class="offset-1">@if($schedules->sundayOpenMorning === 1 && $schedules->sundayOpenNigth === 1) Fermé @else Midi - @if($schedules->sundayOpenMorning === 1) Fermé @else{{ date("H:i", strtotime($schedules->sundayMorning1)) }} à {{ date("H:i", strtotime($schedules->sundayMorning2)) }} @endif<br>Soir - @if($schedules->sundayOpenNigth === 1) Fermé @else{{ date("H:i", strtotime($schedules->sundayNigth1)) }} à {{ date("H:i", strtotime($schedules->sundayNigth2)) }} @endif @endif</span></li>
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
