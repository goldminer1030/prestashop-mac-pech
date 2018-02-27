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
{if $homeslider.slides}
  <div class="row">
    <div class="col-lg-3 no-right-padding-md">
      <div class="home_categories">
        <h2>{l s='Categories' mod='homecategories'}</h2>
        {if isset($categories) AND $categories}
          <div id="subcategories">
            <ul class="clearfix">
              {foreach from=$categories item=subcategory name=homeCategories}
                <li>
                  <h5>
                    <a class="subcategory-name"
                        href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}">{$subcategory.name|truncate:25:'...'|escape:'html':'UTF-8'}</a>
                  </h5>
                </li>
              {/foreach}
            </ul class="clearfix">
          </div>
        {else}
          <p>{l s='No categories' mod='homecategories'}</p>
        {/if}
        <div class="cr"></div>
      </div>
    </div>
    <div class="col-lg-9 no-padding-md">
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
      <div class="carousel-wrapper left-padding-md">
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
    </div>
  </div>
{else}
  <div class="home_categories col-md-12">
    <h2>{l s='Categories' mod='homecategories'}</h2>
    {if isset($categories) AND $categories}
      <div id="subcategories">
        <ul class="clearfix">
          {foreach from=$categories item=subcategory name=homeCategories}
            <li>
              <div class="subcategory-image">
                <a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}"
                  title="{$subcategory.name|escape:'html':'UTF-8'}" class="img">
                  {if $subcategory.id_image}
                    <img class="replace-2x"
                        src="{$link->getCatImageLink($subcategory.link_rewrite, $subcategory.id_image, 'medium_default')|escape:'html':'UTF-8'}"
                        alt="" width="{$mediumSize.width|escape:'htmlall':'UTF-8'}" height="{$mediumSize.height|escape:'htmlall':'UTF-8'}"/>
                  {else}
                    <img class="replace-2x" src="{$img_cat_dir|escape:'htmlall':'UTF-8'}{$lang_iso|escape:'htmlall':'UTF-8'}-default-medium_default.jpg"
                        alt="" width="{$mediumSize.width|escape:'htmlall':'UTF-8'}" height="{$mediumSize.height|escape:'htmlall':'UTF-8'}"/>
                  {/if}
                </a>
              </div>
              <h5>
                <a class="subcategory-name"
                    href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}">{$subcategory.name|truncate:25:'...'|escape:'html':'UTF-8'}</a>
              </h5>
            </li>
          {/foreach}
        </ul class="clearfix">
      </div>
    {else}
      <p>{l s='No categories' mod='homecategories'}</p>
    {/if}
    <div class="cr"></div>
  </div>
{/if}
