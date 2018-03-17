{*
* 2016 ROJA45.COM
* All rights reserved.
*
* DISCLAIMER
*
* Changing this file will render any support provided by us null and void.
*
*  @author 			Roja45 <support@roja45.com>
*  @copyright  		2016 roja45.com
*}
{if isset($onsale_products) && $onsale_products}
    {include file="$tpl_dir./product-list.tpl" products=$onsale_products class='roja45onsaleproducts tab-pane' id='roja45onsaleproducts'}
{else}
    <ul id="roja45onsaleproducts" class="roja45onsaleproducts tab-pane">
        <li class="alert alert-info">{l s='No products are on sale at this time.' mod='roja45onsaleproducts'}</li>
    </ul>
{/if}
