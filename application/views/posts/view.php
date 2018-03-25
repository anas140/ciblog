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
<hr>
   <?php if($comments): ?>
      <h3>Comments</h3>
      <?php foreach($comments as $comment): ?>
        <div class="card border-primary mb-3" style="max-width: 20rem;">
           <!-- <div class="card-header">Comment</div> -->
           <div class="card-body">
             <h4 class="card-title"><strong>By </strong><?= $comment['name'] ?></h4>
             <p class="card-text"><?= $comment['body'] ?></p>
           </div>
         </div>
      <?php endforeach; ?>
   <?php else: ?>
      <p>No Comments</p>
   <?php endif; ?>
<hr>
<!-- Comment Section -->
<h3>Add Comment</h3>
<?= validation_errors(); ?>
<form action="/comments/create/<?= $post['id'] ?>" method="post">
   <div class="form-group">
      <label for="Name">Name</label>
      <input type="text" name="name" class="form-control">
   </div>
   <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" class="form-control">
   </div>
   <div class="form-group">
      <label for="body">Body</label>
      <textarea name="body" class="form-control"></textarea>
   </div>
   <input type="hidden" name="slug" value="<?= $post['slug'] ?>">
   <button type="submit" class="btn btn-primary">Submit</button>
</form>
