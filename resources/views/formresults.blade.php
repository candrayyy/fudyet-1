<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Form Results</title>
</head>
<body>
    <section class="form-results mt-5 mb-5 table-responsive">
        <div class="text-center mt-4 mb-5">
            <button onclick="print()">Download as PDF</button>
        </div>

        <table class="table table-form-result mt-3" id="table-print">
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
    </section>

    <div class="loader" id="loader">
        <img class="img-loader" src="{{ asset('/gif/magic-loader.gif') }}">
    </div>

    <script src="{{ asset('/js/loader.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    <script>
        const print = () => {
             var element = document.getElementById("table-print")

             var opt = {
                filename:     'foods-recommendation-by-fudyet.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
             };      

             return html2pdf(element, opt)
        }
    </script>
</body>
</html>