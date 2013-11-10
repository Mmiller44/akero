			<div id="main_content" class="container">

				<h2> your cart </h2>

				<section id="columns">
					<div class="eight columns">item</div>
					<div class="two columns center_text">size</div>
					<div class="two columns center_text">price</div>
					<div class="two columns center_text">quantity</div>
					<div class="clear_fix"></div>
				</section> <!-- end columns -->

				<?php if($cart = $this->cart->contents()): ?>
				<?php foreach ($cart as $item): ?>
				<!--<?php //echo form_open('CartController/remove'); ?>-->
				<section id="cart_items">

					<div class="wishlist_product">
						<div class="eight columns">
							<div class="img_thumb">
<!-- 								<img src="../../../images/products/<?=$item->name?>-thumb.png" />
 -->							</div>
							<p class="item_name"> <a href="#"><?php echo $item['name']; ?></a></p>
						</div>
						<p class="two columns center_text"> <span class="labels">size:</span><?php echo $item['size']; ?></p>
						<p class="two columns center_text"> <span class="labels">price:</span> $<?php echo $item['subtotal']; ?> </p>
						<div class="two columns center_text"> 
							<span class="labels">quantity:</span></span> <?php echo $item['qty']; ?> </p>
							
							<!-- <a href="#">update</a> -->
						
						</div>
						<p class="two columns center_text"><?php echo anchor('CartController/update/'.$item['rowid'],'add item'); ?>
							<br><?php echo anchor('CartController/remove/'.$item['rowid'],'delete item'); ?></a></p>
						<p class="clear_fix"></p>
					</div> <!-- end wishlist_product -->

				</section> <!-- end cart_items -->
				<?php endforeach; ?>
				<?php endif; ?>

					<div class="divider clear_fix"></div>

				<section id="totals" class="six columns">

					<p> <span class="subtotal">subtotal:</span>$<?php echo $this->cart->total(); ?> </p>
					<div class="divider clear_fix"></div>
					<p> <span class="shipping">shipping:</span> $0.00</p>
					<p> <span class="tax">tax:</span> $0.00</p>
					<div class="divider clear_fix"></div>
					<p> <span class="total">total:</span> <span class="total_price">$<?php echo $this->cart->total(); ?></span>
						<button id="checkout_btn"> checkout </button></p>

				</section> <!-- end totals -->

			</div> <!-- end main content -->
			