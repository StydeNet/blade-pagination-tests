<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="{{ $cdn }}">
    <title></title>
    <style>
        body {
            padding: 50px;
        }
    </style>
</head>
<body>
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
    </table>
{!! $users->render() !!}
</body>
</html>