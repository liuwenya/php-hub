﻿<?php
include_once('../dom/simple_html_dom.php');
include_once('./imgcache.php');

$uh = 'http://www.nuvid.com';
$mh = 'http://m.nuvid.com';
$up = '';
$u = $uh;
$img = '';


if(isset($_GET['u'])){
	$up = urldecode($_GET['u']);
	$u = $u.$up;
}

if(isset($_GET['t'])){
	$title = urldecode($_GET['t']);
}

if(isset($_GET['img'])){
	$img = urldecode($_GET['img']);
}

$p = explode('/',$up);
$p = $p[2];
$vu = $uh.'/embed/'.$p;
$mu = $mh.'/download/'.$p;



$mhtml = file_get_html($mu);
$mp4 = $mhtml->find('div[class=pad]',0)->find('a',0)->href;
?>
<!DOCTYPE html>
<html lang="zh-Hans">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            html5 video
        </title>
    </head>
    
    <body>
        <h2>
            video 1
        </h2>
        <div class="player" data-engine="flash">
            <video style="display:block;width:520px;height:330px"  controls="controls" width="500" height="500" poster="<?echo $img ?>">
                <source src="<?php echo $mp4; ?>"
                type="video/mp4" />
            </video>

        </div>
        <script type="text/javascript">
            var config = {
                "video": {
                    "type": "video/mp4"
                },
                "flash": {
                    "player_uri": "../play/flowplayer-3.2.16.swf",
                    "need_version": "10,0,0,0",
                    "autoBuffering": true,
                    "html_when_no_flash": "<a target=\"_blank\" href=\"http://www.adobe.com/go/getflash\"><img height=\"39\" width=\"158\" src=\"http://www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png\" alt=\"Get Adobe Flash player\" /></a>"
                }
            };
            function checkFlashVersion() {
                var flash_html = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=need_version" width="0" height="0" data="player_uri"><param name="src" value="player_uri" /></object>';
                flash_html = flash_html.replace(/player_uri/g, config.flash.player_uri);
                flash_html = flash_html.replace(/need_version/g, config.flash.need_version);
                var div_element = document.createElement('div');
                div_element.style.width = '0';
                div_element.style.height = '0';
                div_element.innerHTML = flash_html;
                document.body.appendChild(div_element);
            }
            function isVideoCanPlay(video_type) {
                var video_element = document.createElement('video');
                if (typeof(video_element.canPlayType) == 'undefined') {
                    return false;
                }
                var result = video_element.canPlayType(video_type);
                if ((result == 'probably') || (result == 'maybe')) {
                    return true;
                }
                return false;
            }

            function addFlashVideoPlayer() {
                var source_nodes = document.getElementsByTagName('source');
                for (var i = 0,
                l = source_nodes.length; i < l; i++) {
                    if (source_nodes[i].type.indexOf(config.video.type) != -1) {
                        if (source_nodes[i].parentNode.tagName.toLowerCase() == 'video') //Firefox,Chrome,IE9
                        {
                            var video_element = source_nodes[i].parentNode;
                            var video_element_container = video_element.parentNode;
                            var autoplay = video_element.autoplay;
                        } else { //IE876
                            var div_element = source_nodes[i].parentNode;
                            var video_element = div_element.getElementsByTagName('video')[0];
                            var video_element_container = div_element;
                            var autoplay = typeof(video_element.autoplay) == 'undefined' ? false: true;
                        }

                        var params = {

                            "flashvars": "config={&quot;playerId&quot;:&quot;player&quot;,&quot;clip&quot;:{&quot;url&quot;:&quot;video_file_url&quot;},&quot;playlist&quot;:[&quot;poster_file_url&quot;,{&quot;url&quot;:&quot;video_file_url&quot;,&quot;scaling&quot;:&quot;fit&quot;,&quot;autoPlay&quot;:autoPlay_value,&quot;autoBuffering&quot;:autoBuffering_value}]}",
                            "src": config.flash.player_uri
                        };
                        params.flashvars = params.flashvars.replace(/video_file_url/g, source_nodes[i].src);
                        params.flashvars = params.flashvars.replace(/poster_file_url/g, video_element.poster);
                        params.flashvars = params.flashvars.replace(/autoPlay_value/g, autoplay);
                        params.flashvars = params.flashvars.replace(/autoBuffering_value/g, config.flash.autoBuffering);

                        var width = video_element.width;
                        var height = video_element.height;
                        var attributes = {
                            "data": config.flash.player_uri,
                            "width": width,
                            "height": height
                        };
                        var flash_html = createFlashObjectHTML(attributes, params);
                        var div_element = document.createElement('div');
                        div_element.style.width = width;
                        div_element.style.height = height;
                        div_element.innerHTML = flash_html;
                        video_element_container.insertBefore(div_element, video_element);
                        video_element.style.display = "none";
                    }
                }
            }
            function createFlashObjectHTML(attributes, params) {
                var flash_html = '<object height="attribute_height" width="attribute_width" type="application/x-shockwave-flash" data="attribute_data"><param name="flashvars" value="param_flashvars" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="quality" value="high" /><param name="cachebusting" value="false" /><param name="bgcolor" value="#000000" /><param name="src" value="param_src" />html_when_no_flash</object>';
                flash_html = flash_html.replace(/attribute_height/g, attributes.height);
                flash_html = flash_html.replace(/attribute_width/g, attributes.width);
                flash_html = flash_html.replace(/attribute_data/g, attributes.data);
                flash_html = flash_html.replace(/param_flashvars/g, params.flashvars);
                flash_html = flash_html.replace(/param_src/g, params.src);
                flash_html = flash_html.replace(/html_when_no_flash/g, config.flash.html_when_no_flash);
                return flash_html;
            }

            if (isVideoCanPlay(config.video.type) == false) {
                checkFlashVersion();
                addFlashVideoPlayer();
            }
        </script>
    </body>
</html>