<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <table border="1">
            <tr>
                <th>Name</th>
                <th>email</th>
            </tr>
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>

            </tr>
            <a href="logout">logout</a>
        </table>
    </div>
</body>
</html>
