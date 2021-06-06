<!DOCTYPE html>
<html lang="en" x-data="data()">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PCP</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body class="bg-bluegray-800">
        <div id="app">
            <pcp-cp>
                <template v-slot:logo>
                    <x-pcp-logo/>
                </template>
                <template v-slot:page>
                    @yield('page')
                </template>
            </pcp-cp>
        </div>
    </body>
</html>
