$(function(){

  var main = $('#mainContent');
  if(main.length>0){ //文章页面
    //百度分享和过滤图片属性
    var bdPic = '', host = window.location.host, bdText = $('head title').text();
    main.find('img').each(function(){
    	var me = $(this);
        me.removeAttr('width').removeAttr('height').removeAttr('style').removeAttr('border');
        me.attr('alt',bdText).attr('title',bdText);
        var src = me.attr('src');
        bdPic += src.substr(0,4) === 'http' ? src + ';' : 'http://'+host+src+';';
    });
    bdPic += 'http://echo.zyall.com/logo.png';
    window._bd_share_config={
       "common":{
          "bdSnsKey":{},
          "bdText":bdText,
          "bdMini":"2",
          "bdMiniList":false,
          "bdPic": bdPic,
          "bdStyle":"1",
          "bdSize":"24"
        },
       "share":{}
        //,"image":{ "viewList":[ "qzone","tsina","tqq","renren","weixin","sqq"], "viewText":"分享到:","viewSize":"24" }
        //,"selectShare":{ "bdContainerClass":null, "bdSelectMiniList":["qzone","tsina","tqq","renren","weixin","sqq"] }
    };
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];

    //隐藏多说评论插件尾巴
    var time = window.setInterval(function(){
      var arr = document.getElementsByClassName('ds-powered-by');
      if( arr[0] ){
        arr[0].parentNode.removeChild(arr[0]); 
        window.clearInterval(time);
      }
    },100);
  }

  // 过滤图片的宽高css样式的属性
  var postDetail = $('[rel=post-detail]');
  if(postDetail.length>0){ //列表页面
    postDetail.find('img').each(function(){
      $(this).removeAttr('width').removeAttr('height').removeAttr('style').removeAttr('border').removeAttr('alt');
    });
  }
  
});