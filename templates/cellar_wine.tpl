<{include file="db:cellar_header.tpl"}>
<div class="panel panel-info">
    <div class="panel-heading"><h2 class="panel-title">Wine </h2></div>

    <table class="table table-striped">
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td><{$smarty.const.MD_CELLAR_WINE_ID}></td>
            <td><{$wine.id}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_CELLAR_WINE_NAME}></td>
            <td><{$wine.name}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_CELLAR_WINE_YEAR}></td>
            <td><{$wine.year}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_CELLAR_WINE_GRAPES}></td>
            <td><{$wine.grapes}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_CELLAR_WINE_COUNTRY}></td>
            <td><{$wine.country}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_CELLAR_WINE_REGION}></td>
            <td><{$wine.region}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_CELLAR_WINE_DESCRIPTION}></td>
            <td><{$wine.description}></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_CELLAR_WINE_PICTURE}></td>
            <td><img src="<{$xoops_url}>/uploads/cellar/images/<{$wine.picture}>" alt="wine"></td>
        </tr>
        <tr>
            <td><{$smarty.const.MD_CELLAR_ACTION}></td>
            <td>
                <!--<a href="wine.php?op=view&id=<{$wine.id}>" title="<{$smarty.const._PREVIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._PREVIEW}>" title="<{$smarty.const._PREVIEW}>"</a>    &nbsp;-->
                <{if $xoops_isadmin == true}>
                    <a href="admin/wine.php?op=edit&id=<{$wine.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>" title="<{$smarty.const._EDIT}>"/></a>
                    &nbsp;
                    <a href="admin/wine.php?op=delete&id=<{$wine.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>" title="<{$smarty.const._DELETE}>"</a>
                <{/if}>
            </td>
        </tr>
        </tbody>

    </table>
</div>
<div id="pagenav"><{$pagenav}></div>
<{$commentsnav}> <{$lang_notice}>
<{if $comment_mode == "flat"}> <{include file="db:system_comments_flat.tpl"}> <{elseif $comment_mode == "thread"}> <{include file="db:system_comments_thread.tpl"}> <{elseif $comment_mode == "nest"}> <{include file="db:system_comments_nest.tpl"}> <{/if}>
<{include file="db:cellar_footer.tpl"}>
