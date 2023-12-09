@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1>Eventos creados</h1>
    @if(session('success'))<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <div class="alert alert-success w-50 mx-auto fw-bolder text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            {{ session('success') }}
        </div>
        @endif
@stop

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('plugins.BsCustomFileInput', true)
@section('plugins.TempusDominusBs4', true)

@section('content')
    <p>
        @php
        $heads = [
            'ID',
            'Nombre del evento',
            'Lugar',
            'Fecha y hora',
            'Descripción',
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];

        $config = [
            'data' => $eventos->map(function ($evento) {
                return [
    $evento->id,
    $evento->nombre,
    $evento->lugar,
    $evento->fecha_hora,
    $evento->descripcion,
    '<nobr>
        <a href="'.route('VerEventoSolo', $evento->id).'" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
            <i class="fa fa-lg fa-fw fa-pen"></i>
        </a>
        <form method="POST" action="'.route('BorrarEvento', $evento->id).'" 
         style="display: inline;">
            '.csrf_field().'
            '.method_field('DELETE').'
            <button type="submit"  class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                <i class="fa fa-lg fa-fw fa-trash"></i>
            </button>
        </form>

    </nobr>'
];
            }),
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, null, null, ['orderable' => false]],
        ];
        @endphp
        {{-- Minimal example / fill data using the component slot --}}
        <x-adminlte-datatable id="table1" :heads="$heads">
            @foreach($config['data'] as $row)
                <tr>
                    @foreach($row as $cell)
                        <td>{!! $cell !!}</td>
                    @endforeach
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </p>
@stop
