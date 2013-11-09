			<div id="main_content" class="container">

			<?php foreach($items as $item): ?>
			<?php echo form_open('CartController/add'); ?>

				<section id="product_img" class="six columns">
					<img src="../../images/products/<?=$item->name?>-large.png">
				</section> <!-- end product_img -->

				<section id="product_details" class="ten columns">
					<h2><?=$item->name?></h2>
					<p><?=$item->description?></p>
					<form id="form_add">
						<div class="size_option">
							<label class="radio"> 
							<input type="radio" name="options[size]" value="XS" checked="checked" <?php echo set_radio('size', 'XS', TRUE); ?> /> 
								X-Small
							</label>	
						</div>
						<div class="size_option">
							<label class="radio"> 
								<input type="radio" name="size" value="S" />
								Small
							</label>
						</div>
						<div class="size_option">
							<label class="radio"> 
								<input type="radio" name="size" value="M" />
								Medium
							</label>
						</div>
						<div class="size_option">
							<label class="radio"> 
								<input type="radio" name="size" value="L" />
								Large
							</label>
						</div>
						<div class="size_option">
							<label class="radio"> 
								<input type="radio" name="size" value="XL" />
								X-Large
							</label>
						</div>
						<div id="submit_options">
							<a href="../../addWishlistController/addWishList/<?=$item->name?>" id="add_list"> add to wishlist </a>
							<!-- <input type="submit" id="add_cart" value="add to cart"/> -->
								<?php echo form_hidden('id', $item->id ); ?>
								<?php echo form_submit('action', 'add to cart'); ?>
								<?php echo form_close(); ?>
						</div>
						<div class="clear_fix"></div>
					</form>
				</section> <!-- end product_details -->

			<?php endforeach; ?>

				<div class="divider clear_fix"></div>

				<section id="ad" class="six columns">
					<img src=<?=base_url("images/ad-placeholder.png");?>>
				</section> <!-- end ad --> 

				<section id="product_reviews" class="ten columns">
					<div class=<?=$this->session->userdata('reviews')?>>
						<h4> Tell us what you think! </h4>
						<form id="form_review">
							<textarea name="review_input" id="review_input" required="required" maxlength="300" rows="5"></textarea>
							<input type="submit" name="review_submit" id="review_submit" value="submit">
							<div class="clear_fix"></div>
						</form>
					</div>

					<div class="review">
						<span class="user"> username </span>
						<p> This is a sample of a review for a product. So all reviews will look like this. </p>
					</div>
					<div class="review">
						<span class="user"> username </span>
						<p> This is a sample of a review for a product. So all reviews will look like this. </p>
					</div>
					<div class="review review-last">
						<span class="user"> username </span>
						<p> This is a sample of a review for a product. So all reviews will look like this. </p>
					</div>
				</section> <!-- end product_reviews -->

				<section id="ad_two" class="six columns">
					<img src=<?=base_url("images/ad-placeholder.png");?>>
				</section> <!-- end ad --> 

			</div> <!-- end main content -->