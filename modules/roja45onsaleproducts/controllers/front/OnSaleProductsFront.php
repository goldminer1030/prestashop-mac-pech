<?php
/**
 * Roja45OnSaleProductsRoja45OnSaleProductsModuleFrontController.
 *
 * @category  Roja45OnSaleProductsRoja45OnSaleProductsModuleFrontController
 *
 * @author    Roja45 <support@roja45.com>
 * @copyright 2016 Roja45
 * @license   license.txt
 *
 * @link      http://www.roja45.com/
 *
 * 2016 ROJA45 - All rights reserved.
 *
 * DISCLAIMER
 * Changing this file will render any support provided by us null and void.
 */

/**
 * Roja45OnSaleProductsRoja45OnSaleProductsModuleFrontController.
 *
 * @category  Class
 *
 * @author    Roja45 <support@roja45.com>
 * @copyright 2016 Roja45
 * @license   license.txt
 *
 * @link      http://www.roja45.com/
 *
 * 2016 ROJA45 - All rights reserved.
 *
 * DISCLAIMER
 * Changing this file will render any support provided by us null and void.
 */
class roja45onsaleproductsOnSaleProductsFrontModuleFrontController extends ModuleFrontController
{
    public function init()
    {
        $this->page_name = 'Roja45OnSaleProducts';
        parent::init();
    }

    public function setMedia()
    {
        parent::setMedia();
        $this->addCSS(_THEME_CSS_DIR_.'product_list.css');
        $this->addCSS(__PS_BASE_URI__.'modules/'.$this->module->name.'/css/'.$this->module->name.'.css');
    }

    /**
     * Assign template vars related to page content.
     *
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $this->productSort();
        // Override default configuration values: cause the new products page must display latest products first.
        if (!Tools::getIsset('orderway') || !Tools::getIsset('orderby')) {
            $this->orderBy = 'date_add';
            $this->orderWay = 'DESC';
        }

        $products = Roja45OnSaleProducts::$cache_onsale_products;
        if ($products === null) {
            $products = Roja45OnSaleProducts::getOnSaleProducts((int) $this->context->language->id, 0, (int) Configuration::get('PS_ROJA45_ONSALE_PRODUCTS_NBR'));
        }

        $nb_products = count($products);

        $this->pagination($nb_products);

        $this->addColorsToProductList($products);

        $this->context->smarty->assign(array(
            'products' => $products,
            'add_prod_display' => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
            'nbProducts' => (int) $nb_products,
            'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
            'comparator_max_item' => Configuration::get('PS_COMPARATOR_MAX_ITEM'),
        ));

        $this->setTemplate('onsale-products.tpl');
    }
}
