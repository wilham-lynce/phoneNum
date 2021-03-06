@extends('master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <table class="table table-striped">
        <thead class="black white-text">
        <tr>
        <th scope="col">inserted number</th>
        <th scope="col">country code</th>
        <th scope="col">E164 format</th>
        <th scope="col">National format</th>
        <th scope="col">International format</th>
        <th scope="col">Network Carrier</th>
        <th></th>
        </tr>
        </thead>
        <tbody>
            <tr @foreach ($info as $x)    >           
            <td>{{ $x->phone }} </td>
            <td>{{ $x->code }}</td>
            <td>{{ $x->eform }}</td>
            <td>{{ $x->national }}</td>
            <td>{{ $x->international }}</td>
            <td>{{ $x->carrier }}</td>
            </tr @endforeach>
        </tbody>
    </table>
</head>
<body>
    
</body>
</html>
@endsection