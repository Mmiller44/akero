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
			<li><a href="productsController">Products</a></li>
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

	<?php echo form_open('CartController/add'); ?>

	<h2><?=$item->product?></h2>
	<p>Price: $<?=$item->price?>.00</p>
	<p>Description: <?=$item->description?></p>
	<p>Color: <?=$item->color?></p>
	<p><a href="favoritesController">Add to Favorites</a></p>

		<?php echo form_hidden('id', $item->productId); ?>
		<?php echo form_submit('action', 'Add to Cart'); ?>
		<?php echo form_close(); ?>

<?php endforeach; ?>
</div>

<?php if($cart = $this->cart->contents()): ?>
<div id="cart">
	<table>
		<caption>Shopping Cart</caption>
		<thead>
			<tr>
				<th>Item Name</th>
				<th>Price</th>
				<th></th>
			</tr>
		</thead>

		<?php foreach ($cart as $item): ?>
			<tr>
				<td><?php echo $item['qty']; ?></td>
				<td><?php echo $item['name']; ?></td>
				<td>$<?php echo $item['subtotal']; ?></td>
				<td class="remove">
					<?php $this->load->helper('url');  ?>
					<?php echo anchor('CartController/remove/'.$item['rowid'],'X'); ?>
				</td>
			</tr>
		<!--<?php //print_r($cart); ?>-->
<?php endforeach; ?>
<tr class="total">
			<td colspan="2"><strong>Total</strong></td>
			
			<td>$<?php echo $this->cart->total(); ?></td>
		</tr>
</table>
</div>

	<?php endif; ?>

</body>
</html>