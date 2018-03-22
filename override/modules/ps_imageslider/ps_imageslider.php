<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Ps_ImageSliderOverride extends Ps_ImageSlider
{

    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $variables = parent::getWidgetVariables($hookName, $configuration);

        if($variables) {
            $root_cat = Category::getRootCategory($this->context->cookie->id_lang);
    
            $category = new Category((int)Configuration::get('PS_HOME_CATEGORY'), $this->context->language->id);
    
            $categories = $this->getCategories($category);
            $current_cat_id = Tools::getValue('id_category');
            $current_cat_name = $this->getCurrentCategoryProp($categories, $current_cat_id, 'name');
            $current_cat_desc = $this->getCurrentCategoryProp($categories, $current_cat_id, 'desc');
            $base_url = _PS_BASE_URL_;
            $domain = Context::getContext()->shop->getBaseURL(true);

            $variables['category_thumb'] = _THEME_CAT_DIR_.$current_cat_id.'.jpg';
            $variables['category_name'] = $current_cat_name;
            $variables['category_desc'] = $current_cat_desc;
            $variables['base_url'] = $base_url;
            $variables['domain'] = $domain;
            $variables['is_maindomain'] = $base_url == $domain ? 'true' : 'false';
            $variables['static_index'] = $int_imageIndex;
            $variables['categories'] = $categories;
        }

        return $variables;
    }

    private function getCurrentCategoryProp($array, $find, $prop){
        if( $array['id'] == $find ) {
            return $array[$prop];
        }
        if( empty($array['children']) ) {
            return null;
        }

        foreach($array['children'] as $child) {
            $result = $this->getCurrentCategoryProp($child, $find, $prop);
            if( $result !== null ) {
                return $result;
            }
        }
    }

    private function getCategories($category)
    {
        $range = '';
        $maxdepth = 4;
        if (Validate::isLoadedObject($category)) {
            if ($maxdepth > 0) {
                $maxdepth += $category->level_depth;
            }
            $range = 'AND nleft >= '.(int)$category->nleft.' AND nright <= '.(int)$category->nright;
        }

        $resultIds = array();
        $resultParents = array();
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.id_parent, c.id_category, cl.name, cl.description, cl.link_rewrite
			FROM `'._DB_PREFIX_.'category` c
			INNER JOIN `'._DB_PREFIX_.'category_lang` cl ON (c.`id_category` = cl.`id_category` AND cl.`id_lang` = '.(int)$this->context->language->id.Shop::addSqlRestrictionOnLang('cl').')
			INNER JOIN `'._DB_PREFIX_.'category_shop` cs ON (cs.`id_category` = c.`id_category` AND cs.`id_shop` = '.(int)$this->context->shop->id.')
			WHERE (c.`active` = 1 OR c.`id_category` = '.(int)Configuration::get('PS_HOME_CATEGORY').')
			AND c.`id_category` != 1
			'.((int)$maxdepth != 0 ? ' AND `level_depth` <= '.(int)$maxdepth : '').'
			'.$range.'
			AND c.id_category IN (
				SELECT id_category
				FROM `'._DB_PREFIX_.'category_group`
				WHERE `id_group` IN ('.pSQL(implode(', ', Customer::getGroupsStatic((int)$this->context->customer->id))).')
			)
            ORDER BY `level_depth` ASC, cl.`name` ASC');
        foreach ($result as &$row) {
            $resultParents[$row['id_parent']][] = &$row;
            $resultIds[$row['id_category']] = &$row;
        }

        return $this->getTree($resultParents, $resultIds, $maxdepth, ($category ? $category->id : null));
    }

    public function getTree($resultParents, $resultIds, $maxDepth, $id_category = null, $currentDepth = 0)
    {
        if (is_null($id_category)) {
            $id_category = $this->context->shop->getCategory();
        }

        $children = [];

        if (isset($resultParents[$id_category]) && count($resultParents[$id_category]) && ($maxDepth == 0 || $currentDepth < $maxDepth)) {
            foreach ($resultParents[$id_category] as $subcat) {
                $children[] = $this->getTree($resultParents, $resultIds, $maxDepth, $subcat['id_category'], $currentDepth + 1);
            }
        }

        if (isset($resultIds[$id_category])) {
            $link = $this->context->link->getCategoryLink($id_category, $resultIds[$id_category]['link_rewrite']);
            $name = $resultIds[$id_category]['name'];
            $desc = $resultIds[$id_category]['description'];
        } else {
            $link = $name = $desc = '';
        }

        $cat = Tools::getValue('id_category');
        return [
            'id' => $id_category,
            'link' => $link,
            'name' => $name,
            'select' => $cat == $id_category ? 'selected' : '',
            'desc'=> $desc,
            'children' => $children
        ];
    }

}
