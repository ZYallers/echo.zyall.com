<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    &copy; <?php echo date('Y'); ?>,&nbsp;<a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.&nbsp;<span id="nowtime"></span>.
</footer><!-- end #footer -->
<?php $this->footer(); ?>
<script type="text/javascript">
    <!--
    var getNowTime = function() {
        var now = new Date(), year = now.getFullYear(), month = now.getMonth() + 1, 
            day = now.getDate(), hour = now.getHours(), minute = now.getMinutes();
        document.getElementById( 'nowtime' ).innerHTML = year + '.' + month + '.' + day + ' ' + hour + ":" + minute;
    };
    getNowTime();
    window.setInterval( getNowTime(), 60000 );
    //-->
</script>
</body>
</html>