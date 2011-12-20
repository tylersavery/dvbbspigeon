<!DOCTYPE HTML>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title><?= $this->title; ?></title>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache" />
    <META HTTP-EQUIV="Expires" CONTENT="-1" />
    <? if ($this->meta): ?>
        <? foreach ($this->meta as $meta): ?>
            <? echo '<meta ' . $meta . '/>' . "\n"; ?>
        <? endforeach; ?>
    <? endif; ?>
    <link rel="apple-touch-icon" href="/iphone.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="/iphone72.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/iphone114.png"/>
    
    
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