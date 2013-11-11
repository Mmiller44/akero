			<div id="main_content" class="container">

				<section id="wishlist">

					<h2> your wishlist </h2>

					<div id="columns">
						<div class="eight columns">item</div>
						<div class="two columns center_text">size</div>
						<div class="two columns center_text">price</div>
						<div class="clear_fix"></div>
					</div> <!-- end columns -->

			<?php foreach($items as $item): ?>

					<div class="wishlist_product">
						<div class="eight columns">
							<div class="img_thumb">
								<img src="../../images/products/<?=$item->name?>-thumb.png" alt="product thumbnail">
							</div>
							<p class="item_name"><a href="../../detailsController/details/<?=$item->name?>"><?=$item->name?></a> </p>
						</div>
						<p class="two columns center_text"> <span class="labels">size:</span>Any </p>
						<p class="two columns center_text"> <span class="labels">price:</span>$<?=$item->price?>.00</p>
<<<<<<< HEAD
						<p class="two columns center_text"><a href="../../removeWishlistController/removeWishlist/<?=$item->name?>">delete</a></p>
=======
						<p class="two columns center_text">
							<?php echo anchor('CartController/addtoCart/' . $item->productID,'add to cart'); ?>
						</p>
						<p class="two columns center_text"><a href="#">delete</a></p>
>>>>>>> 351206e0aa6571e202889b56611d3dec746fd618
						<p class="clear_fix"></p>
					</div> <!-- end wishlist_product -->

			<?php endforeach; ?>

				</section> <!-- end wishlist -->

			</div> <!-- end main content -->