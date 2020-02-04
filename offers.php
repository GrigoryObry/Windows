<?php 
	include_once( __DIR__ . '/app.php' );

	$query = 'SELECT * FROM offer WHERE user_id = :user_id ORDER BY date_created DESC';

	$active = $dbh->prepare($query);
	$completed = $dbh->prepare($query);
	
	$active->execute(array(
		'user_id' => $user->getId()
	));

	$orders = array(
		'active' => $active->fetchAll(PDO::FETCH_ASSOC),
	);

?>
<?php include_once (__DIR__ . '/include/header.php') ?>

<h1 style="margin-left: 20px; ">Мои Заказы</h1><br><br>
<?php foreach ($orders['active'] as $order) {?>
<div class="tab-content">
	<div role="tabpanel" class="tab-pane active">
		
 <!-- Ниже верстка для курсача тебе она навернека не нужна -->	

		<div class="col-lg-4 col">
			<div class="panel panel-default">
				<div class="panel-heading">
					<img id="main-img" src="img/windows/<?=$order['wndtype']; ?>.png">
				</div>
				<div class="panel-body">
					<!--  <div style="display: block;" class="pull-left"><h4>Тип Дома: <?=$order['building_type']; ?></h4></div><br><br>  -->
					<div style="display: block;" class="pull-left"><h4>Цена: <?=$order['price']; ?></h4></div><br><br>
					<div style="display: block;" class="pull-left"><h4>Ширина: <?=$order['width']; ?> см</h4></div><br><br>
					<div style="display: block;" class="pull-left"><h4>Высота: <?=$order['height']; ?> см</h4></div><br><br>
					<div class="pull-right"><?=$order['date_created']; ?></div>
					<div style="clear: both;"></div>
					<a href="#" class="btn btn-xs btn-danger">Удалить</a>
							<br>
							<br>				
				</div>
			</div>
					
		<!-- </div> -->
	</div>
</div><?php }?><br><br><br><br><br>
<?php include_once( __DIR__ . '/include/footer.php' ); ?>