<?php $this->need('header.php'); ?>
<div class="banner-bar" id="canvasParent">
   <div class="container">
      <div class="col-8 columns">
         <div class="place">
             <a href="<?php $this->options->siteUrl(); ?>"><i class="icon-home"></i></a><i class=" icon-angle-circled-right"></i></li>
                <?php if ($this->is('index')): ?><!-- 页面为首页时 -->
                   Latest Post
                <?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
                   <?php $this->category(); ?><i class="icon-angle-circled-right"></i><?php $this->title() ?>
                   <?php else: ?><!-- 页面为其他页时 -->
                      <?php $this->archiveTitle('<i class="icon-angle-circled-right"></i>','',''); ?>
                   <?php endif; ?>
                </div>
            </div>
        </div>
        <canvas id="canvas" style="width: 100%; height: 100px; margin-top: -100px;position: absolute;"></canvas>
</div>

<div class="container">
    <div class="col-11 columns" id="mainbody" role="main">
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
            <div class="post type-post">
    		<h2 rel="post-title" class="loading-title"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
    		<?php $this->need('/inc/meta.php'); ?>               
                <div rel="post-detail" class="entry">
        	   <?php $this->content('阅读全文&raquo;'); ?>
                </div>
    	   </div>
    	<?php endwhile; ?>
        <?php else: ?>
            <div class="post type-post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </div>
        <?php endif; ?>
    <div class="type-post" id="pagination">
        <?php $this->pageNav('<i class="icon-left-open"></i>', '<i class="icon-right-open"></i>'); ?>
    </div>
</div><!-- end #main -->
<?php $this->need('sidebar.php'); ?>
</div>
<?php $this->need('footer.php'); ?>