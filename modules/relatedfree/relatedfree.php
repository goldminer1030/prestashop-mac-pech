<?php

/**
 * PrestaShop module created by VEKIA, a guy from official PrestaShop community ;-)
 *
 * @author    VEKIA https://www.prestashop.com/forums/user/132608-vekia/
 * @copyright 2010-9999 VEKIA
 * @license   This program is not free software and you can't resell and redistribute it
 *
 * CONTACT WITH DEVELOPER http://mypresta.eu
 * support@mypresta.eu
 */

use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;

class relatedfree extends Module
{
    public function __construct()
    {
        $this->name = 'relatedfree';
        $this->tab = 'advertising_marketing';
        $this->author = 'MyPresta.eu';
        $this->version = '1.6.2';
        $this->module_key = 'de6f0cf17c8cb0d314ec544203a9f5f5';
        parent::__construct();
        $this->secure_key = Tools::encrypt($this->name);
        $this->displayName = $this->l('Related products free');
        $this->description = $this->l('Module allows to display custom related products block with products from selected category');
    }

    public function install()
    {
        if (parent::install() == false or !$this->registerHook('displayHeader') or !$this->registerHook('productFooter') or !$this->registerHook('displayAdminProductsExtra') or !$this->registerHook('displayProductTab') or !$this->registerHook('displayProductTabContent') or !$this->registerHook('actionProductUpdate') or !$this->registerHook('displayProductExtraContent'))
        {
            return false;
        }
        return true;
    }

    public function hookActionProductUpdate($params)
    {
        if (Tools::isSubmit('relatedfree'))
        {
            Configuration::updateValue('related_category' . Tools::getValue('id_product'), Tools::getValue('related_category'));
            Configuration::updateValue('related_nb' . Tools::getValue('id_product'), Tools::getValue('related_nb'));
            Configuration::updateValue('related_link' . Tools::getValue('id_product'), Tools::getValue('related_link'));
        }
    }

    public function hookDisplayAdminProductsExtra($params)
    {
        $_GET['id_product'] = $params['id_product'];
        $this->context->smarty->assign('id_product', Tools::getValue('id_product'));
        $this->context->smarty->assign('related_category', Configuration::get('related_category' . Tools::getValue('id_product')));
        $this->context->smarty->assign('related_nb', Configuration::get('related_nb' . Tools::getValue('id_product')));
        $this->context->smarty->assign('related_link', Configuration::get('related_link' . Tools::getValue('id_product')));
        $this->context->smarty->assign('physical_uri', $this->context->shop->physical_uri);
        $this->context->smarty->assign('virtual_uri', $this->context->shop->virtual_uri);
        $this->context->smarty->assign('secure_key', $this->secure_key);
        return $this->display(__FILE__, 'views/templates/admin/tabs.tpl');
    }

    public function hookProductFooter($params)
    {
        $category = new Category(Configuration::get('related_category' . Tools::getValue('id_product')));
        $blocks_products = $category->getProducts($this->context->cookie->id_lang, 0, Configuration::get('related_nb' . Tools::getValue('id_product')));
        $products = $this->prepareBlocksProducts($blocks_products);
        $this->context->smarty->assign('related_link', Configuration::get('related_link' . Tools::getValue('id_product')));
        $this->context->smarty->assign('related_category', Configuration::get('related_category' . Tools::getValue('id_product')));
        $this->context->smarty->assign('related_nb', Configuration::get('related_nb' . Tools::getValue('id_product')));
        $this->context->smarty->assign('products', $products);
        return $this->context->smarty->fetch('module:relatedfree/views/templates/hook/productFooter.tpl');
    }

    public function prepareBlocksProducts($products)
    {
        if ($products != false)
        {
            $products_for_template = [];
            $assembler = new ProductAssembler($this->context);
            $presenterFactory = new ProductPresenterFactory($this->context);
            $presentationSettings = $presenterFactory->getPresentationSettings();
            $presenter = new ProductListingPresenter(new ImageRetriever($this->context->link), $this->context->link, new PriceFormatter(), new ProductColorsRetriever(), $this->context->getTranslator());
            $products_for_template = [];
            foreach ($products as $rawProduct)
            {
                $products_for_template[] = $presenter->present($presentationSettings, $assembler->assembleProduct($rawProduct), $this->context->language);
            }

            return $products_for_template;
        }
        else
        {
            return false;
        }
    }
}

?>