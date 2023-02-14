<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../sass/back/app.scss">
    <link rel="stylesheet" href="../../sass/back/_variables.scss">
    <title>pdf</title>
    <script src="../../js/app.js"></script>
    <style>
        img {
            height: 400px;
            width: auto;
        }

    </style>

</head>

<body>

    <ul class="" style='translateX(-50%); margin:1% 0 0 25%; '>

        <li style="list-style: none;" class="list-group-item">From: </li>



        <li style="list-style: none;" class="list-group-item">Hotel: {{$hotels->title}}</li>

        <li style="list-style: none;" class="list-group-item">@if(isset($hotels->picture))Picture of hotel: <img src="{{asset($hotels->picture)}}">@endif</li>


        <li style="list-style: none;" class="list-group-item">Trip length: {{$hotels->trip_length}}</li>

        <li style="list-style: none;" class="list-group-item">Price: {{$hotels->price}} EUR </li>

        <li style="list-style: none;" class="list-group-item"><textarea cols="30" rows="5" readonly>{{$hotels->description}}</textarea></li>

    </ul>


</body>

</html>
