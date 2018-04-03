<form action="/users/login" method="post"> 
   <div class="row">
      <div class="col-md-4 offset-4">
         <h1 class="text-center"><?= $title ?></h1>
         <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus="">
         </div>
         <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required autofocus="">
         </div>
         <button type="submit" class="btn btn-block btn-primary">Sign In</button>
      </div>
   </div>
</form>