@extends('adminlte::page')

@section('title', 'Publico Inscrito')

@section('content_header')
    <h1>Ver publico inscrito</h1>
@stop

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('plugins.BsCustomFileInput', true)
@section('plugins.TempusDominusBs4', true)

@section('content')
    <p>
        @php
        $heads = [
            'Nombre del evento',
            'Nombres',
            'Apellidos',
            'Email',
            'Numero',
        ];

        $config = [
            'data' => $formularios->map(function ($formulario) {
                return [
                    $formulario->evento->nombre,
                    $formulario->nombres,
                    $formulario->apellidos,
                    $formulario->email ,
                    $formulario->numero ,
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
