

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
	<script type="text/javascript" src="http://cdn1.static.pornhub.phncdn.com/js/Silverlight.js"></script>
	<script type="text/javascript" src="http://cdn1.static.pornhub.phncdn.com/js/jquery.tokeninput.js?cache=2012112801"></script>
	<script type="text/javascript" src="http://cdn1.static.pornhub.phncdn.com/js/jquery.tinyscrollbar.js?cache=2012091901"></script>

	<script type="text/javascript" src="http://cdn1.static.pornhub.phncdn.com/js/phub.js?cache=2013021401"></script>
	<script type="text/javascript" src="http://cdn1.static.pornhub.phncdn.com/js/signin.js?cache=2013011201"></script>
	<script type="text/javascript" src="./js/newbar.js?cache=2012120401"></script>
	<script type="text/javascript" src="http://cdn1.static.pornhub.phncdn.com/js/playlist/playlist.js?cache=2013020801"></script>

	<script type="text/javascript">
		var largeVersionMinimumScreenSize = 1900;
		var bodyHeight = parseInt($j("body").css("height"));
		var boxThWidth = parseInt($j("#boxThSel").css("width"));
		var windowWidth, boxFade, marginValue;
		function fadeObject (elementFade , value) {
			$j(elementFade).animate({
				opacity: value
			}, 1000 );
		}
		function ignoreCloseThAlert(cookieName) {
			setCookie(cookieName, 1);
			fadeOut('#boxThSel' , 0);
			fadeOut('#bkgContainer' , 0);
			$j("#boxThSel").css("display" , "none");
			$j("#bkgContainer").css("display" , "none");
		}
		function fadeOut(boxToFade , numberValue) {
			fadeObject (boxToFade , numberValue);
			return false;
		}
		function positionBox(marginValue) {
			if($j(window).width() > 965 ){
				windowWidth = $j(window).width();
				$j("#boxThSel").css("margin-left", (windowWidth /2 ) - (boxThWidth - marginValue) + "px");
			}
		}
		var resizeTimeout;
		function checkSize(e) {
			if( resizeTimeout ) {
				clearTimeout(resizeTimeout);
			}
			resizeTimeout = setTimeout( function() {
				if ($j(window).width() > 1900) {
					_gaq.push(['_setCustomVar', 1, 'Browser Window', 'Over 1900', 1]);
				} else if ($j(window).width() > 1600) {
					_gaq.push(['_setCustomVar', 1, 'Browser Window', 'Over 1600', 1]);
				}

				resizeTimeout = null;
			}, 100 );
		}
		$j(window).resize( checkSize );
		$j(document).mouseup(function(e) {
			if ($j('#boxThSel').is(':visible')) { if ($j('#boxThSel').has(e.target).length == 0) { ignoreCloseThAlert(); } }
		});
		checkSize();


	</script>

	<script type="text/javascript">
		$j('body').ph_bar({'isGay':false, 'site':'phub'});
		screensize = window.screen.width;
		// Thumbnail fetching:
		function loadThumbs() {
			var thumbToUse = parseInt(screensize) < largeVersionMinimumScreenSize ? 'smallthumb' : 'mediumthumb';
			$j('img[data-smallthumb]').each( function(e) {
				$this = $j(this);
				if ($this.attr('src') != $this.data(thumbToUse)) {
					$this.attr('src', $this.data(thumbToUse));
				}
			});
		}
		loadThumbs();
	</script>
		<script type="text/javascript">
				var counter = {
			'obj' : null,
			'date' : {
				'timer'	: 354704800,
				'perSecond' : 29			},
			'tempo' : 2,
			'interval' : 4,
			'timeout' : null,
			'tick'	: function() {
				var inc = 0;
				// I prefer to do it (tempo) times than just to multiply by it, so that the randomness is more natural.
				for(var loop=0;loop<this.tempo;loop++) {
					inc += this.date.perSecond - Math.floor( Math.random()*2);
				}
				this.date.timer += inc;
				this.timeout = setTimeout(function(){counter.tick();}, this.tempo*1000);
			},
			'animate' : function() {
				var value = String(counter.date.timer).split('').reverse();
				this.obj.find('.digit').each( function(index) {
					$this = $j(this);
					$this.children('span').eq(1).text(value[7-index]?value[7-index]:0);
					if( $this.children('span').eq(0).text() != $this.children('span').eq(1).text() ) {
						$this.delay((8-index)*100).animate({'margin-top':-($this.height()/2)},300,'linear',function(e) {
							$this = $j(this);
							$this.children('span').eq(0).text(value[7-index]?value[7-index]:0);
							$this.css('margin-top',0);
						});
					}
				});
				this.timeout = setTimeout(function(){counter.animate();}, this.interval*1000+(Math.random()*3000));
			},
			'start' : function(obj) {
				this.obj = $this = obj;
				counter.tick();
				var value = String(counter.date.timer).split('').reverse();
				this.obj.find('.digit').each( function(index) {
					$this = $j(this);
					val = value[7-index]?value[7-index]:0
					$this.append('<span>'+val+'</span><span>'+val+'</span>');
				});
				counter.animate();
			}
		};
		$j(document).ready( function() {
			if( $j('#counter-wrapper').length ) {
				$j('#counter-wrapper').html('				<div class="layer">\
					<div class="number-box"></div><div class="number-box"></div><div class="number-box"></div><div class="number-box"></div><div class="number-box"></div><div class="number-box"></div><div class="number-box"></div><div class="number-box"></div>\
				</div>\
				<div class="layer">\
					<div class="digit"></div><div class="digit"></div><div class="digit"></div><div class="digit"></div><div class="digit"></div><div class="digit"></div><div class="digit"></div><div class="digit"></div>\
				</div>\
				<p id="sofar">boob views</p>');
				//counter.start( $j('#counter-wrapper') );
			}
		});
	</script>