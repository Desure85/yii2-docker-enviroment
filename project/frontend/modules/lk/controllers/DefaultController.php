<?php

namespace app\modules\lk\controllers;

use frontend\modules\lk\actions\ActionIndex;
use frontend\modules\lk\actions\ActionUpload;
use frontend\modules\lk\actions\ActionViewHtml;
use yii\web\Controller;


/**
 * Default controller for the `lk` module
 */
class DefaultController extends Controller
{
  use ActionIndex,
      ActionUpload,
      ActionViewHtml;
}
