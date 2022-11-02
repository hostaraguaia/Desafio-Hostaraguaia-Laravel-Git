<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório</title>
    <style>
        body{
            font-family: sans-serif;
            font-size: 12px;
        }
        table, td{
            border: 1px solid #555555;
        }
    </style>
</head>
<body>
<h1>Relatório</h1>
<table border="1" width="100%" cellpadding="4" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Matricula</th>
            <th>Telefone</th>
            <th>E-mail</th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nome}}</td>
            <td>{{$item->cpf}}</td>
            <td>{{$item->matricula}}</td>
            <td>{{$item->telefone}}</td>
            <td>{{$item->email}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
