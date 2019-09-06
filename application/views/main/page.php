<?php

use application\models\Main;

$this->title = 'Статьи';

?>
	<div class="blog_post">
		<?php foreach ($articles as $val): ?>
							<h2 class="blog-post-title"><a href="/articles/<?php echo $val['id_article']; ?>"><?php echo $val['title']; ?></a></h2>
							<p class="blog-post-meta"><?php echo htmlspecialchars($val['date'], ENT_QUOTES); ?>  /  
								<?php echo htmlspecialchars($val['tag']); ?>
							</p>
							<div class="cope_text line-clamp">
     						<p><?php echo htmlspecialchars($val['text'], ENT_QUOTES); ?></p>
							</div>
							<br>
							<a class="btn btn-primary" href="/articles/<?php echo $val['id_article']; ?>">Читать далее</a>
							<hr>
		<?php endforeach; ?>


	</div>



