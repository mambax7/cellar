<{if $wineRows > 0}>
    <div class="outer">
        <form name="select" action="wine.php?op=" method="POST"
              onsubmit="if(window.document.select.op.value =='') {return false;} else if (window.document.select.op.value =='delete') {return deleteSubmitValid('wineId[]');} else if (isOneChecked('wineId[]')) {return true;} else {alert('<{$smarty.const.AM_WINE_SELECTED_ERROR}>'); return false;}">
            <input type="hidden" name="confirm" value="1"/>
            <div class="floatleft">
                <select name="op">
                    <option value=""><{$smarty.const.AM_CELLAR_SELECT}></option>
                    <option value="delete"><{$smarty.const.AM_CELLAR_SELECTED_DELETE}></option>
                </select>
                <input id="submitUp" class="formButton" type="submit" name="submitselect" value="<{$smarty.const._SUBMIT}>" title="<{$smarty.const._SUBMIT}>"/>
            </div>
            <div class="floatcenter0">
                <div id="pagenav"><{$pagenav}></div>
            </div>


            <table class="$wine" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th align="center" width="5%"><input name="allbox" title="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" title="Check All" value="Check All"/></th>
                    <th class="center"><{$selectorid}></th>
                    <th class="center"><{$selectorname}></th>
                    <th class="center"><{$selectoryear}></th>
                    <th class="center"><{$selectorgrapes}></th>
                    <th class="center"><{$selectorcountry}></th>
                    <th class="center"><{$selectorregion}></th>
                    <th class="center"><{$selectordescription}></th>
                    <th class="center"><{$selectorpicture}></th>

                    <th class="center width5"><{$smarty.const.AM_CELLAR_FORM_ACTION}></th>
                </tr>
                <{foreach item=wineArray from=$wineArrays}>
                    <tr class="<{cycle values="odd,even"}>">

                        <td align="center" style="vertical-align:middle;"><input type="checkbox" name="wine_id[]" title="wine_id[]" id="wine_id[]" value="<{$wineArray.wine_id}>"/></td>
                        <td class='center'><{$wineArray.id}></td>
                        <td class='center'><{$wineArray.name}></td>
                        <td class='center'><{$wineArray.year}></td>
                        <td class='center'><{$wineArray.grapes}></td>
                        <td class='center'><{$wineArray.country}></td>
                        <td class='center'><{$wineArray.region}></td>
                        <td class='center'><{$wineArray.description}></td>
                        <td class='center'><{$wineArray.picture}></td>


                        <td class="center width5"><{$wineArray.edit_delete}></td>
                    </tr>
                <{/foreach}>
            </table>
            <br>
            <br>
            <{else}>
            <table width="100%" cellspacing="1" class="outer">
                <tr>

                    <th align="center" width="5%"><input name="allbox" title="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" title="Check All" value="Check All"/></th>
                    <th class="center"><{$selectorid}></th>
                    <th class="center"><{$selectorname}></th>
                    <th class="center"><{$selectoryear}></th>
                    <th class="center"><{$selectorgrapes}></th>
                    <th class="center"><{$selectorcountry}></th>
                    <th class="center"><{$selectorregion}></th>
                    <th class="center"><{$selectordescription}></th>
                    <th class="center"><{$selectorpicture}></th>

                    <th class="center width5"><{$smarty.const.AM_CELLAR_FORM_ACTION}></th>
                </tr>
                <tr>
                    <td class="errorMsg" colspan="11">There are no $wine</td>
                </tr>
            </table>
    </div>
    <br>
    <br>
<{/if}>
