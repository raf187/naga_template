@extends('layouts.admin')
@section('adminContent')
<div class="p-5">
    <div class="border-0 shadow-lg bg-light rounded col-md-10 offset-md-1 py-4">
        <h4 class="text-center font-weight-bold pb-4">Horaires de ouverture midi et soir</h4>
        @if(session()->has('notifSuccess'))
            <div class="alertFade alert alert-{!! session()->get('notifSuccess.type') !!} text-center py-3 col-md-10 mx-auto">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
                <span>{!! session()->get('notifSuccess.notif') !!}</span>
            </div>
        @endif
        <div class="px-5 mx-auto">
            <form action="/admin/schedules" method="POST">
                @csrf
                <div class="mb-2">
                    <p class="font-weight-bold">Lundi</p>
                    <div class="row justify-content-around">
                        <div class="p-3 rounded @if($time->mondayOpenMorning === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Midi</label>
                            <input name="mondayMorning1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->mondayMorning1)) }}">
                            <input name="mondayMorning2" class="ml-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->mondayMorning2)) }}">
                            <div class="text-center pt-2">
                                <input name="mondayOpenMorning" class="mr-2 my-auto" type="checkbox" @if($time->mondayOpenMorning === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                        <div class="p-3 rounded @if($time->mondayOpenNigth === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Soir</label>
                            <input name="mondayNigth1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->mondayNigth1)) }}">
                            <input name="mondayNigth2" class="ml-2 mr-3 my-auto" type="time" value="{{ date("H:i", strtotime($time->mondayNigth2)) }}">
                            <div class="text-center pt-2">
                                <input name="mondayOpenNigth" class="mr-2 my-auto" type="checkbox" @if($time->mondayOpenNigth === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mb-2">
                    <p class="font-weight-bold">Mardi</p>
                    <div class="row justify-content-around">
                        <div class="p-3 rounded @if($time->tuesdayOpenMorning === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Midi</label>
                            <input name="tuesdayMorning1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->tuesdayMorning1)) }}">
                            <input name="tuesdayMorning2" class="ml-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->tuesdayMorning2)) }}">
                            <div class="text-center pt-2">
                                <input name="tuesdayOpenMorning" class="mr-2 my-auto" type="checkbox" @if($time->tuesdayOpenMorning === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                        <div class="p-3 rounded @if($time->tuesdayOpenNigth === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Soir</label>
                            <input name="tuesdayNigth1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->tuesdayNigth1)) }}">
                            <input name="tuesdayNigth2" class="ml-2 mr-3 my-auto" type="time" value="{{ date("H:i", strtotime($time->tuesdayNigth2)) }}">
                            <div class="text-center pt-2">
                                <input name="tuesdayOpenNigth" class="mr-2 my-auto" type="checkbox" @if($time->tuesdayOpenNigth === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mb-2">
                    <p class="font-weight-bold">Mercredi</p>
                    <div class="row justify-content-around">
                        <div class="p-3 rounded @if($time->wednesdayOpenMorning === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Midi</label>
                            <input name="wednesdayMorning1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->wednesdayMorning1)) }}">
                            <input name="wednesdayMorning2" class="ml-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->wednesdayMorning2)) }}">
                            <div class="text-center pt-2">
                                <input name="wednesdayOpenMorning" class="mr-2 my-auto" type="checkbox" @if($time->wednesdayOpenMorning === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                        <div class="p-3 rounded @if($time->wednesdayOpenNigth === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Soir</label>
                            <input name="wednesdayNigth1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->wednesdayNigth1)) }}">
                            <input name="wednesdayNigth2" class="ml-2 mr-3 my-auto" type="time" value="{{ date("H:i", strtotime($time->wednesdayNigth2)) }}">
                            <div class="text-center pt-2">
                                <input name="wednesdayOpenNigth" class="mr-2 my-auto" type="checkbox" @if($time->wednesdayOpenNigth === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mb-2">
                    <p class="font-weight-bold">Jeudi</p>
                    <div class="row justify-content-around">
                        <div class="p-3 rounded @if($time->thursdayOpenMorning === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Midi</label>
                            <input name="thursdayMorning1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->thursdayMorning1)) }}">
                            <input name="thursdayMorning2" class="ml-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->thursdayMorning2)) }}">
                            <div class="text-center pt-2">
                                <input name="thursdayOpenMorning" class="mr-2 my-auto" type="checkbox" @if($time->thursdayOpenMorning === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                        <div class="p-3 rounded @if($time->thursdayOpenNigth === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Soir</label>
                            <input name="thursdayNigth1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->thursdayNigth1)) }}">
                            <input name="thursdayNigth2" class="ml-2 mr-3 my-auto" type="time" value="{{ date("H:i", strtotime($time->thursdayNigth2)) }}">
                            <div class="text-center pt-2">
                                <input name="thursdayOpenNigth" class="mr-2 my-auto" type="checkbox" @if($time->thursdayOpenNigth === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mb-2">
                    <p class="font-weight-bold">Vendredi</p>
                    <div class="row justify-content-around">
                        <div class="p-3 rounded @if($time->fridayOpenMorning === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Midi</label>
                            <input name="fridayMorning1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->fridayMorning1)) }}">
                            <input name="fridayMorning2" class="ml-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->fridayMorning2)) }}">
                            <div class="text-center pt-2">
                                <input name="fridayOpenMorning" class="mr-2 my-auto" type="checkbox" @if($time->fridayOpenMorning === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                        <div class="p-3 rounded @if($time->fridayOpenNigth === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Soir</label>
                            <input name="fridayNigth1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->fridayNigth1)) }}">
                            <input name="fridayNigth2" class="ml-2 mr-3 my-auto" type="time" value="{{ date("H:i", strtotime($time->fridayNigth2)) }}">
                            <div class="text-center pt-2">
                                <input name="fridayOpenNigth" class="mr-2 my-auto" type="checkbox" @if($time->fridayOpenNigth === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mb-2">
                    <p class="font-weight-bold">Samedi</p>
                    <div class="row justify-content-around">
                        <div class="p-3 rounded @if($time->saturdayOpenMorning === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Midi</label>
                            <input name="saturdayMorning1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->saturdayMorning1)) }}">
                            <input name="saturdayMorning2" class="ml-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->saturdayMorning2)) }}">
                            <div class="text-center pt-2">
                                <input name="saturdayOpenMorning" class="mr-2 my-auto" type="checkbox" @if($time->saturdayOpenMorning === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                        <div class="p-3 rounded @if($time->saturdayOpenNigth === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Soir</label>
                            <input name="saturdayNigth1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->saturdayNigth1)) }}">
                            <input name="saturdayNigth2" class="ml-2 mr-3 my-auto" type="time" value="{{ date("H:i", strtotime($time->saturdayNigth2)) }}">
                            <div class="text-center pt-2">
                                <input name="saturdayOpenNigth" class="mr-2 my-auto" type="checkbox" @if($time->saturdayOpenNigth === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="mb-2">
                    <p class="font-weight-bold">Dimanche</p>
                    <div class="row justify-content-around">
                        <div class="p-3 rounded @if($time->sundayOpenMorning === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Midi</label>
                            <input name="sundayMorning1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->sundayMorning1)) }}">
                            <input name="sundayMorning2" class="ml-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->sundayMorning2)) }}">
                            <div class="text-center pt-2">
                                <input name="sundayOpenMorning" class="mr-2 my-auto" type="checkbox" @if($time->sundayOpenMorning === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                        <div class="p-3 rounded @if($time->sundayOpenNigth === 1) bg-danger @endif">
                            <label class="px-2 my-auto font-weight-normal">Soir</label>
                            <input name="sundayNigth1" class="mr-2 my-auto" type="time" value="{{ date("H:i", strtotime($time->sundayNigth1)) }}">
                            <input name="sundayNigth2" class="ml-2 mr-3 my-auto" type="time" value="{{ date("H:i", strtotime($time->sundayNigth2)) }}">
                            <div class="text-center pt-2">
                                <input name="sundayOpenNigth" class="mr-2 my-auto" type="checkbox" @if($time->sundayOpenNigth === 1) checked @endif>
                                <label class="my-auto">Fermé</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="text-muted">* Si <span class="text-danger">ROUGE</span> la fermeture et activé</p>
                <button class="mt-5 btn btn-success col-md-10 offset-md-1" type="submit">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection
