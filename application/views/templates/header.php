<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CI BLOG</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
	<script src="//cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">ciblog</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor01">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/about">About</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/posts">Posts</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/categories">categories</a>
	      </li>
	    </ul>
	    <ul class="navbar-nav my-2 my-lg-0">
	    	<?php if(!$this->session->userdata('logged_in')): ?>
		    	<li>
		    		<a href="/users/login" class="nav-link">Login</a>
		    	</li>
		    	<li>
		    		<a href="/users/register" class="nav-link">Register</a>
		    	</li>
	    	<?php endif; ?>

	    	<?php if($this->session->userdata('logged_in')): ?>
		    	<li>
		    		<a href="/posts/create" class="nav-link">Create Post</a>
		    	</li>
		    	<li>
		    		<a href="/categories/create" class="nav-link">Create Categories</a>
		    	</li>
		    	<li>
		    		<a href="/users/logout" class="nav-link">Logout</a>
		    	</li>
	    <?php endif; ?>
	    </ul>
	  </div>
	</nav>

	<div class="container">
		<div class="row">
		<div class="col-md-4 offset-4">
				<?php if($this->session->flashdata('user_registered')): ?>
					<div class="alert alert-dismissible alert-success mt-5">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Well done!</strong> 
					  <?= $this->session->flashdata('user_registered') ?> 
					  <a href="users/login" class="alert-link">Login</a>.
					</div>
					<?php endif; ?>

					<?php if($this->session->flashdata('post_created')): ?>
						<div class="alert alert-dismissible alert-success mt-5">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Well done!</strong> <?= $this->session->flashdata('post_created') ?>
						</div>
					<?php endif; ?>

					<?php if($this->session->flashdata('post_updated')): ?>
						<div class="alert alert-dismissible alert-success mt-5">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Well done!</strong> 
						  <?= $this->session->flashdata('post_updated') ?> 
						</div>
					<?php endif; ?>

					<?php if($this->session->flashdata('categogry_created')): ?>
						<div class="alert alert-dismissible alert-success mt-5">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Well done!</strong> 
						  <?= $this->session->flashdata('categogry_created') ?>
						</div>
					<?php endif; ?>

					<?php if($this->session->flashdata('post_deleted')): ?>
						<div class="alert alert-dismissible alert-warning mt-5">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Well done!</strong> 
						  <?= $this->session->flashdata('post_deleted') ?>
						</div>
					<?php endif; ?>

					<?php if($this->session->flashdata('login_failed')): ?>
						<div class="alert alert-dismissible alert-danger mt-5">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Failed!</strong> 
						  <?= $this->session->flashdata('login_failed') ?>
						</div>
					<?php endif; ?>		

					<?php if($this->session->flashdata('user_loggedin')): ?>
						<div class="alert alert-dismissible alert-success mt-5">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Success</strong> 
						  <?= $this->session->flashdata('user_loggedin') ?>
						</div>
					<?php endif; ?>		

					<?php if($this->session->flashdata('logged_out')): ?>
						<div class="alert alert-dismissible alert-warning mt-5">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <?= $this->session->flashdata('logged_out') ?>
						</div>
					<?php endif; ?>		
			</div>
</div>