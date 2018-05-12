<?php
/**
 * 浮动天气预报
 * 
 * @package 浮动天气预报 
 * @author 大宝
 * @version 1.0.1
 * @link https://dabao.im
 */
class DbWeather_Plugin implements Typecho_Plugin_Interface
{
	private static $pluginName="DbWeather";
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
    	Typecho_Plugin::factory('Widget_Archive')->footer = array(self::$pluginName .'_Plugin', 'footer');        
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $parentText = new Typecho_Widget_Helper_Form_Element_Text('parentText', NULL, 'body', _t('父级选择器'),_t('支持jQuery/CSS3选择器'));
        $form->addInput($parentText);

        $moveAreaOption = array('all' =>_t('在整个网页中移动') ,
                                'limit'=>_t('只能在父级选择器移动'));
        $moveArea=new Typecho_Widget_Helper_Form_Element_Radio('moveArea',$moveAreaOption,'all',_t('移动范围'));
        $form->addInput($moveArea);

        $zIndex=new Typecho_Widget_Helper_Form_Element_Text('zIndex',NULL,'1',_t('z-index'),_t('如果遮住了网页元素，可以设置小一些'));
        $form->addInput($zIndex);

        $moveOption = array('1' =>_t('自动移动位置') ,
                            '0'=>_t('位置固定') );
        $move=new Typecho_Widget_Helper_Form_Element_Radio('move',$moveOption,'1',_t('是否移动'));
        $form->addInput($move);

        $dragOption = array('1'=>_t('允许拖动'),
                            '0'=>_t('禁止拖动'));
        $drag=new Typecho_Widget_Helper_Form_Element_Radio('drag',$dragOption,'1',_t('是否允许拖动'));
        $form->addInput($drag);

        $autoDropOption = array('0' =>_t('鼠标放上去才开始下雨/雪') ,
                                '1'=>_t('自动下雨/雪') );
        $autoDrop=new Typecho_Widget_Helper_Form_Element_Radio('autoDrop',$autoDropOption,'0',_t('下雨/雪'));
        $form->addInput($autoDrop);

        $styleSizeOption = array('big' =>_t('大尺寸（100px * 100px）') ,
                                'small'=>_t('小尺寸（50px * 50px）') );
        $styleSize=new Typecho_Widget_Helper_Form_Element_Radio('styleSize',$styleSizeOption,'big',_t('图标大小'));
        $form->addInput($styleSize);

        $pluginName = self::$pluginName;
        $image_url=Typecho_Common::url("$pluginName/images/",Helper::options()->pluginUrl);
        $styleOption = array('default' =>_t('<img alt="default" title="default" src="'.$image_url.'default/thumb.png"><br/>'),
                            'medialoot' =>_t('<img alt="medialoot" title="medialoot" src="'.$image_url.'medialoot/thumb.png"><br/>'),
                            'meteocons' =>_t('<img alt="meteocons" title="meteocons" src="'.$image_url.'meteocons/thumb.png"><br/>'),
                            'blue' =>_t('<img alt="blue" title="blue" src="'.$image_url.'blue/thumb.png"><br/>'),
                            'cartoon-1' =>_t('<img alt="cartoon-1" title="cartoon-1" src="'.$image_url.'cartoon-1/thumb.png"><br/>'),
                            'cartoon-2' =>_t('<img alt="cartoon-2" title="cartoon-2" src="'.$image_url.'cartoon-2/thumb.png"><br/>'),
                            'cartoon-3' =>_t('<img alt="cartoon-3" title="cartoon-3" src="'.$image_url.'cartoon-3/thumb.png"><br/>'),
                            '_random'=>_t('每次随机出现一种'));
        $style=new Typecho_Widget_Helper_Form_Element_Radio('style',$styleOption,'default',_t('选择风格'));
        $form->addInput($style);
        
        $areaOption = array('client' => _t('显示访问者所在地区（IP判断）的天气预报 <strong>（支持全世界所有城市）</strong><br/>'),
                            'assign' =>_t('固定显示城市:'));
        $area=new Typecho_Widget_Helper_Form_Element_Radio('area',$areaOption,'client',_t('天气情况'));
        $form->addInput($area);

        $cityName = new Typecho_Widget_Helper_Form_Element_Text('cityName',NULL,'北京','',_t('选择“固定显示城市”选项后，需要在此处填入你想显示的城市名，不要带“市”字哟'));
        $form->addInput($cityName);
        
    }
    
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
    public static function footer()
    {
        $options = Helper::options();
        $config = $options->plugin(self::$pluginName);
        $pluginName = self::$pluginName;
    	$weather_js_url = Typecho_Common::url("$pluginName/js/jquery.weather.build.min.js", $options->pluginUrl);

        $parentText=$config->parentText;
        $moveArea=$config->moveArea;
        $zIndex=$config->zIndex;
        $move=$config->move;
        $drag=$config->drag;
        $autoDrop=$config->autoDrop;
        $styleSize=$config->styleSize;
        $style=$config->style;
        $areas=$config->area;
        $cityName=urlencode($config->cityName);
    	echo <<<EOF
        <script defer src='{$weather_js_url}?parentbox={$parentText}&moveArea={$moveArea}&zIndex={$zIndex}&move={$move}&drag={$drag}&autoDrop={$autoDrop}&styleSize={$styleSize}&style={$style}&area={$areas}&city={$cityName}'></script>
EOF;
    }
}
