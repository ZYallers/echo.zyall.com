<?php
/**
 * UEditor编辑器
 * 
 * @package UEditor
 * @author 千夜
 * @version 2.0
 * @link http://70data.net
 * @date 2014-09-04
 */
class UEditor_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('admin/write-post.php')->richEditor = array('UEditor_Plugin', 'render');
        Typecho_Plugin::factory('admin/write-page.php')->richEditor = array('UEditor_Plugin', 'render');
        
        Helper::addPanel(0, 'UEditor/ueditor/ueditor.config.js','', '', 'contributor');

        //Typecho_Plugin::factory('Widget_Archive')->header = array('UEditor_Plugin', 'header');
        //Typecho_Plugin::factory('Widget_Archive')->footer = array('UEditor_Plugin', 'footer');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
        Helper::removePanel(0, 'UEditor/ueditor/ueditor.config.js');
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form) {}
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function render($post)
    {
        $options = Helper::options();
        $js = Typecho_Common::url('UEditor/ueditor/ueditor.all.min.js', $options->pluginUrl);
        $configJs = Typecho_Common::url('UEditor/ueditor/ueditor.config.js', $options->pluginUrl);
        $lang = Typecho_Common::url('UEditor/ueditor/lang/zh-cn/zh-cn.js', $options->pluginUrl);
        echo '<style>body{color:#000 !important;}/**保留此规则使dialogs的某些组件文字可见*/.typecho-label + p{overflow:hidden;}</style>'."\n";
        //echo '</script>\n';
        echo '<script src="'. $configJs. '"></script>'."\n";
        echo '<script src="'. $js. '"></script>'."\n";
        echo '<script src="'. $lang. '"></script>'."\n";
        echo "<script>\n". 
             "  var ue1 = new baidu.editor.ui.Editor();\n". 
             "  window.onload = function() { ue1.render('text');};\n". 
             "  document.getElementById('btn-save').onclick = function() {ue1.sync('text');}\n".
             "  document.getElementById('btn-submit').onclick = function() {ue1.sync('text');}\n".
	     "</script>\n";
    }

    /**
     * 输出头部css
     * 
     * @access public
     * @return unknown
     */
    /*public static function header() {
        if( 'post' == Typecho_Router::$current ){
            $cssUrl = Helper::options()->pluginUrl . '/UEditor/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css';
            echo '<link rel="stylesheet" href="' . $cssUrl . '"/>'."\n";
        }
    }*/
    
    /**
     * 输出尾部js
     * 
     * @access public
     * @return unknown
     */
    /*public static function footer() {
        if( 'post' == Typecho_Router::$current ){
            $jsUrl = Helper::options()->pluginUrl . '/UEditor/ueditor/third-party/SyntaxHighlighter/shCore.js';
            echo '<script src="' .  $jsUrl . '"></script>' . "\n" . '<script>SyntaxHighlighter.all();</script>';
        }
    }*/
}
