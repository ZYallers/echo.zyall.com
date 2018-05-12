<?php
/**
 * 响应式博客模板,最大宽度为1200px,同时支持IE8+，iPad,iPhone,Andriod等移动设备 <br />欢迎与我交流QQ：373345619
 * @package deep's Theme 
 * @author Deep
 * @version 1.0.0
 * @link http://www.deepswd.com
 */
$this->need( 'header.php' );
?>
<div class="slider" style="height: auto;">
    <div class="banner-overlay" id="canvasParent">
        <!--<canvas id="canvas" style="width: 100%; height: 250px;"></canvas>-->
    </div>
    <div class="container">
        <div class="row" style="margin-bottom: 0px;">
            <div class="col-10 columns">
                <div class="hero" style="margin: 0px 0px 20px 0px;height: auto;">
                    <h2>echo . zyall . com</h2>
                    <p>记录传递分享探讨生活中那些实时热门或鲜为人知却与我们生活息息相关的事情。</p>
                    <mark class="mark">记录 • 传递 • 分享 • 探讨</mark>
                </div>
            </div>
            <!--<div class="col-6 columns" id="flash">
                <div class="panel-flash" id="bannerAdv" data-img="<?php $this->options->themeUrl( 'images' ); ?>"></div>
            </div>-->
        </div>
        <ul class="project clearfix" style="padding: 10px 0px;">
           <?php RandomArticleList_Plugin::parse('<li><h3>{category}</h3><p><a href="{permalink}">{title}</a></p></li>'); ?>
        </ul>
    </div>
</div>

<div class="container">
    <div class="col-11 columns" id="mainbody">
        <!--顶部广告BEGIN -->
        <!--<div class="post type-post" id="left-adv" rel="index" style="overflow: hidden;display: none;"></div>-->
        <!-- 顶部层广告END -->
        <!-- 分页列表BEGIN -->
        <?php while ( $this->next() ): ?>
            <!-- article -->
            <div class="post type-post" >
                <!-- post-title -->
                <h2 rel="post-title" class='loading-title' itemprop="name headline">
                   <a itemtype="url" href="<?php $this->permalink();?>" title="<?php $this->title();?>"><?php $this->title();?></a>
                </h2>
                <?php $this->need( '/inc/meta.php' ); ?>
                <!-- post-details --> 
                <div rel="post-detail" class="entry"><?php $this->content( '阅读全文<i class="icon-angle-circled-right"></i>' ); ?></div>		
            </div>
        <?php endwhile; ?>
        <div class="type-post" id="pagination">
            <?php $this->pageNav( '<i class="icon-left-open"></i>', '<i class="icon-right-open"></i>' ); ?>
        </div>
        <!-- 分页列表END -->
    </div>
    <!-- sidbar --> 
    <?php $this->need( 'sidebar.php' ); ?>
</div>
<?php $this->need( 'footer.php' ); ?>