<div class="header">
    <span class="left"><b><{$smarty.const.MD_CELLAR_TITLE}></b>&#58;&#160;</span>
    <span class="left"><{$smarty.const.MD_CELLAR_DESC}></span><br>
</div>
<div class="head">
    <{if $adv != ''}>
        <div class="center"><{$adv}></div>
    <{/if}>
</div>
<br>
<ul class="nav nav-pills">
    <li class="active"><a href="<{$cellar_url}>"><{$smarty.const.MD_CELLAR_INDEX}></a></li>

    <li><a href="<{$cellar_url}>/wine.php"><{$smarty.const.MD_CELLAR_WINE}></a></li>
</ul>

<br>
