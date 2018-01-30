<{include file="db:cellar_header.tpl"}>
<div class="panel panel-info">
    <div class="panel-heading"><h2 class="panel-title"><strong>Wine</strong></h2></div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th><{$smarty.const.MD_CELLAR_WINE_ID}></th>
            <th><{$smarty.const.MD_CELLAR_WINE_NAME}></th>
            <th><{$smarty.const.MD_CELLAR_WINE_YEAR}></th>
            <th><{$smarty.const.MD_CELLAR_WINE_GRAPES}></th>
            <th><{$smarty.const.MD_CELLAR_WINE_COUNTRY}></th>
            <th><{$smarty.const.MD_CELLAR_WINE_REGION}></th>
            <th><{$smarty.const.MD_CELLAR_WINE_DESCRIPTION}></th>
            <th><{$smarty.const.MD_CELLAR_WINE_PICTURE}></th>
            <th><{$smarty.const.MD_CELLAR_ACTION}></th>
        </tr>
        </thead>
        <{foreach item=wine from=$wine}>
            <tbody>
            <tr>

                <td><{$wine.id}></td>
                <td><{$wine.name}></td>
                <td><{$wine.year}></td>
                <td><{$wine.grapes}></td>
                <td><{$wine.country}></td>
                <td><{$wine.region}></td>
                <td><{$wine.description}></td>
                <td><img src="<{$xoops_url}>/uploads/cellar/thumbs/<{$wine.picture}>" style="max-width:100px" alt="wine"></td>
                <td>
                    <a href="wine.php?op=view&id=<{$wine.id}>" title="<{$smarty.const._PREVIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._PREVIEW}>" title="<{$smarty.const._PREVIEW}>"</a> &nbsp;
                    <{if $xoops_isadmin == true}>
                        <a href="admin/wine.php?op=edit&id=<{$wine.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>" title="<{$smarty.const._EDIT}>"/></a>
                        &nbsp;
                        <a href="admin/wine.php?op=delete&id=<{$wine.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>" title="<{$smarty.const._DELETE}>"</a>
                    <{/if}>
                </td>
            </tr>
            </tbody>
        <{/foreach}>
    </table>
</div>
<{$pagenav}>
<{$commentsnav}> <{$lang_notice}>
<{if $comment_mode == "flat"}> <{include file="db:system_comments_flat.tpl"}> <{elseif $comment_mode == "thread"}> <{include file="db:system_comments_thread.tpl"}> <{elseif $comment_mode == "nest"}> <{include file="db:system_comments_nest.tpl"}> <{/if}>
<{include file="db:cellar_footer.tpl"}>
