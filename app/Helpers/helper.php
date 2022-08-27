<?php
if (!function_exists('separateItemsByCommas')) {
    function separateItemsByCommas($itens)
    {
        return array_filter(array_map('trim', explode(',', $itens)));
    }
}

if (!function_exists('convertDateBrToUsa')) {
    function convertDateBrToUsa($date)
    {
        $dateBrConvert = str_replace('/', '-', $date);
        $dateUsa = date('Y-m-d', strtotime($dateBrConvert));

        return $dateUsa;
    }
}

if (!function_exists('onlyDateFormatUsaToBr')) {
    function onlyDateFormatUsaToBr($date)
    {
        $dateBr = date('d/m/Y', strtotime($date));

        return $dateBr;
    }
}

if (!function_exists('getExtensionByMimetype')) {
    function getExtensionByMimetype($mime)
    {
        $extensions = array(
            'application/pdf'   => '.pdf',
            'application/zip'   => '.zip',
            'image/gif'         => '.gif',
            'image/jpeg'        => '.jpg',
            'image/png'         => '.png',
            'text/css'          => '.css',
            'text/html'         => '.html',
            'text/javascript'   => '.js',
            'text/plain'        => '.txt',
            'text/xml'          => '.xml',
            'video/x-ms-wmv'    => '.wmv'
        );

        return $extensions[$mime];
    }
}
