<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
?>
<div class="wrapper wrapper-content animated fadeIn" >
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title" style="padding: 0px;border-top: 0px;">
                    <ul class="nav nav-tabs">
                        <li class="<?php echo Yii::$app->request->get('type') == 0  ? 'active' : ''; ?>"><a href="<?= Url::to(['menu/index', 'type'=>0]) ?>">后台菜单</a></li>
                        <li class="<?php echo Yii::$app->request->get('type') == 1  ? 'active' : ''; ?>"><a href="<?= Url::to(['menu/index', 'type'=>1]) ?>">前台导航</a></li>
                        <li><a href="<?=Url::to(['menu/create'])?>">创建菜单</a></li>
                    </ul>
                </div>
                <div class="ibox-content" style="border-top: 0px;">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="menu-index">
                                <?php
                                // echo $this->render('_search', ['model' => $searchModel]);
                                /*echo GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        [
                                            'attribute' => 'sort',
                                            'options' => [
                                                'width' => '80px'
                                            ],
                                            'format' => 'raw',
                                            'value' => function($model){
                                                return Html::input('sort', "sort[{$model['id']}]", $model->sort, [
                                                    'class'=>'form-control',
                                                    'style'=>[
                                                        'width'=>'80px',
                                                    ]
                                                ]);
                                            },
                                            'filter' => '',

                                        ],
                                        [
                                            'attribute' => 'id',
                                            'options' => [
                                                'width' => '80px'
                                            ],
                                        ],
                                        [
                                            'attribute' => 'parent_id',
                                            'options' => [
                                                'width' => '100px'
                                            ],
                                        ],
                                        'name',
                                        'url:url',
                                        [
                                            'attribute' => 'is_display',
                                            'value' => function ($model) {
                                                if ($model->is_display == 1) {
                                                    return '显示';
                                                } else {
                                                    return '隐藏';
                                                }
                                            },
                                            'filter' => Html::dropDownList('MenuSearch[is_display]', 'id', [''=>'全部', '1'=>'显示', '0'=>'隐藏'], [
                                                'class'=>'form-control'
                                            ]),
                                            'options' => [
                                                'width' => '100px'
                                            ],
                                        ],
                                        // 'type',
                                        //'icon',
                                        //'target',
                                        //'is_absolute_url:url',
                                        //'method',
                                        //'created_at',
                                        //'updated_at',

                                        [
                                            // 'label' => '操作',
                                            'header' => '操作',
                                            'class' => 'yii\grid\ActionColumn'
                                        ],
                                    ],
                                ]);*/
                                ?>
                                <?php $form = ActiveForm::begin([
                                        'action' => ['category/sort'],
                                    ]); ?>
                                    <div id="w0" class="grid-view">
                                        <div class="table-actions">
                                            <button type="submit" class="btn btn-primary btn-sm js-ajax-submit">排序</button>
                                        </div>
                                        <table class="table table-hover table-bordered table-list">
                                            <thead>
                                                <tr>
                                                    <th width="50">排序</th>
                                                    <th width="50">ID</th>
                                                    <th>分类名称</th>
                                                    <th>操作路由</th>
                                                    <th>状态</th>
                                                    <th width="180">操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?= $menuTableTree ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th width="50">排序</th>
                                                    <th width="50">ID</th>
                                                    <th>分类名称</th>
                                                    <th>操作路由</th>
                                                    <th>状态</th>
                                                    <th width="180">操作</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="table-actions">
                                            <button type="submit" class="btn btn-primary btn-sm js-ajax-submit">排序</button>
                                        </div>
                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

