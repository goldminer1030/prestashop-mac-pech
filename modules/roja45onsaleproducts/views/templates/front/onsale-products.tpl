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

{capture name=path}{l s='On Sale Products' mod='roja45onsaleproducts'}{/capture}

<div class="row">

    <h1 class="page-heading product-listing">{l s='On Sale Products' mod='roja45onsaleproducts'}</h1>

    {if $products}
        <div class="content_sortPagiBar">
            <div class="sortPagiBar clearfix">
                {include file="$tpl_dir./product-sort.tpl"}
                {include file="$tpl_dir./nbr-product-page.tpl"}
            </div>
            <div class="top-pagination-content clearfix">
                {include file="$tpl_dir./product-compare.tpl"}
                {include file="$tpl_dir./pagination.tpl"}
            </div>
        </div>
        {include file="$tpl_dir./product-list.tpl" products=$products}
        <div class="content_sortPagiBar">
            <div class="bottom-pagination-content clearfix">
                {include file="$tpl_dir./product-compare.tpl"}
                {include file="$tpl_dir./pagination.tpl" paginationId='bottom'}
            </div>
        </div>
    {else}
        <p class="alert alert-warning">{l s='No Products On Sale' mod='roja45onsaleproducts'}</p>
    {/if}
