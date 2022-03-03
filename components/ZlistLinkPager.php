<?php

namespace app\components;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\base\Widget;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;

class ZlistLinkPager extends LinkPager {

    public $city;
    public $type;

    protected function renderPageButton($label, $page, $class, $disabled, $active) {
        $options = ['class' => empty($class) ? $this->pageCssClass : $class];
        if ($active) {
            Html::addCssClass($options, $this->activePageCssClass);
        }
        if ($disabled) {
            Html::addCssClass($options, $this->disabledPageCssClass);
            $tag = ArrayHelper::remove($this->disabledListItemSubTagOptions, 'tag', 'span');

            return Html::tag('li', Html::tag($tag, $label, $this->disabledListItemSubTagOptions), $options);
        }
        $linkOptions = $this->linkOptions;
        $linkOptions['data-page'] = $page;

        return Html::tag('li', Html::a($label, $this->generateCustomUrl($page), $linkOptions), $options);
    }


    public function generateCustomUrl($page) {
        $params = [
            'city' => $this->city,
            'type' => $this->type,
            'page' => $page + 1
        ];
        $params[0] = Yii::$app->controller->getRoute();
        $urlManager = Yii::$app->getUrlManager();
        return $urlManager->createUrl($params);
    }

}
