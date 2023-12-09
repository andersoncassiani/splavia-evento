@extends('adminlte::page')

@section('title', 'Editar Evento')

@section('content_header')
    <h1>Editar Evento</h1>
@stop

@section('plugins.BsCustomFileInput', true)
@section('plugins.TempusDominusBs4', true)

@section('content')
    <form action="{{ route('ActualizacionEvento') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <x-adminlte-input name="nombre" label="Nombre del evento" placeholder="Ej. Evento de futbol"
                fgroup-class="col-md-6 "  value="{{ $evento->nombre }}" />
        </div>
        <div class="row">
            <x-adminlte-input name="id"  placeholder="Ej. Evento de futbol"
                fgroup-class="col-md-6 hide" style="display: none" value="{{ $evento->id }}" />
        </div>

        <div class="row">
            <x-adminlte-input name="lugar" label="Lugar del evento" placeholder="Ej. Campo del centro"
                fgroup-class="col-md-6" value="{{ $evento->lugar }}" />
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                @php
                $config = ['format' => 'DD/MM/YYYY HH:mm'];
                @endphp
                <x-adminlte-input-date name="fecha_hora" :config="$config" placeholder="Escoger fecha..."
                    label="Fecha y hora" value="{{ $evento->fecha_hora }}" >
                    <x-slot name="appendSlot">
                        <x-adminlte-button icon="fas fa-calendar-alt" title="Set to Events" />
                    </x-slot>
                </x-adminlte-input-date>
            </div>
        </div>

        <div class="row">
            <x-adminlte-textarea name="descripcion" label="Descripción" rows=5 fgroup-class="col-md-6"
                placeholder="Insertar descripcion...">{{ $evento->descripcion }}</x-adminlte-textarea>
        </div>

        <div class="row">
            {{-- Mostrar la imagen actual del evento (si existe) --}}
            @if($evento->imagen)
                <div class="col-md-6">
                    <img src="{{ asset('/storage/images/' . $evento->imagen) }}" alt="Imagen del evento" width="200">
                </div>
            @endif
        </div>
        
        <div class="row">
            <x-adminlte-input-file name="imagen" label="Subir imagen" placeholder="Escoge un archivo"
                fgroup-class="col-md-6" disable-feedback accept="image/*" />
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <x-adminlte-button label="Guardar cambios" theme="primary" icon="fas fa-save" type="submit" />
            </div>
        </div>

    </form>
@stop