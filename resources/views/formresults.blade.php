<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <table border="1">
       @foreach ($datas as $data)
           <tr>
               <th>{{ $data->food_category }}</th>
           </tr>
           <tr>
               <td>{{ $data->food_name }}</td>
           </tr>
       @endforeach
   </table>
</body>
</html>