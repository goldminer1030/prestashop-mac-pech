{*
* 2007-2018 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2018 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if isset($product_categories) && count($product_categories) > 0 && $product_categories !== false}
<div class="clearfix nsproductcategories">
	<h2 class="nsproductcategories_h2">{l s='This product belongs to ' mod='nsproductcategories'}{$product_categories|@count} {l s=' other categories' mod='nsproductcategories'} </h2>
	<div id="{if count($categoryProducts) > 5}nsproductcategories{else}nsproductcategories_noscroll{/if}">
	{if count($product_categories) >3}<a id="nsproductcategories_scroll_left" title="{l s='Previous' mod='nsproductcategories'}" href="javascript:{ldelim}{rdelim}">{l s='Previous' mod='nsproductcategories'}</a>{/if}
	<div id="nsproductcategories_list">
		<ul {if count($categoryProducts) > 3}style="width: {math equation="width * nbImages" width=107 nbImages=$product_categories|@count}px"{/if}>
			{foreach from=$product_categories item='cat' name=cat}
			<li {if count($product_categories) <10}style="width:260px"{/if}>
				<a href="{$link->getCategoryLink($cat.id_category, $cat.link_rewrite)}" class="lnk_img" title="{$cat.name|htmlspecialchars}"><img src="{$link->getCatImageLink($cat.link_rewrite, $cat.id_image, 'category_default')|escape:'html'}" alt="{$cat.name|htmlspecialchars}" /></a>
				<p class="product_name">
					<a href="{$link->getCategoryLink($cat.id_category, $cat.link_rewrite)|escape:'html'}" title="{$cat.name|htmlspecialchars}">{$cat.name|truncate:14:'...'|escape:'html':'UTF-8'}</a>
				</p>
				
			</li>
			{/foreach}
		</ul>
	</div>
	{if count($product_categories) >3}<a id="nsproductcategories_scroll_right" title="{l s='Next' mod='nsproductcategories'}" href="javascript:{ldelim}{rdelim}">{l s='Next' mod='nsproductcategories'}</a>{/if}
	</div>
	<script type="text/javascript">
		$('#nsproductcategories_list').trigger('goto', [{$middlePosition}-3]);
	</script>
</div>
{/if}

