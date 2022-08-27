<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Prefeitura de Camapuã</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('libs/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('css/style.min.css') !!}
    @stack('styles')
</head>
<body>
<div class="wrapper">
    @include('elements.header')
    @yield('content')
    @include('elements.footer')
</div>
@stack('javascript')
{!! Html::script('libs/jquery/dist/jquery.min.js') !!}
{!! Html::script('libs/bootstrap/dist/js/bootstrap.min.js') !!}

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a8a3960a6befb13"></script>
<script>
    $(document).ready(function () {
        $('.topo-bg').css('background', "url({{$background}})");
    });
</script>
</body>
</html>