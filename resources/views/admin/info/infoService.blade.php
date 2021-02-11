@extends('layouts.admin')
@section('adminContent')
    <div class="p-5">
        <div class="border-0 shadow-lg bg-light rounded col-md-8 offset-md-2 py-4">
            <h4 class="text-center font-weight-bold pb-4">Gestion des informations service</h4>
            @if(session()->has('notifSuccess'))
                <div class="alertFade alert alert-{!! session()->get('notifSuccess.type') !!} text-center py-3 col-md-10 mx-auto">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                    </button>
                    <span>{!! session()->get('notifSuccess.notif') !!}</span>
                </div>
            @endif
                <a href="/admin/ajouter-info" class="btn btn-success col-md-10 offset-md-1">Ajouter une info service
                </a>
            <div class="container py-4 col-md-10 offset-md-1">
                <h5 class="text-center">Toutes les infos</h5>
                <ul class="list-group border-0 shadow-lg">
                        @if(count($infoList) > 0)
                            @foreach($infoList as $info)
                                <li class="border-bottom-light list-group-item d-flex justify-content-between">
                                    <span class="col-4">
                                        {{ $info->title }}
                                    </span>
                                    <span class="col-4">
                                        par {{ $info->author }}
                                    </span>
                                    <div class="col-4 text-center">
                                        <a href="/admin/modifier-info/{{ $info->id }}"><i class="far fa-edit text-success mr-4"></i></a>
                                        <a href="" data-toggle="modal" data-target="#supInfo" class="text-danger deleteLink"><i class="fas fa-trash pr-3"></i></a>
                                    </div>
                                </li>
                                <div class="modal fade" id="supInfo" tabindex="1" role="dialog" aria-labelledby="labelsupInfo" aria-hidden="true">
                                    <div class="modal-dialog modal-sm text-center" role="document">
                                        <div class="modal-content col-md-12">
                                            <div class="modal-body px-3">
                                                <h3 class="text-center text-success font-weight-bold pb-3">Info services</h3>
                                                <p>Êtes-vous sûr de vouloir supprimer?</p>
                                            </div>
                                            <div class="modal-footer row">
                                                <button class="btn btn-light mr-4" data-dismiss="modal">Annuler</button>
                                                <a class="btn btn-danger" href="/admin/delete-info/{{$info->id}}">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <li class="border-bottom-light list-group-item d-flex justify-content-around">
                            Pas de info service dans la base de donnes.
                        </li>
                        @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
