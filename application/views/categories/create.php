<h2><?= $title ?></h2>

<?=   form_open_multipart('categories/create') ?>
   <div class="form-group <?= (form_error('name')) ? 'has-danger' : '' ?>">
      <label class="form-control-label">Name</label>
      <input type="text" class="form-control <?= (form_error('name')) ? 'is-invalid' : '' ?>" name="name"  value="<?= set_value('name') ?>" placeholder="Enter Name">
      <?php if(form_error('name')): ?>
        <div class="invalid-feedback"><?= form_error('name') ?></div>
      <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>