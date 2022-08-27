
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link href="/painel/css/bootstrap.min.css" rel="stylesheet">
    <link href="/painel/css/icon.css" rel="stylesheet">
    <link href="/painel/css/animsition.min.css" rel="stylesheet">
    <link href="/painel/css/app.css" rel="stylesheet">
</head>

<body class="bg-dark">
@yield('content')


<script src="/painel/js/libs/jquery-1.11.3.min.js"></script>
<!-- Bootstrap -->
<script src="/painel/js/libs/bootstrap.min.js"></script>
<!-- Modernizr -->
<script src="/painel/js/libs/modernizr.min.js"></script>
<!-- Slim Scroll -->
<script src="/painel/js/libs/jquery.slimscroll.min.js"></script>
<!-- Animsition -->
<script src="/painel/js/libs/jquery.animsition.min.js"></script>

<script>
    $(function()  {
        $(".animsition").animsition({

            inClass               :   'zoom-in-sm',
            outClass              :   'zoom-out-sm',
            inDuration            :    1500,
            outDuration           :    800,
            linkElement           :   '.animsition-link',
            // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
            loading               :    true,
            loadingParentElement  :   'body', //animsition wrapper element
            loadingClass          :   'animsition-loading',
            unSupportCss          : [ 'animation-duration',
                '-webkit-animation-duration',
                '-o-animation-duration'
            ],
            overlay               :   false,

            overlayClass          :   'animsition-overlay-slide',
            overlayParentElement  :   'body'
        });
    });
</script>
</body>
</html>