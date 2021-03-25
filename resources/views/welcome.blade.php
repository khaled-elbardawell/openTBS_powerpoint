<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    </head>
    <body>
    <div class="container">

        <form method="get" action="{{url('/export')}}" class="mt-5">
            @csrf
            <input class="btn btn-primary" type="submit" value="Export pptx file">
        </form>

        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">age</th>
                <th scope="col">company</th>
            </tr>
            </thead>
            <tbody>
            @foreach($emps as $emp)

                <tr>
                <th scope="row">{{$emp->id}}</th>
                <td>{{$emp->name}}</td>
                <td>{{$emp->age}}</td>
                <td>{{$emp->company}}</td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    </body>
</html>
