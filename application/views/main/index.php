<?php

use application\models\Main;

$this->title = 'Главная страница';

?>
<div class="blog-post">
	
	<?php if (empty($list)):?>
                <p>Список статей пуст</p>
            <?php else: ?>
                <?php foreach ($list as $val): ?>
							<h2 class="blog-post-title"><a href="articles/<?php echo $val['id']; ?>"><?php echo $val['title']; ?></a></h2>
							<p class="blog-post-meta"><?php echo htmlspecialchars($val['date'], ENT_QUOTES); ?>  /  <?php echo htmlspecialchars($val['tag']); ?>
							</p>
							<div class="cope_text line-clamp">
     						<p><?php echo htmlspecialchars($val['text'], ENT_QUOTES); ?></p>
							</div>
							<br>
							<a class="btn btn-primary" href="articles/<?php echo $val['id']; ?>">Читать далее</a>
							<hr>
							<?php endforeach; ?>
						<div class="clearfix">
							
                </div>
            <?php endif; ?>
		</div>