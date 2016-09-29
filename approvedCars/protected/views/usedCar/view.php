



<!--<div class="page-header">-->
<!--<h1> echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>-->
<!--</div>-->

<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <section class="content-header pull-left">

                        <!--<h1><?php // echo ucfirst(GxHtml::encode(GxHtml::valueEx($model)));  ?></h1>-->
                        <h1>Car Details</h1>
                    </section>

                    <?php
                    $this->widget('booster.widgets.TbMenu', array(
                        'type' => 'navbar',
                        'items' => $this->actions,
                        'htmlOptions' => array('class' => 'pull-right btn-group'),
                    ));
                    ?>
                </div>
                <div class="box-body">

                    <div class="table-outer">
                        <?php
                        $this->widget('booster.widgets.TbDetailView', array(
                            'data' => $model,
                            'attributes' => array(
                                'id',
                                array(
                                    'name' => 'maker',
                                    'type' => 'raw',
                                    'value' => $model->maker !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->maker)), array('maker/view', 'id' => GxActiveRecord::extractPkValue($model->maker, true))) : null,
                                ),
                                array(
                                    'name' => 'model',
                                    'type' => 'raw',
                                    'value' => $model->model !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->model)), array('carModel/view', 'id' => GxActiveRecord::extractPkValue($model->model, true))) : null,
                                ),
                                array(
                                    'name' => 'bodyType',
                                    'type' => 'raw',
                                    'value' => $model->bodyType !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->bodyType)), array('bodyType/view', 'id' => GxActiveRecord::extractPkValue($model->bodyType, true))) : null,
                                ),
                                'year',
                                'milage',
                                array(
                                    'name' => 'accident',
                                    'type' => 'raw',
                                    'value' => $model->getSelectOptions($model->accident),
                                ),
                                'accident_desc:html',
                                array(
                                    'name' => 'warranty',
                                    'type' => 'raw',
                                    'value' => $model->getSelectOptions($model->warranty),
                                ),
                                'warranty_expire_date:date',
                                'service_package',
                                array(
                                    'name' => 'gear_type',
                                    'type' => 'raw',
                                    'value' => $model->getTransmissionOptions($model->gear_type),
                                ),
                                array(
                                    'name' => 'exterior_color',
                                    'type' => 'raw',
                                    'value' => $model->getColourOptions($model->exterior_color),
                                ),
                                array(
                                    'name' => 'interior_color',
                                    'type' => 'raw',
                                    'value' => $model->getColourOptions($model->interior_color),
                                ),
                                array(
                                    'name' => 'roof',
                                    'type' => 'raw',
                                    'value' => $model->getSelectOptions($model->roof),
                                ),
                                array(
                                    'name' => 'camera',
                                    'type' => 'raw',
                                    'value' => $model->getSelectOptions($model->camera),
                                ),
                                array(
                                    'name' => 'GPS',
                                    'type' => 'raw',
                                    'value' => $model->getSelectOptions($model->GPS),
                                ),
//                                array(
//                                    'name' => 'fuel_type',
//                                    'type' => 'raw',
//                                    'value' => $model->getFuelOptions($model->fuel_type),
//                                ),
//                                array(
//                                    'name' => 'owners',
//                                    'type' => 'raw',
//                                    'value' => $model->getOwnersOptions($model->owners),
//                                ),
//                                'kilometer',
                                'price',
                                array(
                                    'name' => 'dealer',
                                    'type' => 'raw',
                                    'value' => $model->dealer !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->dealer)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->dealer, true))) : null,
                                ),
//                                array(
//                                    'name' => 'type_id',
//                                    'type' => 'raw',
//                                    'value' => $model->getTypeOptions($model->type_id),
//                                ),
//                                array(
//                                    'name' => 'state_id',
//                                    'type' => 'raw',
//                                    'value' => $model->getStatusOptions($model->state_id),
//                                ),
//                                array(
//                                    'name' => 'createUser',
//                                    'type' => 'raw',
//                                    'value' => $model->createUser !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->createUser)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->createUser, true))) : null,
//                                ),
//                                'create_time:datetime',
                            ),
                        ));
                        ?>


                        <?php $this->StartPanel(); ?>
                        <?php $this->AddPanel($model->getRelationLabel('usedCarsImage'), $model->getRelatedDataProvider('usedCarsImage'), 'usedCarsImage', 'usedCarsImage'); ?>
                        <?php $this->EndPanel(); ?>
                        <?php
//                        $this->widget('CommentPortlet', array(
//                            'model' => $model,
//                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>