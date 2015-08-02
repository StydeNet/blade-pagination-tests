<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <!-- Compiled and minified CSS -->
    <title>Blade pagination with the {{ $theme }} theme</title>
    <style>
        body {
            padding: 50px;
        }
    </style>
</head>
<body>
    <table class="table uk-table uk-table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $users->render() !!}

    <link rel="stylesheet" href="{{ $cdn }}">
</body>
</html>