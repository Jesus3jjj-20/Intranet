<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado planes</title>

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
        <td><h2>LISTADO PLANES</h2></td>
    </tr>
<table>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
    @foreach($planes as $plan)
        <tr>
            <td>{{$plan->id}}</td>
            <td>{{$plan->nombre}}</td>
        </tr>
   @endforeach

    </tbody>
</table>

</body>
</html>