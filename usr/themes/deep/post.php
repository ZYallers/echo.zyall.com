<?php $this->need( 'header.php' ); ?>
<div class="banner-bar" id="canvasParent">
    <div class="container">
        <div class="col-8 columns">
            <div class="place">
                <a href="<?php $this->options->siteUrl(); ?>"><i class="icon-home"></i></a><i class="icon-angle-circled-right"></i></li>
                <?php if ( $this->is( 'index' ) ): ?><!-- 页面为首页时 -->
                    Latest Post
                <?php elseif ( $this->is( 'post' ) ): ?><!-- 页面为文章单页时 -->
                    <?php $this->category( ',' ); ?>
                <?php else: ?><!-- 页面为其他页时 -->
                    <?php $this->archiveTitle( '<i class=" icon-angle-circled-right"></i>', '', '' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- <canvas id="canvas" style="width: 100%; height: 100px; margin-top: -100px;position: absolute;"></canvas> -->
</div>
<div class="container">
    <div class="col-11 columns" id="mainbody" role="main">
        <div class="post-single type-post">
            <h1 class="article-h1"><?php $this->title() ?></h1>
            <?php $this->need( 'inc/meta.php' ); ?>
            <!--顶部广告BEGIN -->
            <!-- <div id="left-adv" rel="view" style="overflow: hidden;border-bottom: 1px dotted #ccc;padding: 0 0 5px 0;margin-bottom: 10px;display: none;"></div> -->
            <!-- 顶部层广告END -->
            <div class="entry" id="mainContent" style="font: normal 14px Arial,Helvetica,sans-serif,'microsoft yahei';">
                <?php $this->content(); ?>
            </div>
            <div itemprop="keywords" class="tags-meta" style="border-top: 1px dashed #ccc;padding-top: 5px;">
            <i class="mr10 icon-tags" style="font-size: 1.3em;vertical-align: middle;"></i>
            <?php $this->tags( '', true, '没贴标签' ); ?></div>
            <!-- <div><img src="<?php $this->options->themeUrl( 'images/mengji.gif' ); ?>" style="height: 40px;"></div> -->
            <div style="display: inline-block;float: left; font-size: 1.4em;margin-right: 3px;"><i class="mr10 icon-share"></i></div>
            <div style="padding-top: 4px;" class="bdsharebuttonbox">
              <a href="#" style='margin-top: 0px;' class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
              <a href="#" style='margin-top: 0px;' class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
              <a href="#" style='margin-top: 0px;' class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
              <a href="#" style='margin-top: 0px;' class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
              <a href="#" style='margin-top: 0px;' class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
              <a href="#" style='margin-top: 0px;' class="bds_more" data-cmd="more"></a>
            </div>
            <ul class="pagetion clearfix" style="clear: both;margin-top: 0px;">
                <li style="width: auto; float: left;"><i class=" icon-left-open"></i></li>
                <li class="nav-prev"></i><?php $this->thePrev( '%s', '没有了' ); ?></li>
                <li style="width: auto; float: right;"><i class=" icon-right-open"></i></li>
                <li class="nav-next" style="float: right;"><?php $this->theNext( '%s', '没有了' ); ?></li>     
            </ul>
            <div id="random_article_list">
              <div class="widget widget-recent-entries">
                  <h3 class="widget-title">阅读推荐</h3>
                  <ul class="widget-list overhide">
                      <?php RandomArticleList_Plugin::parse(); ?>
                  </ul>
              </div>
            </div>
            <!-- 底部广告BEGIN -->
            <!-- <div style="width: 100%;margin: 0 auto;"> 
              <a href="http://iqiang.uz.taobao.com/market.php?spm=2013.1.0.0.jfQIas&id=199099" target="_blank" data-spm-anchor-id="2013.1.0.0">
                <img src="http://gd1.alicdn.com/imgextra/T2phSMXzhXXXXXXXXX-729596062.gif?v=1">
              </a>
            </div> -->
            <!-- 底部广告END -->
        </div>
        <?php $this->need( 'comments.php' ); ?>
    </div>
    <?php $this->need( 'sidebar.php' ); ?>
</div>
<?php $this->need( 'footer.php' ); ?>