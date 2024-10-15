<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create User</h1>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('person.store')}}" method="post">
        @csrf
        @method('post')
        <input name="first_name"  type="text" placeholder="First Name">
        <input name="last_name" type="text" placeholder="Last Name">
        <input name="email_address" type="email" placeholder="Email Address">
        <input name="age" type="number" placeholder="Age">
        <button type="submit">Submit</button>
    </form>
</body>
</html>