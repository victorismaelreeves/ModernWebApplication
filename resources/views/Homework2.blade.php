<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homework2t</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">

</head>

<body class="bg-gradient-to-tr from-blue-200 to-blue-400 min-h-screen">
<div class="mt-8 relative flex items-top justify-center min-h-screen">

    <table>
        <tr>
            @foreach($variables as $var)
                <th><a href="?sortby={{$order[$var]}}{{$var}}">
                        {{$var}}
                        @if($order[$var] == '')
                        &uarr;
                        @else
                        &darr;
                    @endif
                </th>

            @endforeach
        </tr>
        @foreach($forecast as $day)
        <tr>
            @foreach ($variables as $var)
                <td>{{$day[$var]}}</td>
            @endforeach
        </tr>
        @endforeach
    </table>

</div>
</body>
</html>
