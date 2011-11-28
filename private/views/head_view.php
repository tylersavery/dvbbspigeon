<!DOCTYPE HTML>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title><?= $this->title; ?></title>
    <meta http-equiv="imagetoolbar" content="false" />
    <meta name="description" content="A daily digital briefing on the life of Toronto, covering urban affairs, business, technology, culture and design.">
    <meta name="author" content="Toronto Standard Media Company Limited">
    <? if ($this->meta): ?>
        <!-- include meta tags -->
        <? foreach ($this->meta as $meta): ?>
            <? echo '<meta ' . $meta . '/>' . "\n"; ?>
        <? endforeach; ?>
    <? endif; ?>
    
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
    <link rel="alternate" type="application/rss+xml" href="/feed/RSS1.0" title="Toronto Standard RSS1.0 Feed">
    <link rel="alternate" type="application/rss+xml" href="/feed/RSS2.0" title="Toronto Standard RSS2.0 Feed">
    <link rel="alternate" type="application/atom+xml" href="/feed/ATOM1.0" title="Toronto Standard ATOM1.0 Feed">
    <script type="text/javascript" src="http://use.typekit.com/hgj5umb.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-22634579-1']);
        _gaq.push(['_trackPageview']);
        
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <!-- Begin comScore Tag -->
    <script>
        var _comscore = _comscore || [];
        _comscore.push({ c1: "2", c2: "10008975" });
        (function() {
          var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
          s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
          el.parentNode.insertBefore(s, el);
         })();
    </script>
    <noscript>
        <img src="http://b.scorecardresearch.com/p?c1=2&c2=10008975&cv=2.0&cj=1" />
    </noscript>
    <!-- End comScore Tag -->
</head>
<body>