/**
 * jQuery appear plugin
 * Copyright (c) 2012 Andrey Sidorov
 * licensed under MIT license.
 * https://github.com/morr/jquery.appear/
 * Version: 0.3.3
 */
(function($) {
  var selectors = [], check_binded = false, check_lock = false, defaults = { interval: 250, force_process: false}, $window = $(window), $prior_appeared;
  function process() {
    check_lock = false;
    for (var index = 0; index < selectors.length; index++) {
      var $appeared = $(selectors[index]).filter(function() {
        return $(this).is(':appeared');
      });
      $appeared.trigger('appear', [$appeared]);
      if ($prior_appeared) {
        var $disappeared = $prior_appeared.not($appeared);
        $disappeared.trigger('disappear', [$disappeared]);
      }
      $prior_appeared = $appeared;
    }
  }

  // "appeared" custom filter
  $.expr[':']['appeared'] = function(element) {
    var $element = $(element);
    if (!$element.is(':visible')) {
      return false;
    }

    var window_left = $window.scrollLeft(), window_top = $window.scrollTop(),
        offset = $element.offset(), left = offset.left, top = offset.top;

    if (top + $element.height() >= window_top && top - ($element.data('appear-top-offset') || 0) <= window_top + $window.height() &&
        left + $element.width() >= window_left && left - ($element.data('appear-left-offset') || 0) <= window_left + $window.width()) {
      return true;
    } else {
      return false;
    }
  }

  $.fn.extend({
    // watching for element's appearance in browser viewport
    appear: function(options) {
      var opts = $.extend({}, defaults, options || {});
      var selector = this.selector || this;
      if (!check_binded) {
        var on_check = function() {
          if (check_lock) {
            return;
          }
          check_lock = true;
          setTimeout(process, opts.interval);
        };

        $(window).scroll(on_check).resize(on_check);
        check_binded = true;
      }

      if (opts.force_process) {
        setTimeout(process, opts.interval);
      }
      selectors.push(selector);
      return $(selector);
    }
  });

  $.extend({
    // force elements's appearance check
    force_appear: function() {
      if (check_binded) {
        process();
        return true;
      };
      return false;
    }
  });
  
})(jQuery);


$(function(){
  //移动端加载特效
  $(document.body).on('appear', '.type-post', function(e, $affected) {
    // add class called “appeared” for each appeared element
    $(this).addClass("appeared");
  });
  $('.type-post').appear({force_process: true});

  //返回顶部
  $(window).scroll(function(){
    if ($(this).scrollTop() > 300){
      $('#go-top').fadeIn(100);
    }else{
        $('#go-top').fadeOut(100);
      }
  });
  $('#go-top').click(function(event){
    event.preventDefault();
    $('html,body').animate({scrollTop: 0},500);
  });

  /*$('.loading-title a').click(function() {
    $(this).text('页面载入中……');
    window.location = jQuery(this).attr('href');
  });*/

  //隐藏分页
  $('#pagination').each(function(){
    if($(this).children().length !== 0){
      $(this).show();
    }
  })

  //搜素框
  $('#searchkey').focus(function(){
    $('#searchsubmit').css("background","#f60");
  }).blur(function(){
     $('#searchsubmit').css("background","#c7c7c7");
  });

  //视频宽高适应调整
  (function(){
    var videos = document.getElementsByClassName('edui-faked-video');
    if( videos ){
      for( var i = 0, len = videos.length; i < len; i++ ){
        videos[i].style.height = videos[i].clientWidth * 0.7 + 'px';
      }
    }
  })();

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

  //雪花特效
  /*if ( 'function' === typeof requestAnimationFrame ) {
      var width, height, canvas, ctx, circles;
      function runCanvas() {
          var parent = document.getElementById( 'canvasParent' );
          if ( !parent ) {
              return false;
          }
          width = parent.clientWidth;
          height = parent.clientHeight;

          canvas = document.getElementById( 'canvas' );
          canvas.width = width;
          canvas.height = height;
          ctx = canvas.getContext( '2d' );

          // create particles
          circles = [];
          for ( var x = 0; x < width * 0.5; x++ ) {
              var c = new Circle();
              circles.push( c );
          }
          animate();
      }

      function animate() {
          ctx.clearRect( 0, 0, width, height );
          for ( var i in circles ) {
              circles[i].draw();
          }
          requestAnimationFrame( animate );
      }

      function Circle() {
          var _this = this;
          // constructor
          ( function() {
              _this.pos = { };
              init();
          } )();
          function init() {
              _this.pos.x = Math.random() * width;
              _this.pos.y = height + Math.random() * 100;
              _this.alpha = 0.1 + Math.random() * 0.3;
              _this.scale = 0.1 + Math.random() * 0.3;
              _this.velocity = Math.random();
          }
          this.draw = function() {
              if ( _this.alpha <= 0 ) {
                  init();
              }
              _this.pos.y -= _this.velocity;
              _this.alpha -= 0.0005;
              ctx.beginPath();
              ctx.arc( _this.pos.x, _this.pos.y, _this.scale * 10, 0, 2 * Math.PI, false );
              ctx.fillStyle = 'rgba(255,255,255,' + _this.alpha + ')';
              ctx.fill();
          };
      }
      runCanvas();
  }*/

  //调用多说api加载热评文章、最新评论、最近访客等
  window.duoshuoQuery = {short_name: $('#config').data('dsshortname'), theme: $('#config').data('dstheme')};
  (function() {
     var ds = document.createElement('script');
     ds.type = 'text/javascript';ds.async = true;
     ds.src = 'http://static.duoshuo.com/embed.js';
     ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
  })();
  
  //百度异步统代码
  var _hmt = _hmt || [];
  (function() {
    var hm = document.createElement("script");
    hm.src = "//hm.baidu.com/hm.js?b9d2ba2b2ad3c6af8eb49854650bd849";
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm, s);
  })();

});

