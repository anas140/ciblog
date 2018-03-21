<h2><?= $title ?></h2>

<?= validation_errors(); ?>

<?= form_open('posts/update'); ?>
  <input type="hidden" name="id" value="<?= $post['id']; ?>">
  <fieldset>
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name="title" value="<?= $post['title'] ?>">
    </div>
    <div class="form-group">
      <label>Body</label>
      <textarea class="form-control" id="editor1" name="body" placeholder="Add Body"><?= $post['body'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
