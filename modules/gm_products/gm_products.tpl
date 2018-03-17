{*
*
*  @author goldminer1030
*}
<div class="gm_products">
  {foreach from=$products item="product"}
  <div class="footer-product-wrapper">
    <div class="footer-product">
      <a href="{$product.url}" class="footer-product-thumbnail">
        <img
          src = "{$product.cover.bySize.home_default.url}"
          alt = "{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:30:'...'}{/if}"
        >
      </a>
      <div class="footer-product-desc">
        <a class="footer-product-title" href="{$product.url}">{$product.name|truncate:15:'...'}</a>
        <span itemprop="price" class="footer-product-price">{$product.price}</span>
      </div>
    </div>
  </div>
  {/foreach}
</div>
