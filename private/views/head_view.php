<!DOCTYPE HTML>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title><?= $this->title; ?></title>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache" />
    <META HTTP-EQUIV="Expires" CONTENT="-1" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <? if ($this->meta): ?>
        <? foreach ($this->meta as $meta): ?>
            <? echo '<meta ' . $meta . '/>' . "\n"; ?>
        <? endforeach; ?>
    <? endif; ?>
    <link rel="apple-touch-icon" href="/iphone.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="/iphone72.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/iphone114.png"/>
    
    <meta property="og:title" content="DVBBS" />
    <meta property="og:description" content="DVBBS" />
    <meta property="og:image" content="http://www.dvbbs.com/images/dvbbsfacebook.jpg" />
    
    
    <? if ($this->css): ?>
        <!-- include css -->
        <? foreach ($this->css as $css): ?>
            <link rel="stylesheet" type="text/css" href="<?= $css; ?>" />
        <? endforeach; ?>
    <? endif; ?>
    
    <? if ($this->js): ?>
        <!-- include js -->
        <? foreach ($this->js as $js): ?>
            <script type="text/javascript" src="<?= $js; ?>"></script>
        <? endforeach; ?>
    <? endif; ?>
    
</head>
<body>