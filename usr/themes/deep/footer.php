<div id="footer">
    <!-- copyright -->
    <div class="container">
        <div class="row remove-bottom">				
            <div class="col-8 columns">
                <h3>Author about</h3>
                <p>我是ZYall，我为自己代盐<br>将来的您，一定会感激现在拼命的自己<br/>Email：zyb_icanplay@163.com</p>
            </div>
            <div class="col-8 columns">
                <h3 class="mobile-hide">Follow me</h3>
                <div id="social-links">
                    <a href="http://weibo.com/3gphonejj" class="sweibo" target="_blank" title="新浪微博">新浪微博</a>
                    <a href="http://t.qq.com/zyb_icanplay" class="qweibo" target="_blank" title="腾讯微博">腾讯微博</a>
                    <a href="javascript:;" class="google" target="_blank" title="墙外的世界">google+</a>
                    <a href="javascript:;" class="github" target="_blank" title="开源精彩">github</a>
                    <a href="mailto:zyb_icanplay@163.com" class="mail" target="_blank" title="发邮件">发邮件</a>
                    <a href="/feed" class="rss" title="RSS订阅">RSS订阅</a>
                </div>						
                <div class="bot-line"></div>
                <p class="copyright">
                    &copy;<?php echo date( "Y" ); ?>&nbsp;<a href="/" title="<?php $this->options->title(); ?>" style="color: #E67708;"><?php $this->options->title(); ?></a>&nbsp;由Typecho强力驱动&nbsp;<a href="http://www.miitbeian.gov.cn/" target="_blank" style="color: #E67708;">粤ICP备15018117号</a>
                </p>
            </div>
        </div>
    </div>
    <!-- /copyright -->
</div>
<a href="#" id="go-top">Top ↑</a>
<?php $this->footer(); ?>
<script src="<?php $this->options->themeUrl( 'js/jquery.min.js' ); ?>"></script>
<script id="config" data-dsshortname="zyall" data-dstheme="<?php echo ($this->options->Duoshuo_theme) ? $this->options->Duoshuo_theme : 'default'?>" src="<?php $this->options->themeUrl( 'js/config.js' ); ?>"></script>
<!--<script src="<?php $this->options->themeUrl( 'js/post.js' ); ?>"></script>-->
<!--<script src="<?php $this->options->themeUrl( 'js/adv.js' ); ?>"></script>-->
</body>
</html>