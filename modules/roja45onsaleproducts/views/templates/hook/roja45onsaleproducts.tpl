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

<div id="on_sale_products_block_right" class="block products_block">
    <h4 class="title_block"><a href="{$link->getPageLink('onsale-products')|escape:'htmlall':'UTF-8'}"
                               title="{l s='On Sale products' mod='roja45onsaleproducts'}">{l s='On Sale products' mod='roja45onsaleproducts'}</a>
    </h4>
    <div class="block_content products-block">
        {if $onsale_products !== false || ({$PS_ROJA45_ONSALEPRODUCTS_DISPLAY==1})}
        <ul class="products-block-image clearfix">
            {foreach from=$onsale_products item=product name=onsaleproducts}
                <li class="clearfix{if $smarty.foreach.onsaleproducts.last} last_item{elseif $smarty.foreach.onsaleproducts.first} first_item{else} item{/if}">
                    <a class="products-block-image"
                       href="{$product.link|escape:'htmlall':'UTF-8'}"
                       title="{$product.legend|escape:'htmlall':'UTF-8'}">
                        <img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'medium_default')|escape:'htmlall':'UTF-8'}"
                             height="{$mediumSize.height|escape:'htmlall':'UTF-8'}"
                             width="{$mediumSize.width|escape:'htmlall':'UTF-8'}"
                             alt="{$product.legend|escape:'htmlall':'UTF-8'}"/>
                    </a>
                    <div class="product-content">
                        <h5>
                            <a class="product-name"
                               href="{$product.link|escape:'htmlall':'UTF-8'}"
                               title="{l s='More about %s' mod='onsaleproducts' sprintf=[$product.name|escape:'html':'UTF-8']}">
                                {$product.name|truncate:25:'...'|escape:'html':'UTF-8'}
                            </a>
                        </h5>
                        <p class="product-description">{$product.description_short|strip_tags:'UTF-8'|truncate:40}</p>
                    </div>
                </li>
            {/foreach}
            </ul>
            <p><a href="{$roja45_onsaleproducts_controller|escape:'htmlall':'UTF-8'}"
                  title="{l s='All on sale products' mod='roja45onsaleproducts'}"
                  class="btn btn-default button button-small">&raquo; {l s='All on sale products' mod='roja45onsaleproducts'}</a></p>
        {else}
            <p>&raquo; {l s='No products on sale at this time.' mod='roja45onsaleproducts'}</p>
        {/if}
    </div>
</div>
