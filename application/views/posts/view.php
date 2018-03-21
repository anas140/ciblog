<h2><?= $post['title'] ?></h2>
<small class="post-date">Posted On: <?= $post['created_at'] ?></small>
<div class="post-body">
	<?= $post['body'] ?>
</div>

<hr>
<a href="/posts/edit/<?= $post['slug'] ?>" class="btn btn-warning float-left mr-2"> Edit </a>
<?= form_open('/posts/delete/'.$post['id']); ?>
	<input type="submit" value="Delete" class="btn btn-danger">
</form>
