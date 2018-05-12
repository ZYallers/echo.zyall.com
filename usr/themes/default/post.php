<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
        <ul class="post-meta">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y.m.d H:i'); ?></time></li>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
            <li><?php $this->views() ?>次阅读</li>
        </ul>
        <div id="postContent" class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
        <p>
           <div>
             <div style="display: inline-block;line-height: 1.5;vertical-align: top;">
               <?php Like_Plugin::theLike(); ?>&nbsp;&nbsp;分享:
             </div>
             <ul style="margin-left: 5px;list-style: none;display: inline;margin: 0;padding: 0;">
               <li style="display: inline-block;margin-right: 5px;">
                    <a href="#" onclick="javascript:bShare.share( event, 'weixin', 0 );return false;" title="分享到微信">
                    <img style="height:20px;padding:0" src="http://static.bshare.cn/frame/images/logos/s4/weixin.gif"/></a>
               </li>
               <li style="display: inline-block;margin-right: 5px;">
                    <a href="#" onclick="javascript:bShare.share( event, 'qzone', 0 );return false;" title="分享到QQ空间">
                     <img style="height:20px;padding:0" src="http://static.bshare.cn/frame/images/logos/s4/qzone.gif"/></a>
                </li>
                <li style="display: inline-block;margin-right: 5px;">
                  <a href="#" onclick="javascript:bShare.share( event, 'sinaminiblog', 0 );return false;" title="分享到新浪微博">
                    <img style="height:20px;padding:0" src="http://static.bshare.cn/frame/images/logos/s4/sinaminiblog.gif"/></a>
                </li>
                <li style="display: inline-block;margin-right: 5px;">
                  <a href="#" onclick="javascript:bShare.share( event, 'qqmb', 0 );return false;" title="分享到腾讯微博">
                    <img style="height:20px;padding:0" src="http://static.bshare.cn/frame/images/logos/s4/qqmb.gif"/></a>
                </li>
                <li style="display: inline-block;margin-right: 5px;">
                    <a href="#" onclick="javascript:bShare.share( event, 'qqim', 0 );return false;" title="分享给QQ好友">
                    <img style="height:20px;padding:0" src="http://static.bshare.cn/frame/images/logos/s4/qqim.gif"/></a>
                </li>
                <li style="display: inline-block;margin-right: 5px;">
                    <a href="#" onclick="javascript:bShare.share( event, 'baiduhi', 0 );return false;" title="分享到百度空间">
                    <img style="height:20px;padding:0" src="http://static.bshare.cn/frame/images/logos/s4/baiduhi.gif"/></a>
                </li>
                <li style="display: inline-block;margin-right: 5px;">
                    <a href="#" onclick="javascript:bShare.share( event, 'renren', 0 );return false;" title="分享到人人网">
                    <img style="height:20px;padding:0" src="http://static.bshare.cn/frame/images/logos/s4/renren.gif"/></a>
                </li>
             </ul>
           </div>
        </p>
        <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=a2303e02-e88e-4035-9280-73d2b69f582e&style=-1"></script>
        <script type="text/javascript">
            window.setTimeout(function(){
               bShare.addEntry( {
                 title: "<?php $this->title() ?> - echo zyall",
                 url: location.href,
                 summary: document.getElementById('postContent').innerText,
                 pic: 'http://echo.zyall.com/logo.png'
               } );
            },1000);
        </script>
    </article>

    <?php $this->need('comments.php'); ?>

    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>