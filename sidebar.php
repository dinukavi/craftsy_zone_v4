
<div class="side-nav">

<div class="user">
	<img src="IMAGES/Filters/Gender/Men.webp" class="user-img">
	<div>
		<h2><?php echo $_SESSION['u_name'] ?></h2>
		<p><?php echo $_SESSION['u_email'] ?></p>
	</div>
</div>
	
	<div class="sidebar_items">
		<ul>

			<div class="sidebar_content">
				<li><a href="#"><h4>Buy</h4><img src="IMAGES/Sidebar/Buy.png" alt="buy"></a></li>
					<div class="sub_links">
						<ul>
							<li><a href="products.php"><p>Products</p></a></li>
							<li><a href="materials.php"><p>Materials</p></a></li>
							<li><a href="cart.php"><p>Cart</p></a></li>
						</ul>
					</div>
			</div>
			
			<div class="sidebar_content">
				<li><h4>Sell</h4><a href="product_selling.php"><img src="IMAGES/Sidebar/sell.png" alt="sell"></a></li>
			</div>
			
			<div class="sidebar_content">
				<li><a href="uploads.php"><h4>uploads</h4><img src="IMAGES/Sidebar/upload.png" alt="chat"></a></li>
			</div>
			
			<div class="sidebar_content">
				<li><a href="community.php"><h4>Community</h4><img src="IMAGES/Sidebar/community.png" alt="community"></a></li>
			</div>
			
			<div class="sidebar_content">
				<li><a href="chat_list.php"><h4>Chats</h4><img src="IMAGES/Sidebar/Chat.png" alt="chat"></a></li>
			</div>

		</ul>
		
		<ul>
		<div class="sidebar_content">
			<li><a href="logout.php"><h4>Logout</h4><img src="IMAGES/Sidebar/logout.png" alt="chat"></a></li>
		</div>
		</ul>

	</div>
</div>

