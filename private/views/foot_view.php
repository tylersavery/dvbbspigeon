<? if ($this->js): ?>
    <? foreach ($this->js as $js): ?>
        <script type="text/javascript" src="<?= $js; ?>">
    <? endforeach; ?>
<? endif; ?>
</body>
</html>