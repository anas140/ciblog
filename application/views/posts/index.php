<h2> <?= $title ?> </h2>
<?php foreach($posts as $post): ?>
	<h3><?= $post['title'] ?></h3>
	<small class="post-date">Posted On: <?= $post['created_at'] ?></small>
	<p><?= $post['body'] ?></p>
	<a class="btn btn-outline-info read-more" href="/posts/<?= $post['slug'] ?>">Read More</a>
<?php endforeach; ?>	