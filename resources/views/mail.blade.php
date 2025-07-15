<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        p {
            font-size: 18px;
        }
        ul li {
            font-size: 14px;
        }
        span {
            font-size: 14px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <p>Новый запрос с сайта ppholding.uz</p>
    <ul>
        <li>Имя: <span>{{ $name }}</span></li>
        <br>
        <li>Номер телефона: <span>{{$phone_number}}</span></li>
        <br>
        @if(isset($email))
        <li>Email: <span>{{ $email }}</span></li><br>
        @endif
    </ul>
</body>
</html>
