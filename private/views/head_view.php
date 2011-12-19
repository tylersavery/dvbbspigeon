<!DOCTYPE HTML>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title><?= $this->title; ?></title>
    <? if ($this->meta): ?>
        <!-- include meta tags -->
        <? foreach ($this->meta as $meta): ?>
            <? echo '<meta ' . $meta . '/>' . "\n"; ?>
        <? endforeach; ?>
    <? endif; ?>
    <link rel="apple-touch-icon" href="/iphone.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="/iphone72.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/iphone114.png"/>
    <meta http-equiv="PRAGMA" content="NO-CACHE" />
    
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