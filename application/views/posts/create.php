<h2><?= $title ?></h2>

<?= form_open_multipart('posts/create'); ?>
  <fieldset>
    <div class="form-group <?= (form_error('title')) ? 'has-danger' : '' ?>">
      <label class="form-control-label">Title</label>
      <input type="text" class="form-control <?= (form_error('title')) ? 'is-invalid' : '' ?>" name="title"  value="<?= set_value('title') ?>">
      <?php if(form_error('title')): ?>
        <div class="invalid-feedback"><?= form_error('title') ?></div>
      <?php endif; ?>
    </div>
    <div class="form-group <?= (form_error('body')) ? 'has-danger' : ''?>">
      <label class="form-control-label">Body</label>
      <textarea id="editor1" class="form-control <?= (form_error('body')) ? 'is-invalid' : '' ?>" name="body" placeholder="Add Body"></textarea>
      <?php if(form_error('body')): ?>
        <div class="invalid-feedback"><?= form_error('body') ?></div>
      <?php endif; ?>
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control">
        <?php foreach($categories as $category): ?>
          <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="file">Upload Image</label>
      <input type="file" name="userfile" size=20>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
