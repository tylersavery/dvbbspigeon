<h1>Blog</h1>

<h2>Alex's Posts</h3>
<? foreach($this->posts_alex as $post): ?>

    <h3><?= $post['content']['title'];?></h3>
    <p><?= $post['content']['body']; ?></p>

<? endforeach; ?>