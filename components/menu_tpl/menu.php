<li>
    <a href=" <?= \yii\helpers\Url::to(['category/view',  'id' => $category['id']]) ?>">
        <?= $category['name'] ?>
<!--        --><?php //if( isset($category['childs']) ): ?>
<!--            <span class="badge pull-right">-->
<!--              <i class=""></i>-->
<!--            </span>-->
<!--        --><?php //endif ?>
        <?php if( isset($category['childs']) ): ?>
            <ul>
                <?= $this->getMenuHtml($category['childs']) ?>
            </ul>
        <?php endif ?>
    </a>
</li>

