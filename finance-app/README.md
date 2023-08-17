# Laravel Demo project
A simple Laravel project which request and display finance information from Yahoo Money



### Features
- Display information using [polygon.io](https://polygon.io/) external service and Vue.js Finance component
- Display information using [polygon.io](https://polygon.io/) external service and internal Laravel HTTP Client. More information on https://polygon.io/docs/stocks/getting-started
- Display information using external [yahoo-finance-api](https://github.com/scheb/yahoo-finance-api) library from GitHub

### How to use

#### Display information with Vue.js Finance component
Inside any application Blade template place а empty **div** tag with attribute **id="app"**. Example
```
<!-- Some HTML -->

<div id="app"></div>

<!-- Some HTML -->
```
#### Display information with Laravel Blade template component
1. Inside any application Blade template define the place where information will be displayed with Blade directive:<br>
   **@yield('finance')** - to get information with internal Laravel HTTP Client and polygon.io service<br>
   or<br>
   **@yield('financelib')** - to get information with yahoo-finance-api library from GitHub
2. Inside Blade template place the following Blade directives:<br>
To use internal Laravel HTTP Client and [polygon.io](https://polygon.io/) service:
   
```
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
```
To use yahoo-finance-api library from GitHub
```
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
```
## Author
[Anatoly](https://github.com/tmjaga/laravel-demo)

