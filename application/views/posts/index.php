<h2> <?= $title ?> </h2>
<?php foreach($posts as $post): ?>
	<h3><?= $post['title'] ?></h3>
	<div class="row">
		<div class="col-md-3">
			<img src="assets/images/posts/<?= $post['image'] ?>" alt="">
		</div>
		<div class="col-md-9">
			<small class="post-date">
			Posted On: <?= $post['created_at'] ?> in
			<strong><?= $post['name'] ?></strong>		
			</small>
			<p><?= word_limiter($post['body'], 50) ?></p>
			<a class="btn btn-outline-info read-more" href="/posts/<?= $post['slug'] ?>">Read More</a>
		</div>
	</div>
<?php endforeach; ?>	