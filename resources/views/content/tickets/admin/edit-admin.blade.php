@extends('layouts/contentLayoutMaster')

@section('title', 'edit-tickets')

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <h1 class="content-header-title float-left mr-2">Sysmo Company</h1>
                        <li class="breadcrumb-item"><a href="#">Tickets</a></li>
                        <li class="breadcrumb-item"><a href="#">Editar Ticket</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="basic-vertical-layouts">
    <div class="row match-height d-flex justify-content-center">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Atendiendo el Ticket #{{ $ticket->id}}</h4>
                    <h4 class="card-title mt-2">Usuario: <span class="text-primary">{{ $ticket->getUser->username}}</span></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('ticket.update-admin', $ticket->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Email de contacto</label>
                                            <input type="email" disabled id="email" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ $ticket->email }}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Whatsapp de contacto</label>
                                            <input type="text" disabled id="whatsapp" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ $ticket->whatsapp }}" name="whatsapp">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Asunto del Ticket</label>
                                            <input type="text" id="issue" disabled class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                                value="{{ $ticket->issue }}" name="issue">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Especificación del Ticket</label>
                                            <textarea type="text" rows="5" disabled id="description"
                                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                                name="description">{{ $ticket->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nota del Administrador</label>
                                            <span class="text-danger text-bold-600">(Dejar nota Obligatoria para el
                                                usuario)</span>
                                            <textarea type="text" rows="5" id="note_admin"
                                                placeholder="En este campo estara la nota que deja el administrador que atendio su orden"
                                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                                name="note_admin" required>{{$ticket->note_admin}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="status">Estado del ticket</label>
                                                <span class="text-danger text-bold-600">OBLIGATORIO</span>
                                                <select name="status" id="status"
                                                    class="custom-select status @error('status') is-invalid @enderror"
                                                    required data-toggle="select" >
                                                    <option value="0" @if($ticket->status == '0') selected  @endif>En Espera</option>
                                                    <option value="1" @if($ticket->status == '1') selected  @endif>Solucionado</option>
                                                    <option value="2" @if($ticket->status == '2') selected  @endif>Procesando</option>
                                                    <option value="3" @if($ticket->status == '3') selected  @endif>Cancelada</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Actualizar
                                            Ticket</button>

                                            <a href="{{ route('ticket.list-admin') }}"
                                            class="btn btn-danger mr-1 mb-1 waves-effect waves-light">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
