<h2>Articles</h2>
<? foreach($this->articles as $article): ?>

<article>
    <h3>
        <?php if ($article->get_category()): ?>
            <?= $article->get_category()->get_title();?>:
        <?php endif; ?>
        <a href="<?= $article->get_permalink(); ?>"><?= $article->get_title(); ?></a>
    </h3>
    <p><?= $article->get_body(); ?></p>
    <cite>By: <?= $article->get_body(); ?> at <?= $article->get_time_publish();?></cite>
</article>

<? endforeach; ?>