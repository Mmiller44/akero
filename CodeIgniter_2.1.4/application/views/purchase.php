			<div id="main_content" class="container">

				<section id="products">

					<h2> purchase </h2>

				<?php foreach($items as $item): ?>

					<div class="product four columns">
						<a href="/detailsController/details/<?=$item->name?>"><img src="images/products/<?=$item->name?>-small.png"></a>
						<h3><?=$item->name?> $<?=$item->price?></h3>
					</div>

				<?php endforeach; ?>

					<div class="clear_fix"></div>

				</section>

			</div> <!-- end main content -->