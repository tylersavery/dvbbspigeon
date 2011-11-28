<h1>Blog</h1>

<div class="posts_alex">
<? foreach($this->posts_html as $post_template): ?>

<?= $post_template; ?>

<hr />
<? endforeach; ?>

</div>