<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $this->title ?></title>
	<link rel="stylesheet" type="text/css" href="/public/css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="blog-masthead">
		<div class="container">
			<nav class="nav">
				<a class="nav-link active" href="/">Growave</a>
				<a class="nav-link" href="/add">Добавить статью</a>
			</nav>
		</div>
	</div>
		<div class="container">
	
				<div class="row">
	
					<div class="col-sm-8 blog-main">
						<?php echo $content; ?>
					</div><!-- /.blog-main -->

					<div class="col-sm-3 offset-sm-1 blog-sidebar">
						<div class="sidebar-module">
							<h4>Теги</h4>
							<? if($tags) :?>
							<ol class="list-unstyled">
								<? foreach ($tags as $item) :?>
								<li><a class="btn btn-outline-primary" href="/page?id_tag=<?=$item['id_tag']?>"><?=$item['tag']?></a></li><br>
							<? endforeach; ?>
							</ol>
						<? endif; ?>
						</div>
					</div><!-- /.blog-sidebar -->
	
				</div><!-- /.row -->
	
			</div><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="/public/js/jquery.min.js"></script>



<script src="/public/js/form.js"></script>
</html>