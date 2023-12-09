@extends('adminlte::page')

@section('title', 'Datos del exponente')

@section('content_header')
<h1>Editar datos del exponente</h1>
@stop

@section('plugins.BsCustomFileInput', true)
@section('plugins.TempusDominusBs4', true)

@section('content')
<form action="{{ route('actualizarDatos', $exponente->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <div class="form-floating">
            <label for="exampleInputTextl1">Nombres</label>

            <input required type="text" class="form-control" id="exampleInputTextl1" name="nombres"
                placeholder="Nombres" value="{{$exponente->nombres}}" readonly>
        </div>
    </div>
    
    <div class="form-group">
        <div class="form-floating">
            <label for="exampleInputTextl2">Apellidos</label>

            <input required type="text" class="form-control" id="exampleInputTextl2" name="apellidos"
                placeholder="Apellidos" value="{{$exponente->apellidos}}" readonly>
        </div>
    </div>
    
    <div class="form-group">
        <div class="form-floating">
            <label for="exampleInputEmail1">Email address</label>

            <input required type="email" class="form-control" id="exampleInputEmail1" name="email"
                placeholder="Enter email" value="{{$exponente->email}}" readonly>
        </div>
    </div>


    
    <div class="form-group">
        <div class="form-floating">
            <label for="exampleInputNumber1">Numero</label>

            <input required type="number" class="form-control" id="exampleInputNumber1" name="numero"
                placeholder="Numero celular" value="{{$exponente->numero}}" readonly>
        </div>
    </div>

    
    <div class="form-group">
        <div class="form-floating">
            <label for="exampleInputNumber1">Cargo</label>

            <input required type="text" class="form-control" id="exampleInputNumber1" name="cargo"
                placeholder="Cargo del exponente" value="{{$exponente->cargo}}">
        </div>
    </div>

    <div class="form-group">
        <div class="form-floating">
            <label for="exampleInputNumber1">Informacion de la charla</label>

            <input required type="text" class="form-control" id="exampleInputNumber1" name="charla"
                placeholder="Describe sobre que va hablar el exponente" value="">
        </div>
    </div>

    <div class="row">
                <div class="form-group col-md-6">
                    @php
                    $config = ['format' => 'DD/MM/YYYY HH:mm'];
                    @endphp
                    <x-adminlte-input-date name="horario" :config="$config" placeholder="Escoger fecha..."
                        label="Fecha y hora de la presentacion">
                        <x-slot name="appendSlot">
                            <x-adminlte-button icon="fas fa-calendar-alt" title="Set to Events" />
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
            </div>

    
    <div class="form-group">
        <div class="form-floating">
            <label for="exampleInputNumber1">Foto</label>

            <input required type="file" class="form-control" id="exampleInputNumber1" name="foto"
                >
        </div>
    </div>


    <input value="" type="hidden" style="display:none" name="evento_id" id="evento_id">

    <div class="row">
            <div class="form-group col-md-6">
                <x-adminlte-button label="Guardar cambios" theme="success" icon="fas fa-save" type="submit" />
            </div>
        </div>


</form>
@stop