<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Users DATA</h1>
    <div>
        @if(session()->has('success'))
            <p>{{session('success')}}</p>
        @endif
    </div>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Age</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email_address}}</td>
                    <td>{{$user->age}}</td>
                    <td>
                        <a href="{{route('person.edit', ['user' => $user])}}">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('person.delete', ['user' => $user])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>                
            @endforeach
        </tbody>
    </table>
</body>
</html>