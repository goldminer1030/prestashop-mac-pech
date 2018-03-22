<?php

if (!defined('_PS_VERSION_')) {
    exit;
}


class Ps_CategoryTreeOverride extends Ps_CategoryTree
{

    public function getTree($resultParents, $resultIds, $maxDepth, $id_category = null, $currentDepth = 0)
    {
        $tree = parent::getTree($resultParents, $resultIds, $maxdepth, $id_category, $currentDepth);
        $tree['thumb'] = _THEME_CAT_DIR_.$id_category.'.jpg';

        return $tree;
    }

}
