<?php $this->need( 'header.php' ); ?>
<div class="banner-bar" id="canvasParent">
    <div class="container">
        <div class="col-8 columns">
            <div class="place">
                <a href="<?php $this->options->siteUrl(); ?>"><i class="icon-home"></i></a><i class="icon-angle-circled-right"></i></li>
                <?php if ( $this->is( 'index' ) ): ?><!-- 页面为首页时 -->
                    Latest Post
                <?php elseif ( $this->is( 'post' ) ): ?><!-- 页面为文章单页时 -->
                    <?php $this->category(); ?><i class="icon-angle-circled-right"></i><?php $this->title() ?>
                <?php else: ?><!-- 页面为其他页时 -->
                    <?php $this->archiveTitle( '<i class="icon-angle-circled-right"></i>', '', '' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!--<canvas id="canvas" style="width: 100%; height: 100px; margin-top: -100px;position: absolute;"></canvas>-->
</div>
<div class="container">
    <div class="col-11 columns" id="mainbody" role="main">
        <article class="post type-post">
            <h1 rel="post-title" class="page-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
            <div rel="post-detail" class="entry" itemprop="articleBody">
                <?php $this->content(); ?>
            </div>
        </article>
        <?php $this->need( 'comments.php' ); ?>
    </div><!-- end #main-->
    <?php $this->need( 'sidebar.php' ); ?>
</div>
<?php $this->need( 'footer.php' ); ?>