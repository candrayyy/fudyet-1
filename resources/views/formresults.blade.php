@extends('apphome')

@section('title', 'Form Results')
@section('content')
        
       
<div class="container table-responsive form-results mt-5">

        <div class="row">
            <div class="col-sm-6 mb-3 text-center">
                <a href="{{route('form')}}"><button class="btn-recommend-again">Recommend again <i class="bi bi-arrow-repeat"></i></button></a>
            </div>
            <div class="col-sm-6 mb-2 text-center">
                <button class="btn-download-pdf" onclick="print()">Download as PDF <i class="bi bi-download"></i></button>
            </div>
        </div>

            <table class="table container-fluid table-form-result mt-3" id="table-print">
                <thead class="text-center"> 
                    <th>Categories</th>
                    <th>Foods</th>
                </thead>
            @foreach($attrs as $category => $dataCategories)
                <tbody>
                    <td style="vertical-align: middle; font-weight: bold" class="text-center bg-white text-dark">{{ $category }}</td>
                    <td style="vertical-align: middle" class="bg-white text-dark">
                        @foreach($dataCategories as $index => $value)
                            @if( count( $dataCategories ) != $index + 1 )
                                {{ $value }},
                            @else
                                {{ $value }}
                            @endif
                        @endforeach
                    </td>
                </tbody>
            @endforeach
            </table>

</div>

    <div class="loader" id="loader">
        <img class="img-loader d-block" src="{{ asset('/gif/magic-loader.gif') }}">
    </div>

    <script src="{{ asset('/js/loader.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <script src="{{asset('/js/print.js')}}"></script>
@endsection