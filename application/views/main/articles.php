<?php

use application\models\Main;

$this->title = $data->title;
?>
<div class="blog-post">
        <h2 class="blog-post-title"><?= $data->title ?></h2>
            <p class="blog-post-meta"><?= $data->date ?>  /  
            <?= $data->tag ?> <hr>
            </p>
                            <div class="cope_text">
                            <p><?= $data->text ?></p>
                            </div>
                            <br>
  
                        <div class="clearfix">
                </div>
        </div>
