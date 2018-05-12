<div class="details-up">
    <span class="author">
        <i class=" icon-user"></i><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
    </span>
    <?php if ( !$this->is( 'category' ) ): ?><!-- 分类页面category不显示 -->
        <span class="category"><i class="icon-list"></i><?php $this->category( ',' ); ?></span>
    <?php else: ?>
    <?php endif; ?>
    <span class="date"><i class="icon-clock"></i><?php $this->date( 'Y.m.d' ); ?></span>
    <span class="comments-top" itemprop="interactionCount">
        <i class="icon-comment-3"></i><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum( '抢沙发', '1条', '%d条' ); ?></a>
    </span>
    <span><i class="icon-eye"></i><?php Views_Plugin::theViews('',''); ?>次</span>
</div>
<!-- /post details -->