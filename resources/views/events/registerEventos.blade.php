@extends('adminlte::page')

@section('title', 'Crear Evento')

@section('content_header')
    <h1>Registrar eventos</h1>

  
@stop

@section('plugins.BsCustomFileInput', true)
@section('plugins.TempusDominusBs4', true)

@section('content')
    <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre del evento" placeholder="Ej. Evento de futbol"
                    fgroup-class="col-md-6" disable-feedback />
            </div>
            <div class="row">
                <x-adminlte-input name="lugar" label="Lugar del evento" placeholder="Ej. Campo del centro"
                    fgroup-class="col-md-6" disable-feedback />
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    @php
                    $config = ['format' => 'DD/MM/YYYY HH:mm'];
                    @endphp
                    <x-adminlte-input-date name="fecha_hora" :config="$config" placeholder="Escoger fecha..."
                        label="Fecha y hora">
                        <x-slot name="appendSlot">
                            <x-adminlte-button icon="fas fa-calendar-alt" title="Set to Events" />
                        </x-slot>
                    </x-adminlte-input-date>
                </div>
            </div>
            <div class="row">
                <x-adminlte-textarea name="descripcion" label="Descripcion" rows=5 fgroup-class="col-md-6"
                    placeholder="Insertar descripcion...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-lg fa-file-alt "></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>
            </div>

            <div class="row">
                <x-adminlte-input-file name="imagen" label="Subir imagen" placeholder="Escoge un archivo"
                    fgroup-class="col-md-6" disable-feedback accept="image/*" />
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <x-adminlte-button label="Registrar" theme="primary" icon="fas fa-save" type="submit" />
                </div>
            </div>
        </p>
    </form>
@stop
