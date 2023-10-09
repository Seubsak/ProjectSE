<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>   
    <table border>
    @foreach ($roles as $role)
        <tr>
            <td>{{ $role['type'] }}</td>
            <td> @foreach ($role['name'] as $name)
                        {{ $name }}<br>
                    @endforeach</td>
        </tr>
        
        @endforeach
    </table>
</body>

</html>