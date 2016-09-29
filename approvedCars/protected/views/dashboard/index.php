
<style>
.info-box-icon.bg-airport {
	background-color: #fede00;
}
</style>





<section class="content">

	<div class="row">


		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-airport"><i class="fa fa-newspaper-o"></i>
				</span>
				<div class="info-box-content">
					<span class="info-box-text"></span>Total Users <span
						class="info-box-number"><?php echo $total_user;?> </span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->


		</div>


		<!-- /.col -->
		<div class="clearfix visible-sm-block"></div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-user"></i> </span>
				<div class="info-box-content">
					<span class="info-box-text"></span>Users Subscribed   <span
						class="info-box-number"><?php echo $total_jobs;?> </span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->


		</div>
		
			<div class="clearfix visible-sm-block"></div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-user"></i> </span>
				<div class="info-box-content">
					<span class="info-box-text"></span>Total Enquires <span
						class="info-box-number"><?php echo $total_requirements;?> </span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->


		</div>
		
		
		
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-money"></i> </span>
				<div class="info-box-content">
                                            <span class="info-box-text"></span>Total Table Booked<span
						class="info-box-number"><?php echo $total_transection ;?> </span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->


		</div>

	<?php 
/*
						       * ?>
						       * <div class="col-md-3 col-sm-6 col-xs-12">
						       * <div class="info-box">
						       * <span class="info-box-icon bg-aqua"><i class="fa fa-credit-card"></i>
						       * </span>
						       * <div class="info-box-content">
						       * <span class="info-box-text">Total Transactions</span> <span
						       * class="info-box-number"><?php //echo $total_tansaction;?> </span>
						       * </div>
						       * <!-- /.info-box-content -->
						       * </div>
						       * <!-- /.info-box -->
						       * </div>
						       */
	?>
	<!-- /.col -->




		<div class="col-md-12">
			<!-- TABLE: LATEST ORDERS -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Dashboard </h3>
		
			</div>
				<!-- /.box-header -->
				
<div class="box-body">

	<?php 
//        $this->widget('booster.widgets.TbGridView', array(
//		'id' => 'job-grid',
//		'type'=>'striped bordered condensed',
//		'dataProvider' => $model->search(),
//// 			'pager' => true,
//		'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('job/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
//		//'rowCssClassExpression' => '($data->isDelayed())?"especial":"normal"',
//		//'filter' => $model,
//		'htmlOptions' => array(
//	       'style' => 'cursor: pointer;',
//		  
//	    ),
//		'columns' => array(
//			'id',
//				array (
//						'header' => '<a>Posted By</a>',
//						'name' => 'createUser'
//				),
	// 			array (
	// 					'name' => 'image_file',
	// 					'type' => 'raw',
	// 					'value' => 'CHtml::image($data->getImage(),"", array("height"=>100) )'
	// 			),
//				array (
//						'header'=>'<a>Title</a>',
//						'name' => 'service',
//	
//				),
//				array (
//						'header'=>'<a>Nationality</a>',
//						'name' => 'nationality',
//				
//				),
//				array (
//						'header'=>'<a>Religion</a>',
//						'name' => 'religion',
//							
//				),
//				array (
//						'header'=>'<a>Location</a>',
//						'name' => 'location',
//							
//				),
					
		
					
// 			'skills',
// 			'price',
					/*
			'language',
			'country',
			'start_time',
			'zip_code',
			'lat',
			'long',
			'address',
			array(
					'name' => 'is_feature',
					'value' => '($data->is_feature === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
			array(
					'name' => 'is_view',
					'value' => '($data->is_view === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
					),
			array(
					'class' => 'LabelColumn',
					'name' => 'state_id',
					'value'=>'$data->getStatusOptions($data->state_id)',
					'labels' => Job::getLabelOptions(),
					'filter'=>Job::getStatusOptions(),
				
	                
					
					),
			array(
					'name' => 'type_id',
					'value'=>'$data->getTypeOptions($data->type_id)',
					'filter'=>Job::getTypeOptions(),
					),
			'update_time:datetime',
			array(
					'class' => 'LabelColumn',
					'name' => 'job_state_id',
					'value'=>'$data->getStatusOptions($data->job_state_id)',
					'labels' => Job::getLabelOptions(),
					'filter'=>Job::getStatusOptions(),
				
	                
					
					),
			array(
				'name'=>'service_id',
				'value'=>'GxHtml::valueEx($data->service)',
				'filter'=>GxHtml::listDataEx(Service::model()->findAllAttributes(null, true)),
				),
			*/
//			array(
//				 'header'=>'<a>Actions</a>',
//				'class'=>'CxButtonColumn',
//				'htmlOptions' => array('nowrap'=>'nowrap'),
//			),
//		),
//	));
        ?>
</div>
			
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
		<div class="col-md-4">
			<!-- PRODUCT LIST -->
			<!-- /.box -->
		</div>
		<!-- /.col -->

</section>
