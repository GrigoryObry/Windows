	<?php include_once( __DIR__ . '/app.php' ); ?>
	<?php include_once ( __DIR__ . '/include/header.php') ?>
		<div class="wrapper">
			
			<div class="draw col-md-4 window-box">				
				<select placeholder="выберите форму окна" name="type" id="window-type">
					<option value="arc">Арочное</option>
					<option value="square">Прямоугольное</option>
					<option value="circle">Круглое</option>
				</select><br>				
				<label class="win-rad">Радиус окна</label>
				<input placeholder="РАДИУС" required class="win-rad" id="win-rad" name="win-rad" value="150">	
				<label class="win-width">Ширина окна</label>
				<input placeholder="ШИРИНА" required type="text" class="win-width" id="win-width" name="win-width" value="300"><br>
				<label class="win-height">Высота окна</label>
				<input placeholder="ВЫСОТА" required type="text"  class="win-height" id="win-height" name="win-height" value="300"><br>
				<button id="draw-rect" class="btn-draw btn btn-warning">Применить</button><br><br><br>
						
				<input placeholder="Отступ от левой границы" type="text" id="vert" name="Vertical"><br>
				<button id="draw-vert" class=" btn-draw btn btn-warning">Добавить створку</button>
				<button id="remove-vert" class="btn-draw btn btn-warning">Удалить створки</button><br><br><br>
							
				<input placeholder="Отступ от нижней границы" type="text" id="horz" name="horizontal"><br>
				<button id="draw-horz" class="btn-draw btn btn-warning">Добавить створку</button>
				<button id="remove-horz" class="btn-draw btn btn-warning">Удалить створки</button>

				<input id="price" name="price" value="20000p" readonly>	
			</div>
			
			<div class="col-md-2 col">
				<div class="filter-box">
					<form id="baseform" method="POST" action="/add_offer.php">
						<br>
						<input type="hidden" id="wndtype" name="wndtype" value="">
						<input type="hidden" id="price" name="price" value="">
							<input type="checkbox" class="jq-checkbox" name="podokonnik" id="podokonnik"  value="1" checked="" onclick="check(1)">
							<span class="b-conf__mini-checkbox-text">Подоконник</span>
							<br>
							<input type="checkbox" class="jq-checkbox" name="otliv" id="otliv"  value="1" checked="" onclick="check(2)">
							<span class="b-conf__mini-checkbox-text">Отлив</span>
							<br>
							<input type="checkbox" class="jg-checkbox" name="otkos" id="otkos"  value="1" checked="" onclick="check(3)">
							<span class="b-conf__mini-checkbox-text">Откос</span>
							<br>
							<input type="checkbox" class="jq-checkbox" name="setka" id="setka"  value="1" checked="" onclick="check(4)">
							<span class="b-conf__mini-checkbox-text">Москитная сетка</span>
							<br><br>
						<div id="wndtw_input">
<!-- 							<span class="b-conf__mini-input-text">Ширина</span>
							<input type="number" id="wndWidth" name="width" value="100" class="b-conf__mini-input">
							<span class="b-conf__mini-input-textm">cм</span>
						</div><br><br>
						<div id="wndth_input">
							<span class="b-conf__mini-input-text">Высота</span>
							<input type="number" id="wndHeight" name="height" value="100" class="b-conf__mini-input">
							<span class="b-conf__mini-input-textm">cм</span><br><br> -->
						</div>
							<button class="btn btn-success" type="submit"><h5>ОФОРМИТЬ ЗАКАЗ</h5></button>
					</form>
				</div>
			</div>

		<div class="sizes">
			<div class="windows">
			</div>
		</div>

		<div class="price">

			<!-- <input type="text" name=""> -->
		</div>

		</div><!--Врапер-->
		<?php include_once ( __DIR__ . "/include/footer.php") ?>