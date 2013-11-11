<div id="main_content" class="container">

	<section id="banner">
		<div id="jqb_object">
			<div class="jqb_slides">
				<div class="jqb_slide"><a href="productscontroller">
	        	<img src="images/banner/banner4.png" title="" alt=""/></a></div>
	        	<div class="jqb_slide"><a href="productscontroller">
	        	<img src="images/banner/banner1.png" title="" alt=""/></a></div>
	        	<div class="jqb_slide"><a href="productscontroller">
	        	<img src="images/banner/banner2.png" title="" alt=""/></a></div>
	        	<div class="jqb_slide"><a href="productscontroller">
	        	<img src="images/banner/banner3.png" title="" alt=""/></a></div>
        	</div>
    	</div>
	</section>

	<section id="products">

		<h2> featured items </h2>

	<?php foreach($items as $item): ?>

		<div class="product four columns">
			<a href="detailscontroller/details/<?=$item->name?>"><img src="images/products/<?=$item->name?>-small.png"></a>
			<h3><?=$item->name?> $<?=$item->price?>.00</h3>
		</div>

	<?php endforeach; ?>

		<div class="clear_fix"></div>

	</section>

</div> <!-- end main content -->