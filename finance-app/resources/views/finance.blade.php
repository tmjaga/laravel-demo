@extends('welcome')

@if (isset($data))
    @section('finance')
        <x-finance>
            @foreach ($data->results as $row)
                <tr>
                    <td scope="row">{{ date('d-m-Y H:i:s', $row->t / 1000) }}</td>
                    <td>{{ $row->o }}</td>
                    <td>{{ $row->h }}</td>
                    <td>{{ $row->l }}</td>
                    <td>{{ $row->c }}</td>
                    <td>{{ $row->vw }}</td>
                    <td>{{ $row->v }}</td>
                </tr>
            @endforeach
        </x-finance>
    @endsection
@endif

@if (isset($datalib))
    @section('financelib')
        <x-finance>
            @foreach ($datalib as $row)
                <tr>
                    <td scope="row">{{ $row->getDate()->format('d-m-Y H:i:s') }}</td>
                    <td>{{ $row->getOpen() }}</td>
                    <td>{{ $row->getHigh() }}</td>
                    <td>{{ $row->getLow() }}</td>
                    <td>{{ $row->getClose() }}</td>
                    <td>{{ $row->getAdjClose() }}</td>
                    <td>{{ $row->getVolume() }}</td>
                </tr>
            @endforeach
        </x-finance>
    @endsection
@endif
