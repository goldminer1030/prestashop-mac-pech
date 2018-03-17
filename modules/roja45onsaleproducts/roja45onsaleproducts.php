<?php
/**
 * Roja45OnSalepProducts.
 *
 * @category  Roja45OnSalepProducts
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
 * Roja45OnSalepProducts.
 *
 * @category  Class
 *
 * @author    Roja45
 * @copyright 2016 Roja45
 * @license   license.txt
 *
 * 2016 ROJA45 - All rights reserved.
 *
 * DISCLAIMER
 * Changing this file will render any support provided by us null and void.
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

class Roja45OnSaleProducts extends Module
{
    public static $cache_onsale_products;
    const TOPIC = 'UNSET';
    private $html = '';

    public function __construct()
    {
        $this->name = 'roja45onsaleproducts';
        $this->tab = 'front_office_features';
        $this->version = '1.0.1';
        $this->author = 'Roja45';
        $this->need_instance = 0;
        $this->bootstrap = true;

        $this->forum_id = 'UNSET';

        parent::__construct();

        $this->displayName = $this->l('Roja45: On Sale Products');
        $this->description = $this->l('Displays products that are currently on sale.  In home section, home tab, or left and right columns. On Sale product selection type can the changed.');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        if (!parent::install()
            || !$this->registerHook('displayHeader')
            || !$this->registerHook('actionProductAdd')
            || !$this->registerHook('actionProductSave')
            || !$this->registerHook('actionProductDelete')
            || !$this->registerHook('displayHomeTab')
            || !$this->registerHook('displayHome')
            || !$this->registerHook('displayHomeTabContent')
            || !$this->registerHook('displayRoja45ModuleManager')
            || !Configuration::updateValue('PS_ROJA45_ONSALE_PRODUCTS_NBR', 5)
            || !Configuration::updateValue('PS_ROJA45_ONSALEPRODUCTS_DISPLAY', 0)
            || !Configuration::updateValue('PS_ROJA45_ONSALE_PRODUCTS_SELECT', 'RANDOM')
        ) {
            return false;
        }
        $this->clearCache();
        return true;
    }

    public function uninstall()
    {
        $this->clearCache();
        return parent::uninstall();
    }

    public function clearCache()
    {
        parent::_clearCache('roja45onsaleproducts.tpl');
        parent::_clearCache('roja45onsaleproducts_tab.tpl');
        parent::_clearCache('roja45onsaleproducts_home.tpl');
    }

    public function getContent()
    {
        if (Tools::isSubmit('submitRoja45OnSaleProducts')) {
            if (!($productNbr = Tools::getValue('PS_ROJA45_ONSALE_PRODUCTS_NBR')) || empty($productNbr)) {
                $this->html .= $this->displayError($this->l('Please set the number of on sale products to display'));
            } elseif ((int)($productNbr) == 0) {
                $this->html .= $this->displayError($this->l('Invalid number.'));
            } else {
                Configuration::updateValue('PS_ROJA45_ONSALEPRODUCTS_DISPLAY', Tools::getValue('PS_ROJA45_ONSALEPRODUCTS_DISPLAY'));
                Configuration::updateValue('PS_ROJA45_ONSALE_PRODUCTS_NBR', (int)($productNbr));
                Configuration::updateValue('PS_ROJA45_ONSALE_PRODUCTS_SELECT', Tools::getValue('PS_ROJA45_ONSALE_PRODUCTS_SELECT'));
                $this->clearCache();
                $this->html .= $this->displayConfirmation($this->l('Settings updated'));
            }
        }

        $this->smarty->assign(array(
            'topic' => self::TOPIC,
        ));
        $this->html .= $this->display(__FILE__, 'hookRoja45HeaderFree.tpl');
        $this->html .= $this->renderForm();

        return $this->html;
    }

    public function hookRightColumn($params)
    {
        if (!$this->isCached('roja45onsaleproducts.tpl')) {
            if (!isset(self::$cache_onsale_products)) {
                self::$cache_onsale_products = $this->getProductsToDisplay();
            }

            $this->smarty->assign(array(
                'onsale_products' => self::$cache_onsale_products,
                'mediumSize' => Image::getSize(ImageType::getFormatedName('medium')),
                'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
                'roja45_onsaleproducts_controller' => $this->context->link->getModuleLink(
                    'roja45onsaleproducts',
                    'OnSaleProductsFront',
                    array(),
                    true
                )
            ));
        }

        if (self::$cache_onsale_products === false) {
            return false;
        }

        return $this->display(__FILE__, 'roja45onsaleproducts.tpl', $this->getCacheId());
    }

    public function hookLeftColumn($params)
    {
        return $this->hookRightColumn($params);
    }

    public function hookDisplayHomeTab($params)
    {
        if (!$this->isCached('roja45onsaleproducts_tab.tpl')) {
            self::$cache_onsale_products = $this->getProductsToDisplay();
        }

        if (self::$cache_onsale_products === false) {
            return false;
        }

        return $this->display(__FILE__, 'roja45onsaleproducts_tab.tpl', $this->getCacheId());
    }

    public function hookDisplayHomeTabContent($params)
    {
        if (!$this->isCached('roja45onsaleproducts_home.tpl')) {
            self::$cache_onsale_products = $this->getProductsToDisplay();
            $this->smarty->assign(array(
                'onsale_products' => self::$cache_onsale_products,
                'mediumSize' => Image::getSize(ImageType::getFormatedName('medium')),
                'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
            ));
        }

        if (self::$cache_onsale_products === false) {
            return false;
        }

        return $this->display(__FILE__, 'roja45onsaleproducts_home.tpl', $this->getCacheId());
    }

    public function hookDisplayHeader($params)
    {
        if (isset($this->context->controller->php_self) && $this->context->controller->php_self == 'index') {
            $this->context->controller->addCSS(_THEME_CSS_DIR_ . 'product_list.css');
        }

        $this->context->controller->addCSS($this->_path . 'views/css/roja45onsaleproducts.css', 'all');
    }

    public function hookAddProduct($params)
    {
        $this->clearCache();
    }

    public function hookActionProductAdd($params)
    {
        $this->hookAddProduct($params);
    }

    public function hookUpdateProduct($params)
    {
        $this->clearCache();
    }

    public function hookActionProductSave($params)
    {
        $this->hookUpdateProduct($params);
    }

    public function hookActionProductDelete($params)
    {
        $this->hookDeleteProduct($params);
    }

    public function hookDeleteProduct($params)
    {
        $this->clearCache();
    }

    public function renderForm()
    {
        $selectionOptions = array(
            array(
                'id_option' => 'NEWEST',
                'name' => 'Most Recent',
            ),
            array(
                'id_option' => 'RANDOM',
                'name' => 'Random Selection',
            ),
        );

        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('On Sale products to display'),
                        'name' => 'PS_ROJA45_ONSALE_PRODUCTS_NBR',
                        'class' => 'fixed-width-xs',
                        'hint' => $this->l('Set the number of on sale products to be displayed in this block.'),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('On Sale Item Selection'),
                        'hint' => $this->l('Selection method used if number of on sale items exceeds number to display.'),
                        'name' => 'PS_ROJA45_ONSALE_PRODUCTS_SELECT',
                        'options' => array(
                            'query' => $selectionOptions,
                            'id' => 'id_option',
                            'name' => 'name',
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Always display this block'),
                        'name' => 'PS_ROJA45_ONSALEPRODUCTS_DISPLAY',
                        'hint' => $this->l('Show the block even if no on sale items are available.'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ),
                        ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitRoja45OnSaleProducts';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules',
                false) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($fields_form));
    }

    public function getConfigFieldsValues()
    {
        return array(
            'PS_ROJA45_ONSALE_PRODUCTS_SELECT' => Tools::getValue('PS_ROJA45_ONSALE_PRODUCTS_SELECT',
                Configuration::get('PS_ROJA45_ONSALE_PRODUCTS_SELECT')),
            'PS_ROJA45_ONSALEPRODUCTS_DISPLAY' => Tools::getValue('PS_ROJA45_ONSALEPRODUCTS_DISPLAY',
                Configuration::get('PS_ROJA45_ONSALEPRODUCTS_DISPLAY')),
            'PS_ROJA45_ONSALE_PRODUCTS_NBR' => Tools::getValue('PS_ROJA45_ONSALE_PRODUCTS_NBR',
                Configuration::get('PS_ROJA45_ONSALE_PRODUCTS_NBR')),
        );
    }

    public function hookDisplayRoja45ModuleManager($params)
    {
        $return = $this->name;

        return $return;
    }

    public function getProductsToDisplay()
    {
        if (!Configuration::get('PS_ROJA45_ONSALE_PRODUCTS_NBR')) {
            return;
        }

        $random = false;
        if (Configuration::get('PS_ROJA45_ONSALE_PRODUCTS_SELECT') == 'RANDOM') {
            $random = true;
        }
        $products = self::getOnSaleProducts((int)$this->context->language->id, 0,
            (int)Configuration::get('PS_ROJA45_ONSALE_PRODUCTS_NBR'), null, null, false, true, $random,
            (int)Configuration::get('PS_ROJA45_ONSALE_PRODUCTS_NBR'));

        if (!count($products) && Configuration::get('PS_ROJA45_ONSALEPRODUCTS_DISPLAY') == 0) {
            return false;
        }

        return $products;
    }

    public function getOnSaleProducts(
        $id_lang,
        $p,
        $n,
        $order_by = null,
        $order_way = null,
        $get_total = false,
        $active = true,
        $random = false,
        $random_number_products = 1,
        $check_access = true,
        Context $context = null
    ) {
        if (!$context) {
            $context = Context::getContext();
        }

        $front = in_array($context->controller->controller_type, array('front', 'modulefront'));
        $id_supplier = (int)Tools::getValue('id_supplier');

        /* Return only the number of products */
        if ($get_total) {
            $sql = '
                SELECT COUNT(cp.`id_product`) AS total
                FROM `' . _DB_PREFIX_ . 'product` p
                ' . Shop::addSqlAssociation('product', 'p') . '
                LEFT JOIN `' . _DB_PREFIX_ . 'category_product` cp ON p.`id_product` = cp.`id_product`
                WHERE cp.`id_category` = ' . (int)$this->id .
                ($front ? ' AND product_shop.`visibility` IN ("both", "catalog")' : '') .
                ($active ? ' AND product_shop.`active` = 1' : '') .
                ($id_supplier ? 'AND p.id_supplier = ' . (int)$id_supplier : '');

            return (int)Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
        }

        if ($p < 1) {
            $p = 1;
        }

        /* Tools::strtolower is a fix for all modules which are now using lowercase values for 'orderBy' parameter */
        $order_by = Validate::isOrderBy($order_by) ? Tools::strtolower($order_by) : 'position';
        $order_way = Validate::isOrderWay($order_way) ? Tools::strtoupper($order_way) : 'ASC';

        $order_by_prefix = false;
        if ($order_by == 'id_product' || $order_by == 'date_add' || $order_by == 'date_upd') {
            $order_by_prefix = 'p';
        } elseif ($order_by == 'name') {
            $order_by_prefix = 'pl';
        } elseif ($order_by == 'manufacturer' || $order_by == 'manufacturer_name') {
            $order_by_prefix = 'm';
            $order_by = 'name';
        } elseif ($order_by == 'position') {
            $order_by_prefix = 'cp';
        }

        if ($order_by == 'price') {
            $order_by = 'orderprice';
        }

        $nb_days_new_product = Configuration::get('PS_NB_DAYS_NEW_PRODUCT');
        if (!Validate::isUnsignedInt($nb_days_new_product)) {
            $nb_days_new_product = 20;
        }

        $sql = '
            SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) AS quantity' . (Combination::isFeatureActive() ? ', IFNULL(product_attribute_shop.id_product_attribute, 0) AS id_product_attribute,
            product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity' : '') . ', pl.`description`, pl.`description_short`, pl.`available_now`,
            pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, image_shop.`id_image` id_image,
            il.`legend` as legend, m.`name` AS manufacturer_name, cl.`name` AS category_default,
            DATEDIFF(product_shop.`date_add`, DATE_SUB("' . date('Y-m-d') . ' 00:00:00",
            INTERVAL ' . (int)$nb_days_new_product . ' DAY)) > 0 AS new, product_shop.price AS orderprice
            FROM `' . _DB_PREFIX_ . 'category_product` cp
            LEFT JOIN `' . _DB_PREFIX_ . 'product` p ON p.`id_product` = cp.`id_product`
            ' . Shop::addSqlAssociation('product', 'p') .
            (Combination::isFeatureActive() ? ' LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute_shop` product_attribute_shop ON (p.`id_product` = product_attribute_shop.`id_product` AND product_attribute_shop.`default_on` = 1 AND product_attribute_shop.id_shop=' . (int)$context->shop->id . ')' : '') . '
            ' . Product::sqlStock('p', 0) . '
            LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl ON (p.`id_product` = pl.`id_product` AND pl.`id_lang` = ' . (int)$id_lang . Shop::addSqlRestrictionOnLang('pl') . ')
            LEFT JOIN `' . _DB_PREFIX_ . 'category_lang` cl ON (product_shop.`id_category_default` = cl.`id_category` AND cl.`id_lang` = ' . (int)$id_lang . Shop::addSqlRestrictionOnLang('cl') . ')
            LEFT JOIN `' . _DB_PREFIX_ . 'image_shop` image_shop ON (image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop=' . (int)$context->shop->id . ')
            LEFT JOIN `' . _DB_PREFIX_ . 'image_lang` il ON (image_shop.`id_image` = il.`id_image` AND il.`id_lang` = ' . (int)$id_lang . ')
            LEFT JOIN `' . _DB_PREFIX_ . 'manufacturer` m ON m.`id_manufacturer` = p.`id_manufacturer`
            WHERE product_shop.`id_shop` = ' . (int)$context->shop->id . '
            AND product_shop.`on_sale` = 1'
            . ($active ? ' AND product_shop.`active` = 1' : '')
            . ($front ? ' AND product_shop.`visibility` IN ("both", "catalog")' : '')
            . ($id_supplier ? ' AND p.id_supplier = ' . (int)$id_supplier : '')
            . ' GROUP BY cp.id_product';

        if ($random === true) {
            $sql .= ' ORDER BY RAND() LIMIT ' . (int)$random_number_products;
        } else {
            $sql .= ' ORDER BY ' . (!empty($order_by_prefix) ? $order_by_prefix . '.' : '') . '`' . bqSQL($order_by) . '` ' . pSQL($order_way) . ' LIMIT ' . (((int)$p - 1) * (int)$n) . ',' . (int)$n;
        }

        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql, true, false);

        if (!$result) {
            return array();
        }

        if ($order_by == 'orderprice') {
            Tools::orderbyPrice($result, $order_way);
        }

        /* Modify SQL result */
        return Product::getProductsProperties($id_lang, $result);
    }
}
