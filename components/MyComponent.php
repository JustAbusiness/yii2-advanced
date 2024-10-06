<?php

namespace app\components;

use Yii;
use yii\base\Component;

class MyComponent extends Component
{
     public function welcome()
     {
          return "Welcome to MyComponent";
     }
}