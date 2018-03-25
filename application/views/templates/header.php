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
	    	<li>
	    		<a href="/posts/create" class="nav-link">Create Post</a>
	    	</li>
	    	<li>
	    		<a href="/categories/create" class="nav-link">Create Categories</a>
	    	</li>
	    </ul>
	  </div>
	</nav>

	<div class="container">
	
