<?php

namespace app\models\search;
use yii\data\ActiveDataProvider;

interface IHistorySearch {
    public function search($params): ActiveDataProvider;
}
