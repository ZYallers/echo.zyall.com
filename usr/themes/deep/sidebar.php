<div class="col-5 columns" id="sidebar" role="complementary">
    <div class="widget widget_search">
    <form action="./" id="searchform" method="get">
        <input type="text" id="searchkey" name="s" value="" class="searchkey" placeholder="Search..."/>
        <button type="submit"  id="searchsubmit">GO</button>
    </form>
    </div>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <div class="widget widget-category">
        <h3>文章分类</h3>
        <ul class="widget-list">
          <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
          <?php while ($category->next()): ?>
              <li
                 <?php if ($this->is('post')): ?>
                    <?php if ($this->category == $category->slug): ?> class="current"<?php endif; ?>
                 <?php else: ?>
                    <?php if ($this->is('category', $category->slug)): ?> class="current"<?php endif; ?>
                 <?php endif; ?>>
                 <a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>">
                   <?php $category->name(); ?><em><?php $category->count(); ?></em>
                 </a>
              </li>
          <?php endwhile; ?>
       </ul>
    </div>
    <?php endif; ?>  

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <div class="widget widget-recent-entries">
	<h3 class="widget-title">最新文章</h3>
        <ul class="widget-list overhide">
            <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}" title="{title}">{title}</a></li>'); ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="widget widget-recent-entries">
    <h3 class="widget-title">热门文章</h3>
        <ul class="widget-list overhide">
            <?php Views_Plugin::theMostViewed(10, false);?>
        </ul>
    </div>
  
    <div class="widget widget-recent-entries">
	<h3 class="widget-title">热评文章</h3>
        <ul class="ds-top-threads overhide" data-range="monthly" data-num-items="10"></ul>
    </div>

    <div class="widget widget-recent-entries">
	<h3 class="widget-title" style="border:none!important; margin-bottom: 0!important;">最新评论</h3>
        <ul class="ds-recent-comments" data-num-items="10" data-show-avatars="1" data-show-time="1" data-show-title="0" data-show-admin="1" data-excerpt-length="16"></ul>
    </div>

    <div class="widget widget-tag">
        <h3>最近访客</h3>
        <div>
            <ul class="ds-recent-visitors"></ul>
        </div>
    </div>

    <div class="widget widget-tag">
        <h3>热门标签</h3>
        <div class="tag-cloud">
            <?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 20))->to($tags); ?>  
<?php while($tags->next()): ?>  
            <a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a>
<?php endwhile; ?>
        </div>
    </div>

    <?php if ($this->is('index') && !empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <div class="widget widget-tag">
        <h3>文章归档</h3>
        <div class="tag-cloud">
          <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y-m')
            ->parse('<a href="{permalink}">{date}</a>'); ?>
        </div>
	</div>
    <?php endif; ?>

    <div class="widget widget-tag">
      <h3>友情链接</h3>
      <div class="tag-cloud">
        <a target="_blank" href="http://www.zyall.com/" title="ZYaller">ZYaller</a>
        <a target="_blank" href="http://blog.zyall.com/" title="ZYall博客">ZYall博客</a>
        <a target="_blank" href="http://acmebags.taobao.com/" title="金利来极致箱包">金利来极致箱包</a>
        <a target="_blank" href="http://blog.csdn.net/zyb_icanplay7" title="CSDN博客-zyb_icanplay">zyb_icanplay</a>
        <a target="_blank" href="http://www.typecho.org" title="Typecho">Typecho</a>
        <a target="_blank" href="http://www.duoshuo.com" title="多说">多说</a>
        <a target="_blank" href="http://www.williamlong.info/" title="月光博客">月光博客</a>
        <a target="_blank" href="https://limh.me/" title="明月皓空">明月皓空</a>
      </div>
    </div>

    <!-- 侧边广告栏BEGIN -->
    <!--<div class="widget" id="sider-adv" style="border-left: none;display: none;"></div>-->
    <!-- 侧边广告栏END -->
</div>
<!-- end #sidebar -->