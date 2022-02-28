<?php

namespace app\components;

use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class SefRule extends BaseObject implements UrlRuleInterface {

    public function createUrl($manager, $route, $params) {
        $link = explode('/', $route)[1] . '/';
        if (count($params)) {
            foreach ($params as $p) {
                $link .= $p;
                $link .= '/';
            }
        }
        return $link; // this rule does not apply
    }

    public function parseRequest($manager, $request) {
        $pathInfo = $request->getPathInfo();
        if (preg_match('%^(\w+)(/(\w+))?$%', $pathInfo, $matches)) {
            // check $matches[1] and $matches[3] to see
            // if they match a manufacturer and a model in the database.
            // If so, set $params['manufacturer'] and/or $params['model']
            // and return ['car/index', $params]
        }
        return false; // this rule does not apply
    }

}
