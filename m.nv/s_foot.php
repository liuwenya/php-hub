<?php include_once('./ad_foot.ad') ?>

<?php 
$p_str = $html->find('div[class=str]',0);
foreach($p_str->find('img') as $element){
	$element->src = str_replace('http://static.nuvid.com/templates/frontend/mobile','.',$element->src);
}
$p_str = str_replace($uh.'/search','./search.php',$p_str);

echo $p_str;

$u_action = str_replace('/','',$html->find('div[class=inf]',0)->find('form',0)->action);
?>
 <div class="inf">
<form name="f_go" id="f_go" action="." method="GET">
	<input type="hidden" name="up" id="up" value=""/>
        <input class="inp2" type="text" name="page" id="page" value="Go to page ..."  onBlur="if(this.value=='') this.value='Go to page ...';" onFocus="if(this.value=='Go to page ...') this.value='';" />
<a href="javascript:javascript:document.location ='./search.php?keyword=<?php echo $kw; ?>&page='+document.getElementById('page').value;" title=""><img src="./images/next.gif" alt="" /></a>
        <div class="clear"></div>
    </div>