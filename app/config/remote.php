
<!-- saved from url=(0067)https://raw.github.com/laravel/laravel/master/app/config/remote.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;">&lt;?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Default Remote Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify the default connection that will be used for SSH
	| operations. This name should correspond to a connection name below
	| in the server list. Each connection will be manually accessible.
	|
	*/

	'default' =&gt; 'production',

	/*
	|--------------------------------------------------------------------------
	| Remote Server Connections
	|--------------------------------------------------------------------------
	|
	| These are the servers that will be accessible via the SSH task runner
	| facilities of Laravel. This feature radically simplifies executing
	| tasks on your servers, such as deploying out these applications.
	|
	*/

	'connections' =&gt; array(

		'production' =&gt; array(
			'host'      =&gt; '',
			'username'  =&gt; '',
			'password'  =&gt; '',
			'key'       =&gt; '',
			'keyphrase' =&gt; '',
			'root'      =&gt; '/var/www',
		),

	),

	/*
	|--------------------------------------------------------------------------
	| Remote Server Groups
	|--------------------------------------------------------------------------
	|
	| Here you may list connections under a single group name, which allows
	| you to easily access all of the servers at once using a short name
	| that is extremely easy to remember, such as "web" or "database".
	|
	*/

	'groups' =&gt; array(

		'web' =&gt; array('production')

	),

);</pre><div class="drop-hint" id="drop-to-share-hint" style="display: none; background-image: url(chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/dropToShareHint.png); background-size: 67px 327px;"><a class="share-btn-close"></a><a class="btn-options"></a><div class="drop-hint-bubble" id="drop-hint-bubble-share" style="display: none; background-image: url(chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/dropToShareHintBubble.png); background-size: 253px 79px;"></div></div><div class="drop-hint" id="drop-to-search-hint" style="display: none; background-image: url(chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/dropToSearchHint.png); background-size: 67px 327px;"><a class="search-btn-close"></a><a class="btn-options"></a><div class="drop-hint-bubble" id="drop-hint-bubble-search" style="display: none; background-image: url(chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/dropToSearchHintBubble.png); background-size: 215px 79px;"></div></div><div class="dropAreaContainer" style="display: none; right: 0px;"><div class="searchDropArea" style="width: 142px; height: 174px; background-color: rgba(220, 220, 220, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/providers/web-search-content.png" width="91" height="81" class="disable-manipulations" style="background-color: transparent;"></div><div class="searchDropArea" style="width: 142px; height: 174px; background-color: rgba(240, 240, 240, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/providers/video-search-content.png" width="111" height="40" class="disable-manipulations" style="background-color: transparent;"></div><div class="searchDropArea" style="width: 142px; height: 174px; background-color: rgba(220, 220, 220, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/providers/google-images-content.png" width="102" height="88" class="disable-manipulations" style="background-color: transparent;"></div><div class="searchDropArea" style="width: 142px; height: 174px; background-color: rgba(240, 240, 240, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/providers/google-translate-content.png" width="111" height="82" class="disable-manipulations" style="background-color: transparent;"></div><div class="searchDropArea" style="width: 142px; height: 174px; background-color: rgba(220, 220, 220, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/providers/wikipedia-content.png" width="70" height="86" class="disable-manipulations" style="background-color: transparent;"></div><div class="dropAreaSettings" style="width: 142px; height: 82px; background-color: rgba(58, 58, 58, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/btn_settings.png" width="108" height="25" class="disable-manipulations" style="background-color: transparent;"></div></div><div class="dropAreaContainer" style="display: none; left: 0px;"><div class="shareDropArea" style="width: 142px; height: 174px; background-color: rgba(60, 90, 152, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/providers/facebook-share-content.png" width="119" height="25" class="disable-manipulations" style="background-color: transparent;"></div><div class="shareDropArea" style="width: 142px; height: 174px; background-color: rgba(233, 246, 255, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/providers/twitter-content.png" width="120" height="23" class="disable-manipulations" style="background-color: transparent;"></div><div class="shareDropArea" style="width: 142px; height: 174px; background-color: rgba(235, 235, 235, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/providers/pinterest-content.png" width="112" height="28" class="disable-manipulations" style="background-color: transparent;"></div><div class="shareDropArea" style="width: 142px; height: 174px; background-color: rgba(58, 58, 58, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/providers/google-plus-center-content.png" width="67" height="56" class="disable-manipulations" style="background-color: transparent;"></div><div class="shareDropArea" style="width: 142px; height: 174px; background-color: rgba(248, 248, 248, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/providers/linkedin-content.png" width="111" height="31" class="disable-manipulations" style="background-color: transparent;"></div><div class="dropAreaSettings" style="width: 142px; height: 82px; background-color: rgba(58, 58, 58, 0.901961);"><span class="disable-manipulations"></span><img src="chrome-extension://cipmepknanmbbaneimacddfemfbfgpgo/images/content/btn_settings.png" width="108" height="25" class="disable-manipulations" style="background-color: transparent;"></div></div></body></html>