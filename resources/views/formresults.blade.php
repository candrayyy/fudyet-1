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
<body style="background-color: #EEEEEE">
    <section class="form-results mt-5 mb-5 table-responsive">
        <table class="table table-bordered border-dark" style="width: 70%; margin: 0 auto">
                <thead class="text-center">
                    <th>Categories</th>
                    <th>Foods</th>
                </thead>
            @foreach($attrs as $category => $dataCategories)
                <tbody>
                    <td style="vertical-align: middle; font-weight: bold" class="text-center">{{ $category }}</td>
                    <td style="vertical-align: middle">
                        @foreach($dataCategories as $index => $value)
                            {{ $loop->first ? '' : '-' }}
                            {{ $value }}
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
</body>
</html>