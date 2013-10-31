<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Product Page Akero Clothing Co.</title>
</head>
<body>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="products">Products</a></li>
			<li><a href="">Custom</a></li>
			<li><a href="">Cart</a></li>
			<li><a href="form">Register</a></li>
		</ul>
	</nav>

<div>
	<h1>Akero Clothing Co.</h1>

	<div>
		<p>We sell clothes. Deal with it.</p>
	</div>


<?php foreach($items as $item): ?>

	<h2><?=$item->name?></h2>
	<p>Price: $<?=$item->price?>.00</p>
	<p>Description: <?=$item->description?></p>
	<p>Color: <?=$item->color?></p>

<?php endforeach; ?>
</div>

</body>
</html>