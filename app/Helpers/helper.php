<?php
if (!function_exists('isAdmin')) {
    function isAdmin($user)
    {
        return in_array($user->email, explode(',', env('USER_ADMIN_EMAILS')));
    }
}

if (!function_exists('toArray')) {
    function toArray($tree = [], $children = 'children')
    {
        if (empty($tree) || !is_array($tree)) {
            return $tree;
        }
        $arrRes = [];
        foreach ($tree as $k => $v) {
            $arrTmp = $v;
            unset($arrTmp[$children]);
            $arrRes[] = $arrTmp;
            if (!empty($v[$children])) {
                $arrTmp = toArray($v[$children]);
                $arrRes = array_merge($arrRes, $arrTmp);
            }
        }
        return $arrRes;
    }
}