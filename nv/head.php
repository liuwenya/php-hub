<link type="text/css" media="all" rel="stylesheet" href="css/all.css?v=10.71.1" ></link>
<link type="text/css" media="all" rel="stylesheet" href="form.css?v=10.71.1"  ></link>

<head><title><?php echo $title ?></title></head>

<div class="wrapper">
<div class="header">
	<h1 class="logo">
		<a href=localhost>
			b2p
		</a>
	</h1>
	<div class="section">
		<?php
			echo $html->find('strong',0);
		?>
		<div class="form-header">
			<div class="text">
				<!-- <ul id="search_select">     <li id="search_tab1" class="active"><a href="#videos" onclick="$('#search_query').val('type here to search videos...');javascript:setSearchOptions(1, 'active', 'search_type', 'videos'); return false;"><span>Videos</span></a></li>     <li id="search_tab2"><a href="#pictures" onclick="$('#search_query').val('type here to search pictures...');javascript:setSearchOptions(2, 'active', 'search_type', 'photos'); return false;"><span>Pictures</span></a></li>     <li id="search_tab3"><a href="#dvd" onclick="$('#search_query').val('type here to search dvd...');javascript:setSearchOptions(3, 'active', 'search_type', 'dvds'); return false;"><span>Dvd</span></a></li>     <li id="search_tab4"><a href="#members" onclick="$('#search_query').val('type here to search members...');javascript:setSearchOptions(4, 'active', 'search_type', 'users'); return false;"><span>Members</span></a></li>  </ul>-->
				<form action="/search" method="get" name="searchform" id="searchform"
				onsubmit="return submitSearch()">
					<input type="hidden" value="videos" name="search_type" id="search_type"
					/>
					<input type="text" name="search_query" id="search_query" class="in1" value="type here to search videos..."
					onfocus="this.value=''" onblur="" />
					<input type="button" class="btn" value="submit" id="search-button">
				</form>
			</div>
		</div>
	</div>
</div>