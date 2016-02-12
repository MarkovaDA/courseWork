 <p class="center">Внедрение виджета</p>
 <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#tab1">HTML</a></li>
      <li><a data-toggle="tab" href="#tab2">CSS</a></li>
      <li><a data-toggle="tab" href="#tab3">JS</a></li>
 </ul>
 <div class="tab-content">
	<div id="tab1" class="tab-pane fade in active">
		<?php 
			include 'demo_code/html/' . $_SESSION['current'] . '.php'; 
		?>
	</div>
	<div id="tab2" class="tab-pane fade">
		<?php 
			include 'demo_code/css/' . $_SESSION['current'] . '.php';
		?>
	</div>
	<div id="tab3" class="tab-pane fade">
		<?php 
			include 'demo_code/js/' . $_SESSION['current'] . '.php';
		?>
	</div>
 </div>