<h2 class="text-center"><?= $title ?></h2>
<?= validation_errors(); ?>
<div class="row mb-5">
   <div class="col-md-4 offset-4">
         <form action="/users/register" method="post">
         <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
         </div>
         <div class="form-group">
            <label>Zipcode</label>
            <input type="text" name="zipcode" class="form-control">
         </div>
         <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
         </div>
         <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
         </div>
         <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
         </div>
         <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control">
         </div>
         <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </form>
   </div>
</div>
