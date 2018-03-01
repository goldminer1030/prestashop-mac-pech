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

<div class="block_newsletter">
  <img class="newsletter-bg" src="{$urls.img_url}newsletter.jpg" alt="newsletter">
  <div class="marquee">
    <div class="content">
      <span class="news-receive">Recevez</span>
      <span class="news-fishing-tip">nos <strong>conseils de Pêche</strong></span>
      <span class="news-per-email">par email!</span>
    </div>
  </div>
  <div class="news-form">
    <form action="{$urls.pages.index}#footer" method="post">
      {if $msg}
        <p class="alert {if $nw_error}alert-danger{else}alert-success{/if}">
          {$msg}
        </p>
      {/if}
      <div class="input-wrapper">
        <input
          class="btn btn-primary float-xs-right hidden-xs-down"
          name="submitNewsletter"
          type="submit"
          value=""
        >
        <input
          class="btn btn-primary float-xs-right hidden-sm-up"
          name="submitNewsletter"
          type="submit"
          value=""
        >
        <input
          name="email"
          type="text"
          value="{$value}"
          placeholder="{l s='VOTRE EMAIL' d='Shop.Forms.Labels'}"
          aria-labelledby="block-newsletter-label"
        >
      </div>
      <input type="hidden" name="action" value="0">
      <div class="clearfix"></div>
      
    </form>
  </div>
</div>
