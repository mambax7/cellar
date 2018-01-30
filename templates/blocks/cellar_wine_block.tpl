<table class="outer">
    <tr class="head">
        <th><{$smarty.const.MB_CELLAR_ID}></th>
        <th><{$smarty.const.MB_CELLAR_NAME}></th>
        <th><{$smarty.const.MB_CELLAR_YEAR}></th>
        <th><{$smarty.const.MB_CELLAR_GRAPES}></th>
        <th><{$smarty.const.MB_CELLAR_COUNTRY}></th>
        <th><{$smarty.const.MB_CELLAR_REGION}></th>
        <th><{$smarty.const.MB_CELLAR_DESCRIPTION}></th>
        <th><{$smarty.const.MB_CELLAR_PICTURE}></th>
    </tr>
    <{foreach item=wine from=$block}>
    <tr class="<{cycle values = 'even,odd'}>">
        <td>
            <{$wine.id}>
            <{$wine.name}>
            <{$wine.year}>
            <{$wine.grapes}>
            <{$wine.country}>
            <{$wine.region}>
            <{$wine.description}>
            <{$wine.picture}>
        </td>
    </tr>
    <{/foreach}>
</table>
