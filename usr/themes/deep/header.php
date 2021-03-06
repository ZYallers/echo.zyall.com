<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <title>
        <?php $this->archiveTitle( array(
                'category' => _t( '分类“%s”下的文章' ),
                'search' => _t( '包含“%s”的文章' ),
                'tag' => _t( '标签“%s”下的文章' ),
                'author' => _t( '“%s”发布的文章' )
            ), '', '_' );
        ?><?php $this->options->title(); ?></title>
        <meta charset="<?php $this->options->charset(); ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
        <meta name="renderer" content="webkit"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <meta name="baidu-site-verification" content="JXNcz2dWW1"/>
        <!-- 通过自有函数输出HTML头部信息 -->
        <?php $this->header( 'generator=&template=&pingback=&xmlrpc=&wlw=&rss1=&rss2=&atom=&commentReply=' ); ?>
        <!-- 使用url函数转换相关路径 -->
        <link rel="stylesheet" href="<?php $this->options->themeUrl( 'css/base.css' ); ?>"/>
        <link rel="stylesheet" href="<?php $this->options->themeUrl( 'css/style.css' ); ?>"/>
        <link rel="stylesheet" href="<?php $this->options->themeUrl( 'css/fontello.css' ); ?>"/>
    </head>
    <body>
        <!--[if lt IE 8]><div class="browsehappy" role="dialog"><?php _e( '当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>' ); ?>.</div><![endif]-->
        <div id="header">
            <div class="container">             
                <h1 class="h1-title" style="margin-top: 17px; font-weight: normal;">
                    <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->description(); ?>" style="color: #E67708;">
                        <?php $this->options->title(); ?>       
                    </a>
                </h1>
                <div id="nav">
                    <input type="checkbox" id="button">
                    <label for="button" onclick>菜单</label>
                    <ul>
                        <li<?php if ( $this->is( 'index' ) ): ?> class="current"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php _e( '首页' ); ?></a></li>
                        <?php $this->widget( 'Widget_Contents_Page_List' )->to( $pages ); ?>
                        <?php while ( $pages->next() ): ?>
                            <li<?php if ( $this->is( 'page', $pages->slug ) ): ?> class="current"<?php endif; ?>><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>