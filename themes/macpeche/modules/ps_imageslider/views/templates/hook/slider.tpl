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

{function name="category_tree" nodes=[] depth=0}
  {strip}
    {if $nodes|count}
      <ul class="category-sub-menu">
        {foreach from=$nodes item=node}
          <li class="{$node.select}" data-depth="{$depth}">
            {if $depth===0}
              {if $is_maindomain == 'true'}
              <a href="{$node.link}">{$node.name}</a>
              {/if}
              {if $node.children}
                {category_tree nodes=$node.children depth=$depth+1}
              {/if}
            {else}
              <a class="category-sub-link" href="{$node.link}">{$node.name}</a>
              {if $node.children}
                {category_tree nodes=$node.children depth=$depth+1}
              {/if}
            {/if}
          </li>
        {/foreach}
      </ul>
    {/if}
  {/strip}
{/function}

<div class="row">
  <div class="col-lg-3 no-right-padding-lg margin-bottom-sm">
    <div class="home_categories">
      <h2>{l s='Categories' mod='homecategories'}</h2>
      
      <div class="block-category-tree" >
        <ul class="category-top-menu">
          <li>{category_tree nodes=$categories.children}</li>
        </ul>
      </div>

      <div class="cr"></div>
    </div>
  </div>
  <div class="col-lg-9 no-left-padding-lg">
    <div class="top-link-bar-wrapper clearfix">
      <div class="top-link-bar main-domain">
        <div class="top-link-wrapper">
          <a class="top-link" href="https://www.mac-peche.fr">ACCUEIL SITE MOUCHE</a>
          <img class="top-link-image" src="{$urls.img_url}site_mouche.png" alt="main domain">
        </div>
      </div>
      <div class="top-link-bar sub-domain">
        <div class="top-link-wrapper">
          <a class="top-link" href="https://carnassier.mac-peche.fr/">ACCES SITE CARNASSIER</a>
          <img class="top-link-image" src="{$urls.img_url}site-carnassier.png" alt="sub domain">
        </div>
      </div>
    </div>
    <div class="top-banner-wrapper left-padding-lg">
    {if $page.page_name == 'category'}
      <div class="category-banner">
        <img class="cimagex" src="{$category_thumb}" alt="category thumbnail">
      </div>
      <div class="category-banner-texts">
        <h3 class="category-name">{$category_name}</h3>
        <p class="category-desc">{$category_desc|strip_tags}</p>
      </div>
    {else}
      {if $homeslider.slides}
        <div class="carousel-wrapper">
          <div id="carousel" data-ride="carousel" class="carousel slide" data-interval="{$homeslider.speed}" data-wrap="{(string)$homeslider.wrap}" data-pause="{$homeslider.pause}">
            <ul class="carousel-inner" role="listbox">
              {foreach from=$homeslider.slides item=slide name='homeslider'}
                <li class="carousel-item {if $smarty.foreach.homeslider.first}active{/if}" role="option" aria-hidden="{if $smarty.foreach.homeslider.first}false{else}true{/if}">
                  <a href="{$slide.url}">
                    <figure>
                      <img src="{$slide.image_url}" alt="{$slide.legend|escape}">
                      {if $slide.title || $slide.description}
                        <figcaption class="caption">
                          <h2 class="display-1 text-uppercase">{$slide.title}</h2>
                          <div class="caption-description">{$slide.description nofilter}</div>
                        </figcaption>
                      {/if}
                    </figure>
                  </a>
                </li>
              {/foreach}
            </ul>
            <div class="direction" aria-label="{l s='Carousel buttons' d='Shop.Theme.Global'}">
              <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                <span class="icon-prev hidden-xs" aria-hidden="true">
                  <i class="material-icons">&#xE5CB;</i>
                </span>
                <span class="sr-only">{l s='Previous' d='Shop.Theme.Global'}</span>
              </a>
              <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true">
                  <i class="material-icons">&#xE5CC;</i>
                </span>
                <span class="sr-only">{l s='Next' d='Shop.Theme.Global'}</span>
              </a>
            </div>
          </div>
        </div>
      {/if}
    {/if}
    {block name='breadcrumb'}
      {include file='_partials/breadcrumb.tpl'}
    {/block}
    </div>
  </div>
</div>
