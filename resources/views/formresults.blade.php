@extends('apphome')

@section('title', 'Form Results')
@section('content')
   <table class="table table-bordered border-dark" style="width: 60%; margin: 0 auto">
        <thead class="text-center">
            <th>Categories</th>
            <th>Foods</th>
        </thead>
       @foreach($keys as $category => $dataCategories)
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
@endsection