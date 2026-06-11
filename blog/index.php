<?php require_once("../res/x5engine.php"); ?>
<?php
$blog = new imBlog();
$data = $blog->parseUrlArray(@$_GET);
if (!$data['valid']) {
	header('Location: index.php', true, 302);
}
?>
<!DOCTYPE html><!-- HTML5 -->
<html prefix="og: http://ogp.me/ns#" lang="tr-TR" dir="ltr">
	<head>
		<title><?php echo $blog->pageTitle('', ' - '); ?></title>
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv="ImageToolbar" content="False" /><![endif]-->
		<meta name="author" content="Sezen Medya" />
		<meta name="generator" content="Incomedia WebSite X5 Pro 2026.2.2 - www.websitex5.com" />
		<meta name="description" content="<?php 
   $urlData = $blog->parseUrlArray(@$_GET); 
   if ( 
      ( array_key_exists('slug', $urlData) || array_key_exists('id', $urlData) ) && 
      strlen(trim($blog->pageDescription())) <= 0 
   ) { 
      echo ''; 
   } else { 
      echo $blog->pageDescription(); 
   } 
?>" />
		<meta name="keywords" content="<?php 
   $urlData = $blog->parseUrlArray(@$_GET); 
   if ( 
      ( array_key_exists('slug', $urlData) || array_key_exists('id', $urlData) ) && 
      strlen(trim($blog->pageKeywords())) <= 0 
   ) { 
      echo ''; 
   } else { 
      echo $blog->pageKeywords(); 
   } 
?>" />
		<meta property="og:locale" content="tr_TR" />
<?php if (isset($data['id'])) { echo $blog->getOpengraphTags($data['id'], "\t\t"); } ?>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<link rel="stylesheet" href="../style/reset.css?2026-2-2-0" media="screen,print" />
		<link rel="stylesheet" href="../style/print.css?2026-2-2-0" media="print" />
		<link rel="stylesheet" href="../style/style.css?2026-2-2-0" media="screen,print" />
		<link rel="stylesheet" href="../style/template.css?2026-2-2-0" media="screen" />
		<link rel="stylesheet" href="../pluginAppObj/imHeader_pluginAppObj_04/style.css" media="screen, print" />
		<link rel="stylesheet" href="../blog/style.css?2026-2-2-0-639168165198611810" media="screen,print" />
		<script src="../res/jquery.js?2026-2-2-0"></script>
		<script src="../res/x5engine.js?2026-2-2-0" data-files-version="2026-2-2-0"></script>
		<script src="../res/pwa.js?2026-2-2-0" defer ></script>		<script src="../res/x5engine.elements.js?2026-2-2-0"></script>
		<script src="../res/swiper-bundle.min.js?2026-2-2-0"></script>
		<link rel="stylesheet" href="../res/swiper-bundle.min.css?2026-2-2-0" />
		<script src="../res/handlebars-min.js?2026-2-2-0"></script>
		<script src="../res/card-blog.js?2026-2-2-0"></script>
		<script src="../blog/x5blog.js?2026-2-2-0"></script>
		<script>
			window.onload = function(){ checkBrowserCompatibility('Tarayıcınız, bu web sitesini görüntülemek için gerekli olan özellikleri desteklemiyor.','Tarayıcınız, bu web sitesini görüntülemek için gereken özellikleri desteklemiyor olabilir.','[1]Tarayıcınızı güncelleyin[/1] veya [2]güncellemeden devam edin[/2].','http://outdatedbrowser.com/'); };
			x5engine.settings.currentPath = '../';
			x5engine.utils.currentPagePath = 'blog/index.php';
			x5engine.boot.push(function () { x5engine.imPageToTop.initializeButton({}); });
		</script>
		<link rel="icon" href="../favicon.png?2026-2-2-0-639168165198441897" type="image/png" />
		<link rel="alternate" type="application/rss+xml" title="" href="../blog/x5feed.php" />
		<link rel="manifest" href="../app.webmanifest?2026-2-2-0" /><?php
$blogBaseUrl = $imSettings['general']['url'] . 'blog/';
$urlData = $blog->parseUrlArray(@$_GET);
$numPosts = $blog->getPostsCount();
$pagStart = array_key_exists("start", $urlData) ? $urlData['start'] : 0;
$pagLength = $imSettings['blog']['home_posts_number'];
$isPostPage = false;
if (array_key_exists('slug', $urlData)) {
	$isPostPage = true;
	$href = $blogBaseUrl . '?' . $urlData['slug'];
}
else if (array_key_exists('id', $urlData)) {
	$isPostPage = true;
	$href = $blogBaseUrl . $blog->getSlugUrl($urlData['id']);
}
else if (array_key_exists('category', $urlData)) {
	$category = $blog->getUnescapedCategory($urlData['category']);
	if ($category !== NULL) {
		$href = $blogBaseUrl . '?category=' . urlencode(str_replace(' ', '_', $category));
	}
}
else if (array_key_exists('author', $urlData)) {
	$author = $blog->getUnescapedAuthor($urlData['author']);
	if ($author !== NULL) {
		$href = $blogBaseUrl . '?author=' . urlencode(str_replace(' ', '_', $author));
	}
}
else if (array_key_exists('tag', $urlData)) {
	$href = $blogBaseUrl . '?tag=' . urlencode($urlData['tag']);
}
else if (array_key_exists('month', $urlData)) {
	$href = $blogBaseUrl . '?month=' . urlencode($urlData['month']);
}
else {
	$href = $blogBaseUrl;
}
if ($isPostPage || $pagStart == 0) {
	echo '<link rel="canonical" href="'. $href. '"/>' . PHP_EOL;
}
if (!$isPostPage && $numPosts > $pagLength) {
	if ($pagStart - $pagLength >= 0) {
		$prev = 'start=' . ($pagStart - $pagLength) . '&length=' . $pagLength;
		$prev = ($href == $blogBaseUrl) ? '?' . $prev : '&' . $prev;
		echo '<link rel="prev" href="' . $href . $prev . '"/>' . PHP_EOL;
	}
	if ($pagStart + $pagLength < $numPosts) {
		$next = 'start=' . ($pagStart + $pagLength) . '&length=' . $pagLength;
		$next = ($href == $blogBaseUrl) ? '?' . $next : '&' . $next;
		echo '<link rel="next" href="' . $href . $next . '"/>' . PHP_EOL;
	}
}
?>
	</head>
	<body>
		<div id="imPageExtContainer">
			<div id="imPageIntContainer">
				<span data-nosnippet><a class="screen-reader-only-even-focused" href="#imGoToCont" title="Ana menüyü atla">İçeriğe git</a></span>
				<div id="imHeaderBg"></div>
				<div id="imPage">
					<header id="imHeader">
						<h1 class="imHidden"><?php echo $blog->pageHeaderTitle('Sezen Medya – Canlı TV, Radyo ve Hesaplama Araçları', ' - '); ?></h1>
						<div id="imHeaderObjects"><div id="imHeader_pluginAppObj_04_wrapper" class="template-object-wrapper"><!-- AddToAny Sticky v.5 --><div id="imHeader_pluginAppObj_04" style="direction: ltr;">

<div class="imHeader_pluginAppObj_04 root" style="height:0;">
    <div class="imHeader_pluginAppObj_04 add_to_any_floating_plugin a2a_kit a2a_kit_size_16 a2a_floating_style a2a_default_style" 
        data-a2a-icon-color="unset"
        >
        
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_x"></a><a class="a2a_button_linkedin"></a>
        <a class="a2a_button_pinterest"></a>
        
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    </div>
 </div>    
 
<script>
    var container = $('#imHeader_pluginAppObj_04 div.root');
    var root = $(container.html());
    container.empty();
    $('body').append(root);

    if($('.a2a_kit.add_to_any_floating_plugin').length === 1){
        var a2a_config = a2a_config || {};
        a2a_config.locale = 'TR';
        if(false){
            a2a_config.icon_color = "unset";
            a2a_config.color_main = "000000";
            a2a_config.color_border = 'ffffff';
            a2a_config.color_link_text = "000000";
            a2a_config.color_link_text_hover = 'ffffff';
        }
        a2a_config.color_bg = 'ffffff';

        $.getScript('https://static.addtoany.com/menu/page.js');
    }
</script></div></div><div id="imHeader_imObjectImage_01_wrapper" class="template-object-wrapper"><div id="imHeader_imObjectImage_01"><div id="imHeader_imObjectImage_01_container"><a href="../index.html" onclick="return x5engine.utils.location('../index.html', null, false)"><img src="../images/sezen-medya.webp" alt="" width="200" height="32" />
</a></div></div></div><div id="imHeader_imObjectSearch_03_wrapper" class="template-object-wrapper"><div id="imHeader_imObjectSearch_03"><form id="imHeader_imObjectSearch_03_form" action="../imsearch.php" method="get"><fieldset><div id="imHeader_imObjectSearch_03_fields_container" role="search"><input type="text" id="imHeader_imObjectSearch_03_field" name="search" value="" placeholder="Ara..." aria-label="Ara..." /><button id="imHeader_imObjectSearch_03_button" aria-label="Arama"></button></div></fieldset></form><script>$('#imHeader_imObjectSearch_03_button').click(function() { $(this).prop('disabled', true); setTimeout(function(){ $('#imHeader_imObjectSearch_03_button').prop('disabled', false); }, 900); $('#imHeader_imObjectSearch_03_form').submit(); return false; });</script></div></div><div id="imHeader_imMenuObject_02_wrapper" class="template-object-wrapper"><!-- UNSEARCHABLE --><span data-nosnippet><a id="imHeader_imMenuObject_02_skip_menu" href="#imHeader_imMenuObject_02_after_menu" class="screen-reader-only-even-focused">Menüyü atla</a></span><div id="imHeader_imMenuObject_02"><nav id="imHeader_imMenuObject_02_container"><button type="button" class="clear-button-style hamburger-button hamburger-component" aria-label="Menüyü göster"><span class="hamburger-bar"></span><span class="hamburger-bar"></span><span class="hamburger-bar"></span></button><div class="hamburger-menu-background-container hamburger-component">
	<div class="hamburger-menu-background menu-mobile menu-mobile-animated hidden">
		<button type="button" class="clear-button-style hamburger-menu-close-button" aria-label="Kapalı"><span aria-hidden="true">&times;</span></button>
	</div>
</div>
<ul class="menu-mobile-animated hidden">
	<li class="imMnMnFirst imPage" data-link-paths=",/index.html,/">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../index.html">
Anasayfa		</a>
</div>
</div>
	</li><li class="imMnMnMiddle imLevel" data-link-paths=",/hesaplama-bolumu.html" data-link-hash="-1004160591"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../hesaplama-bolumu.html" class="label" onclick="return x5engine.utils.location('../hesaplama-bolumu.html', null, false)">Hesaplama</a><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Hesaplama" aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div></li><li class="imMnMnMiddle imLevel" data-link-paths=",/medya-bolumu.html" data-link-hash="-1004160572"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../medya-bolumu.html" class="label" onclick="return x5engine.utils.location('../medya-bolumu.html', null, false)">Medya</a><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Medya" aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div></li><li class="imMnMnMiddle imLevel" data-link-paths=",/seo-bolumu.html" data-link-hash="-1004160553"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../seo-bolumu.html" class="label" onclick="return x5engine.utils.location('../seo-bolumu.html', null, false)">Seo</a><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Seo" aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div></li><li class="imMnMnMiddle imLevel" data-link-paths=",/din-bolumu.html" data-link-hash="-1004160534"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../din-bolumu.html" class="label" onclick="return x5engine.utils.location('../din-bolumu.html', null, false)">Din</a><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Din" aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div></li><li class="imMnMnMiddle imLevel" data-link-paths=",/tavsiye-bolumu.html" data-link-hash="-1004160515"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../tavsiye-bolumu.html" class="label" onclick="return x5engine.utils.location('../tavsiye-bolumu.html', null, false)">Tavsiye</a><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Tavsiye" aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div></li><li class="imMnMnMiddle imLevel" data-link-hash="297419284"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../blog/" class="label">Blog</a></div></div></li><li class="imMnMnLast imLevel"><div class="label-wrapper"><div class="label-inner-wrapper"><span class="label">Hakkımızda </span><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Hakkımızda " aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div><ul data-original-position="open-bottom" class="open-bottom" style="" >
	<li class="imMnMnFirst imPage" data-link-paths=",/hakkimizda-iletisim.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../hakkimizda-iletisim.html">
Hakkımızda &amp; İletişim		</a>
</div>
</div>
	</li><li class="imMnMnMiddle imPage" data-link-paths=",/reklam-ve-sponsorluk-bilgileri.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../reklam-ve-sponsorluk-bilgileri.html">
Reklam &amp; Sponsorlar		</a>
</div>
</div>
	</li><li class="imMnMnMiddle imPage" data-link-paths=",/gizlilik-politikasi.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../gizlilik-politikasi.html">
Gizlilik Politikası		</a>
</div>
</div>
	</li><li class="imMnMnMiddle imPage" data-link-paths=",/cerez-politikasi.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../cerez-politikasi.html">
Çerez Politikası		</a>
</div>
</div>
	</li><li class="imMnMnLast imPage" data-link-paths=",/kvkk-aydinlatma-metni.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../kvkk-aydinlatma-metni.html">
KVKK Aydınlatma Metni		</a>
</div>
</div>
	</li></ul></li></ul></nav></div><a id="imHeader_imMenuObject_02_after_menu" class="screen-reader-only-even-focused"></a><!-- UNSEARCHABLE END --><script>
var imHeader_imMenuObject_02_settings = {
	'menuId': 'imHeader_imMenuObject_02',
	'responsiveMenuEffect': 'none',
	'responsiveMenuLevelOpenEvent': 'click',
	'animationDuration': 0,
}
x5engine.boot.push(function(){x5engine.initMenu(imHeader_imMenuObject_02_settings)});
$(function () {
    $('#imHeader_imMenuObject_02_container ul li').not('.imMnMnSeparator').each(function () {
        $(this).on('mouseenter', function (evt) {
            if (!evt.originalEvent) {
                evt.stopImmediatePropagation();
                evt.preventDefault();
                return;
            }
        });
    });
});
$(function () {$('#imHeader_imMenuObject_02_container ul li').not('.imMnMnSeparator').each(function () {    var $this = $(this), timeout = 0;    $this.on('mouseenter', function () {        clearTimeout(timeout);        setTimeout(function () { $this.children('ul, .multiple-column').stop(false, false).show(); }, 250);    }).on('mouseleave', function () {        timeout = setTimeout(function () { $this.children('ul, .multiple-column').stop(false, false).hide(); }, 250);    });});});

</script>
</div></div>
					</header>
					<div id="imStickyBarContainer">
						<div id="imStickyBarGraphics"></div>
						<div id="imStickyBar">
							<div id="imStickyBarObjects"><div id="imStickyBar_imMenuObject_01_wrapper" class="template-object-wrapper"><!-- UNSEARCHABLE --><span data-nosnippet><a id="imStickyBar_imMenuObject_01_skip_menu" href="#imStickyBar_imMenuObject_01_after_menu" class="screen-reader-only-even-focused">Menüyü atla</a></span><div id="imStickyBar_imMenuObject_01"><nav id="imStickyBar_imMenuObject_01_container"><button type="button" class="clear-button-style hamburger-button hamburger-component" aria-label="Menüyü göster"><span class="hamburger-bar"></span><span class="hamburger-bar"></span><span class="hamburger-bar"></span></button><div class="hamburger-menu-background-container hamburger-component">
	<div class="hamburger-menu-background menu-mobile menu-mobile-animated hidden">
		<button type="button" class="clear-button-style hamburger-menu-close-button" aria-label="Kapalı"><span aria-hidden="true">&times;</span></button>
	</div>
</div>
<ul class="menu-mobile-animated hidden">
	<li class="imMnMnFirst imPage" data-link-paths=",/index.html,/">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../index.html">
Anasayfa		</a>
</div>
</div>
	</li><li class="imMnMnMiddle imLevel" data-link-paths=",/hesaplama-bolumu.html" data-link-hash="-1004160591"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../hesaplama-bolumu.html" class="label" onclick="return x5engine.utils.location('../hesaplama-bolumu.html', null, false)">Hesaplama</a><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Hesaplama" aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div></li><li class="imMnMnMiddle imLevel" data-link-paths=",/medya-bolumu.html" data-link-hash="-1004160572"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../medya-bolumu.html" class="label" onclick="return x5engine.utils.location('../medya-bolumu.html', null, false)">Medya</a><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Medya" aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div></li><li class="imMnMnMiddle imLevel" data-link-paths=",/seo-bolumu.html" data-link-hash="-1004160553"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../seo-bolumu.html" class="label" onclick="return x5engine.utils.location('../seo-bolumu.html', null, false)">Seo</a><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Seo" aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div></li><li class="imMnMnMiddle imLevel" data-link-paths=",/din-bolumu.html" data-link-hash="-1004160534"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../din-bolumu.html" class="label" onclick="return x5engine.utils.location('../din-bolumu.html', null, false)">Din</a><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Din" aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div></li><li class="imMnMnMiddle imLevel" data-link-paths=",/tavsiye-bolumu.html" data-link-hash="-1004160515"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../tavsiye-bolumu.html" class="label" onclick="return x5engine.utils.location('../tavsiye-bolumu.html', null, false)">Tavsiye</a><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Tavsiye" aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div></li><li class="imMnMnMiddle imLevel" data-link-hash="297419284"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../blog/" class="label">Blog</a></div></div></li><li class="imMnMnLast imLevel"><div class="label-wrapper"><div class="label-inner-wrapper"><span class="label">Hakkımızda </span><button type="button" class="screen-reader-only clear-button-style toggle-submenu" aria-label="Alt menüyü göster Hakkımızda " aria-expanded="false" onclick="if ($(this).attr('aria-expanded') == 'true') event.stopImmediatePropagation(); $(this).closest('.imLevel').trigger(jQuery.Event($(this).attr('aria-expanded') == 'false' ? 'mouseenter' : 'mouseleave', { originalEvent: event } ));">▼</button></div></div><ul data-original-position="open-bottom" class="open-bottom" style="" >
	<li class="imMnMnFirst imPage" data-link-paths=",/hakkimizda-iletisim.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../hakkimizda-iletisim.html">
Hakkımızda &amp; İletişim		</a>
</div>
</div>
	</li><li class="imMnMnMiddle imPage" data-link-paths=",/reklam-ve-sponsorluk-bilgileri.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../reklam-ve-sponsorluk-bilgileri.html">
Reklam &amp; Sponsorlar		</a>
</div>
</div>
	</li><li class="imMnMnMiddle imPage" data-link-paths=",/gizlilik-politikasi.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../gizlilik-politikasi.html">
Gizlilik Politikası		</a>
</div>
</div>
	</li><li class="imMnMnMiddle imPage" data-link-paths=",/cerez-politikasi.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../cerez-politikasi.html">
Çerez Politikası		</a>
</div>
</div>
	</li><li class="imMnMnLast imPage" data-link-paths=",/kvkk-aydinlatma-metni.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../kvkk-aydinlatma-metni.html">
KVKK Aydınlatma Metni		</a>
</div>
</div>
	</li></ul></li></ul></nav></div><a id="imStickyBar_imMenuObject_01_after_menu" class="screen-reader-only-even-focused"></a><!-- UNSEARCHABLE END --><script>
var imStickyBar_imMenuObject_01_settings = {
	'menuId': 'imStickyBar_imMenuObject_01',
	'responsiveMenuEffect': 'push',
	'responsiveMenuLevelOpenEvent': 'mouseover',
	'animationDuration': 1000,
}
x5engine.boot.push(function(){x5engine.initMenu(imStickyBar_imMenuObject_01_settings)});
$(function () {
    $('#imStickyBar_imMenuObject_01_container ul li').not('.imMnMnSeparator').each(function () {
        $(this).on('mouseenter', function (evt) {
            if (!evt.originalEvent) {
                evt.stopImmediatePropagation();
                evt.preventDefault();
                return;
            }
        });
    });
});
$(function () {$('#imStickyBar_imMenuObject_01_container ul li').not('.imMnMnSeparator').each(function () {    var $this = $(this), timeout = 0;    $this.on('mouseenter', function () {        if($(this).parents('#imStickyBar_imMenuObject_01_container-menu-opened').length > 0) return;         clearTimeout(timeout);        setTimeout(function () { $this.children('ul, .multiple-column').stop(false, false).fadeIn(); }, 250);    }).on('mouseleave', function () {        if($(this).parents('#imStickyBar_imMenuObject_01_container-menu-opened').length > 0) return;         timeout = setTimeout(function () { $this.children('ul, .multiple-column').stop(false, false).fadeOut(); }, 250);    });});});

</script>
</div></div>
						</div>
					</div>
					<div id="imSideBar">
						<div id="imSideBarObjects"><div id="imSideBar_imObjectImage_01_wrapper" class="template-object-wrapper"><div id="imSideBar_imObjectImage_01"><div id="imSideBar_imObjectImage_01_container"><img src="../images/empty-GT_imagea-1--1--1--1--1-.webp"  width="140" height="140" />
</div></div></div></div>
					</div>
					<div id="imContentGraphics"></div>
					<main id="imContent">
						<a id="imGoToCont"></a>
						<div id="imBlogPage" class="<?php echo (isset($data['id']) ? 'imBlogArticle' : 'imBlogHome'); ?>"><<?php echo (isset($data['id']) ? 'article' : 'div'); ?> id="imBlogContent"><?php
						$blog->setCommentsPerPage(10);
						if(isset($data['id']))
							$blog->showPost($data['id'],1);
						else if(isset($data['category']))
							$blog->showCategory($data['category']);
						else if(isset($data['author']))
							$blog->showAuthor($data['author']);
						else if(isset($data['tag']))
							$blog->showTag($data['tag']);
						else if(isset($data['month']))
							$blog->showMonth($data['month']);
						else if(isset($data['search']))
							$blog->showSearch($data['search']);
						else
							$blog->showLast(6);
						?>
						</<?php echo (isset($data['id']) ? 'article' : 'div'); ?>>
						<aside id="imBlogSidebar">
							<span data-nosnippet><a id="imSkipBlock0" href="#imSkipBlock1" class="screen-reader-only-even-focused">Bloğu atla Son Haberler</a></span>
							<div class="imBlogBlock" id="imBlogBlock0" >
								<div class="imBlogBlockTitle">Son Haberler</div>
								<div class="imBlogBlockContent">
						<?php $blog->showBlockLast(4) ?>
								</div>
							</div>
							<span data-nosnippet><a id="imSkipBlock1" href="#imSkipBlock2" class="screen-reader-only-even-focused">Bloğu atla Aylık Haberler</a></span>
							<div class="imBlogBlock" id="imBlogBlock1" >
								<div class="imBlogBlockTitle">Aylık Haberler</div>
								<div class="imBlogBlockContent">
						<?php $blog->showBlockMonths(4) ?>
								</div>
							</div>
							<span data-nosnippet><a id="imSkipBlock2" href="#imSkipBlock3" class="screen-reader-only-even-focused">Bloğu atla Kategoriler</a></span>
							<div class="imBlogBlock" id="imBlogBlock2" >
								<div class="imBlogBlockTitle">Kategoriler</div>
								<div class="imBlogBlockContent">
						<?php $blog->showBlockCategories(4) ?>
								</div>
							</div>
						</aside>
						<a id="imSkipBlock3" class="screen-reader-only-even-focused"></a>
						<script>
							x5engine.boot.push(function () { 
								window.scrollTo(0, 0);
							});
						</script>
						<script>
							x5engine.boot.push(function () {
								x5engine.blogSidebarScroll({ enabledBreakpoints: ['ea2f0ee4d5cbb25e1ee6c7c4378fee7b', 'd2f9bff7f63c0d6b7c7d55510409c19b', '72e5146e7d399bc2f8a12127e43469f1'] });
								var postHeightAtDesktop = 300,
									postWidthAtDesktop = 914;
								if ($('#imBlogPage').hasClass('imBlogArticle')) {
									$('#imPageExtContainer').addClass('imBlogExtArticle');
									var coverResizeTo = null,
										coverWidth = 0;
									x5engine.utils.onElementResize($('.imBlogPostCover')[0], function (rect, target) {
										if (coverWidth == rect.width) {
											return;
										}
										coverWidth = rect.width;
										if (!!coverResizeTo) {
											clearTimeout(coverResizeTo);
										}
										coverResizeTo = setTimeout(function() {
											$('.imBlogPostCover').height(postHeightAtDesktop * coverWidth / postWidthAtDesktop + 'px');
										}, 50);
									});
								}
							});
						</script>
						</div>
						<script>
						   x5engine.boot.push(
						      function(){
						         if ($('#imBlogPage').hasClass('imBlogArticle')) {
						            if ($("meta[name='description']").length > 0) {
						               if ($("meta[name='description']").attr("content").trim().length <= 0) {
						                   $("meta[name='description']").attr("content", "" );
						               }
						            } else {
						               $("meta[name='generator']").after("<meta name=\"description\" content=\"\">");
						            }
						            if ($("meta[name='keywords']").length > 0) {
						               if ($("meta[name='keywords']").attr("content").trim().length <= 0) {
						                  $("meta[name='keywords']").attr("content", "" );
						               }
						            } else {
						               $("meta[name='description']").after("<meta name=\"keywords\" content=\"\">");
						            }
						         }
						      }
						   );
						</script>
						
					</main>
					<div id="imFooterBg"></div>
					<footer id="imFooter">
						<div id="imFooterObjects"><div id="imFooter_imTextObject_10_wrapper" class="template-object-wrapper"><div id="imFooter_imTextObject_10">
	<div data-index="0"  class="text-tab-content grid-prop current-tab "  id="imFooter_imTextObject_10_tab0" style="opacity: 1; " role="tabpanel" tabindex="0">
		<div class="text-inner">
			<div><div data-text-align="start"><span class="cf1">Sezen Medya Hakkında</span></div><div data-text-align="start"><span class="cf1"><br></span><div data-text-align="start"><span class="cf1">Sezen Medya, canlı TV ve radyo yayınlarını tek noktadan takip edebileceğiniz; finans, sağlık ve günlük yaşam için hesaplama araçları ile SEO ve web araçlarına ulaşabileceğiniz modern bir bilgi ve araç platformudur. </span></div></div></div>
		</div>
	</div>

</div>
</div><div id="imFooter_imTextObject_12_wrapper" class="template-object-wrapper"><div id="imFooter_imTextObject_12">
	<div data-index="0"  class="text-tab-content grid-prop current-tab "  id="imFooter_imTextObject_12_tab0" style="opacity: 1; " role="tabpanel" tabindex="0">
		<div class="text-inner">
			<div><div data-text-align="start"><span class="cf1">Destek &amp; Politikalar</span><span class="cf1"><br></span></div><div data-text-align="start"><span class="cf1"><br></span><div data-text-align="start"><span class="cf1"><span><a href="../hakkimizda-iletisim.html" class="imCssLink" onclick="return x5engine.utils.location('../hakkimizda-iletisim.html', null, false)">İletişim &amp; Destek</a></span></span><span class="cf1"><br></span><span class="cf1"><span><a href="../gizlilik-politikasi.html" class="imCssLink" onclick="return x5engine.utils.location('../gizlilik-politikasi.html', null, false)">Gizlilik Politikası</a></span></span><span class="cf1"><br></span><span class="cf1"><span><a href="../cerez-politikasi.html" class="imCssLink" onclick="return x5engine.utils.location('../cerez-politikasi.html', null, false)">Çerez Politikası</a></span></span><span class="cf1"><br></span><span class="cf1"><span><a href="../kvkk-aydinlatma-metni.html" class="imCssLink" onclick="return x5engine.utils.location('../kvkk-aydinlatma-metni.html', null, false)">KVKK Aydınlatma Metni</a></span></span><br></div></div></div>
		</div>
	</div>

</div>
</div><div id="imFooter_imTextObject_13_wrapper" class="template-object-wrapper"><div id="imFooter_imTextObject_13">
	<div data-index="0"  class="text-tab-content grid-prop current-tab "  id="imFooter_imTextObject_13_tab0" style="opacity: 1; " role="tabpanel" tabindex="0">
		<div class="text-inner">
			<div><div data-text-align="start"><span class="cf1">Keşfet<br></span></div><div data-text-align="start"><span class="cf1"><br></span><div data-text-align="start"><span class="cf1"><a href="../blog/" class="imCssLink">Blog</a><br></span><br></div></div></div>
		</div>
	</div>

</div>
</div><div id="imFooter_imObjectImage_09_wrapper" class="template-object-wrapper"><div id="imFooter_imObjectImage_09"><div id="imFooter_imObjectImage_09_container"><a href="../index.html" onclick="return x5engine.utils.location('../index.html', null, false)"><img src="../images/sezen-medya_xpcduc5c.webp" alt="" width="130" height="21" />
</a></div></div></div><div id="imFooter_imTextObject_08_wrapper" class="template-object-wrapper"><div id="imFooter_imTextObject_08">
	<div data-index="0"  class="text-tab-content grid-prop current-tab "  id="imFooter_imTextObject_08_tab0" style="opacity: 1; " role="tabpanel" tabindex="0">
		<div class="text-inner">
			<div><div><span class="cf1">© 2026 Sezen Medya. Tüm hakları saklıdır. <span><a href="../gizlilik-politikasi.html" class="imCssLink" onclick="return x5engine.utils.location('../gizlilik-politikasi.html', null, false)">Gizlilik Politikası</a></span> | <span><a href="../cerez-politikasi.html" class="imCssLink" onclick="return x5engine.utils.location('../cerez-politikasi.html', null, false)">Çerez Politikası</a></span> | <span><a href="../kvkk-aydinlatma-metni.html" class="imCssLink" onclick="return x5engine.utils.location('../kvkk-aydinlatma-metni.html', null, false)">KVKK Aydınlatma Metni</a></span></span></div></div>
		</div>
	</div>

</div>
</div></div>
					</footer>
				</div>
				<span data-nosnippet class="screen-reader-only-even-focused" style="bottom: 0;"><a href="#imGoToCont" title="Bu sayfayı tekrar okuyun">İçeriğe dön</a></span>
			</div>
		</div>
		<div id="install_banner">
			<div id="install_banner_inner">
				<div id="install_siteicon_container">
					<img id="install_siteicon" src="../images/pwaIcon192.png" alt="Uygulama simgesi">
				</div>
				<div id="install_info_container">
					<span id="install_title">Sezen Medya – Canlı TV, Radyo ve Hesaplama Araçları</span>
					<span id="install_text_1">Ana ekranınıza daha iyi bir deneyim için bu uygulamayı yükleyin</span>
					<div id="install_button_container">
						<button type="button" id="install_button">Yükle</button>
					</div>
					<span id="install_text_2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="vertical-align: text-bottom;" aria-labelledby="ios_install_button_title" role="img" viewBox="10 5 30 35" enable-background="new 0 0 50 50"><title id="ios_install_button_title">iOS'ta yükleme düğmesi</title><path d="M30.3 13.7L25 8.4l-5.3 5.3-1.4-1.4L25 5.6l6.7 6.7z"/><path d="M24 7h2v21h-2z"/><path d="M35 40H15c-1.7 0-3-1.3-3-3V19c0-1.7 1.3-3 3-3h7v2h-7c-.6 0-1 .4-1 1v18c0 .6.4 1 1 1h20c.6 0 1-.4 1-1V19c0-.6-.4-1-1-1h-7v-2h7c1.7 0 3 1.3 3 3v18c0 1.7-1.3 3-3 3z"/></svg> öğesine dokunun, ardından "Ekranınıza ekleyin"</span>
				</div>
				<button type="button" id="install_close" aria-label="Kapalı">X</button>
			</div>
		</div>
		<noscript class="imNoScript"><div class="alert alert-red">Bu web sitesini kullanmak için JavaScript'i etkinleştirmeniz gerekir.</div></noscript>
	</body>
</html>
