<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado clientes</title>

    <style>

        table{
            margin-top: 40px;
            width: 100%;
            text-align:center;
        }
        thead{
            background-color: #90bc41;
            color: white;
        }

        td{

            padding: 10px;
            border-bottom: 1px solid #343a40;
        }
    </style>
</head>
<body>


<table>
    <tr>
        <td><h2>LISTADO CLIENTES</h2></td>
    </tr>
<table>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->email}}</td>
        </tr>
   @endforeach

    </tbody>
</table>

</body>
</html>