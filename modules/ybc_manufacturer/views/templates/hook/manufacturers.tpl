{if $manufacturers}
    <div id="ybc-mnf-block">
        <h4 class="ybc-mnf-block-title"><span class="title_cat">{$YBC_MF_TITLE}</span></h4>
        <ul id="ybc-mnf-block-ul">
        	{foreach from=$manufacturers item=manufacturer}
        		<li class="ybc-mnf-block-li">
                    <a class="ybc-mnf-block-a-img" href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'html'}"><img src="{$manufacturer.image}" title="{$manufacturer.name|escape:'html':'UTF-8'}" alt="{$manufacturer.name|escape:'html':'UTF-8'}"/></a>
                    {if $YBC_MF_SHOW_NAME}<a class="ybc-mnf-block-a-name" href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'html'}">{$manufacturer.name|escape:'html':'UTF-8'}</a>{/if}
                </li>
        	{/foreach}
        </ul>
    </div>
{/if}
<script type="text/javascript">
    var YBC_MF_PER_ROW = {$YBC_MF_PER_ROW};
</script>