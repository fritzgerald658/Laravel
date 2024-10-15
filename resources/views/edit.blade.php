<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit User</h1>
    <div>
        @if(session()->has('success'))
            <p>{{session('success')}}</p>
        @endif
    </div>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('person.update',['user' => $user])}}" method="post">
        @csrf
        @method('PUT')
        <input name="first_name"  type="text" placeholder="First Name" value="{{$user->first_name}}">
        <input name="last_name" type="text" placeholder="Last Name" value="{{$user->last_name}}">
        <input name="email_address" type="email" placeholder="Email Address" value="{{$user->email_address}}">
        <input name="age" type="number" placeholder="Age" value="{{$user->age}}">
        <button type="submit">Submit</button>
    </form>
</body>
</html>