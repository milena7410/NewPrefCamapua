<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="">
    <meta name="author" content="">

    {!! Html::style('painel/css/bootstrap.min.css') !!}
    {!! Html::style('painel/css/icon.css') !!}
    {!! Html::style('painel/css/font-awesome.min.css') !!}
    {!! Html::style('painel/css/animate.min.css') !!}
    {!! Html::style('painel/css/animsition.min.css') !!}
    {!! Html::style('painel/css/app.css') !!}

    @yield('additional_stylesheet')
</head>

<body>
<div class="wrapper animsition has-footer">

    @include('admin.elements.header')
    @include('admin.elements.sidebar')

   @yield('content')

    <footer class="footer">
        &copy; 2018. <b> Admin </b> <b>v{{ env('VERSION') }}</b>
    </footer>
</div>

{!! Html::script('painel/js/libs/jquery-1.11.3.min.js') !!}
{!! Html::script('painel/js/libs/bootstrap.min.js') !!}
{!! Html::script('painel/js/libs/modernizr.min.js') !!}
{!! Html::script('painel/js/libs/jquery.slimscroll.min.js') !!}
{!! Html::script('painel/js/libs/jquery.animsition.min.js') !!}
{!! Html::script('painel/js/jquery.blockUI.js') !!}
{!! Html::script('painel/js/functions.js') !!}
{!! Html::script('painel/js/app.min.js') !!}


<script>
    $(function()  {
        $(".wrapper").hasClass("animsition") && $(".animsition").animsition({
            inClass: "fade-in",
            outClass: "fade-out",
            inDuration: 1500,
            outDuration: 800,
            linkElement: ".animsition-link",
            loading: !0,
            loadingParentElement: "body",
            loadingClass: "animsition-loading",
            unSupportCss: ["animation-duration", "-webkit-animation-duration", "-o-animation-duration"],
            overlay: !1,
            overlayClass: "animsition-overlay-slide",
            overlayParentElement: "body"
        });
    });
</script>

@yield('additional_scripts')
</body>
</html>
