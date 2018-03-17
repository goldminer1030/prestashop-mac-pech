{**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div id="js-product-list">
  <div class="products row">
    {if $manufacturers|count > 0}
    <div class="col-lg-3 col-sm-12 col-xs-12 no-right-padding-lg">
      <div id="search_filters">
        <h4 class="filter-by-brand-title text-center text-uppercase">filtrer<br>par marque</h4>
          <ul id="filter-by-brand-block">
            {foreach from=$manufacturers item=manufacturer}
              <li class="filter-by-brand">
                <div class="filter-wrapper">
                  <a class="brand-img" href="" data-brand-id="{$manufacturer.id_manufacturer}"><img src="{$manufacturer.image}" title="{$manufacturer.name|escape:'html':'UTF-8'}" alt="{$manufacturer.name|escape:'html':'UTF-8'}"/></a>
                  <a class="brand-name" href="" data-brand-id="{$manufacturer.id_manufacturer}">{$manufacturer.name|escape:'html':'UTF-8'}</a>
                </div>
              </li>
            {/foreach}
          </ul>
      </div>
    </div>
    <div class="col-lg-9 col-sm-12 col-xs-12 no-right-padding-lg">
    {/if}
    {foreach from=$listing.products item="product"}
      {block name='product_miniature'}
        {include file='catalog/_partials/miniatures/product.tpl' product=$product}
      {/block}
    {/foreach}
    {if $manufacturers|count > 0}
    </div>
    {/if}
  </div>

  {block name='pagination'}
    {include file='_partials/pagination.tpl' pagination=$listing.pagination}
  {/block}

  <div class="hidden-md-up text-xs-right up">
    <a href="#header" class="btn btn-secondary">
      {l s='Back to top' d='Shop.Theme.Actions'}
      <i class="material-icons">&#xE316;</i>
    </a>
  </div>
</div>
