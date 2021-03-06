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
{block name='header_banner'}
  <div class="header-banner">
    {hook h='displayBanner'}
  </div>
{/block}

{block name='header_nav'}
  <nav class="header-nav">
    <div class="container">
        <div class="row">
          <div class="hidden-md-up text-sm-center mobile">
            <div class="float-xs-left" id="menu-icon">
              <i class="material-icons d-inline">&#xE5D2;</i>
            </div>
            <div class="float-xs-right" id="_mobile_cart"></div>
            <div class="float-xs-right" id="_mobile_user_info"></div>
            <div class="top-logo" id="_mobile_logo"></div>
            <div class="clearfix"></div>
          </div>
        </div>
    </div>
  </nav>
{/block}

{block name='header_top'}
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4 hidden-sm-down" id="_desktop_logo">
          <a href="{$urls.base_url}">
            <img class="logo img-responsive" src="{$shop.logo}" alt="{$shop.name}">
          </a>
        </div>
        <div class="col-md-4 col-sm-12 top-title-wrapper">
          <p class="top-title">Vente en ligne des plus grandes marques de pêche</p>
        </div>
        <div class="col-md-4 col-sm-12 position-static">
          <div class="row">
            {hook h='displaySearch'}
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="shopping-cart-wrapper">
          {hook h='displayNav1'}
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 top-gap-sm">
          <div class="header-contact-wrapper">
            <img class="header-contact-icon" src="{$urls.img_url}contact-user.png" alt="contact-user">
            <span class="header-contact-detail">Bienvenue, vous pouvez vous <a class="header-login" href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}">connecter</a> ou vous <a class="header-register" href="{$link->getPageLink('authentication', true)|escape:'html':'UTF-8'}?create_account=1">enregistrer</a></span>
          </div>
          <div class="header-contact-wrapper">
            <img class="header-contact-icon" src="{$urls.img_url}contact-phone.png" alt="contact-phone">
            <span class="header-contact-detail">HOTLINE: <strong>05 63 00 00 00</strong></span>
          </div>
          <div class="header-contact-wrapper">
            <img class="header-contact-icon" src="{$urls.img_url}contact-ship.png" alt="contact-ship">
            <span class="header-contact-detail">Frais de port <strong>gratuit</strong> à partir de 60€</span>
          </div>
        </div>
        <div class="col-md-8 sponsor-bar">
          <img class="sponsor-bitmap" src="{$urls.img_url}sponsor-01.png" alt="sponsor">
          <img class="sponsor-bitmap" src="{$urls.img_url}sponsor-02.png" alt="sponsor">
          <img class="sponsor-bitmap" src="{$urls.img_url}sponsor-03.png" alt="sponsor">
          <img class="sponsor-bitmap" src="{$urls.img_url}sponsor-04.png" alt="sponsor">
          <img class="sponsor-bitmap" src="{$urls.img_url}sponsor-05.png" alt="sponsor">
          <img class="sponsor-bitmap" src="{$urls.img_url}sponsor-06.png" alt="sponsor">
          <img class="sponsor-bitmap" src="{$urls.img_url}sponsor-07.png" alt="sponsor">
          <img class="sponsor-bitmap" src="{$urls.img_url}sponsor-08.png" alt="sponsor">
        </div>
      </div>
      <div id="mobile_top_menu_wrapper" class="row hidden-md-up" style="display:none;">
        <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
        <div class="js-top-menu-bottom">
          <div id="_mobile_currency_selector"></div>
          <div id="_mobile_language_selector"></div>
          <div id="_mobile_contact_link"></div>
        </div>
      </div>
    </div>
  </div>
  {hook h='displayNavFullWidth'}
{/block}
