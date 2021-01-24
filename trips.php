<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();



	// popup Создание объявления
	include_once "blocks/create_trip_block.php";
?>

<?php
	$title = "Factotum - новые маршруты";
	include_once "blocks/head.php";
?>

<body>
	<!-- topline header -->
	<?php include_once "blocks/topline.php";?>
	<!-- authorize popup block-->
	<?php include_once "blocks/popup_auth.php";?>
	
	<!-- insert posts -->
	<?php include_once "php/insert_posts.php" ?>
	<!--  -->
	
	<!-- code -->
	<div class="trips__page">
		<div class="trips__content">

			<ul class="trips__list" id="post-list">

				<?php $posts = get_posts();?>
				<?php foreach($posts as $post): ?>

				<li class="trips__item">
					<div class="trips__header-color"></div>
					<!-- <a href="#" class="trips__link"></a> -->
					
					<!-- Places -->
					<div class="trips__place-list">
						<div class="trips__place-item">
							<a href="#" class="trips__place-link"></a>
							<div class="trips__place-ico"><i class="fas fa-map-marker-alt"></i></div>
							<div class="trips__place-name">Африка</div>
						</div>
					</div>
					<!-- IMG -->
					<div class="trips__img">
						<img src="img/for header/2.jpg" alt="img">
					</div>
					<!--  -->
					<div class="trips__name"><?=$post['name']?></div>
					<!--Tags -->
					<div class="trips__tag-list">
						<div class="trips__tag-item">
							<a href="#" class="trips__tag-link"></a>
							<div class="trips__tag-ico"><i class="fas fa-tag"></i></div>
							<div class="trips__tag-name">экстрим</div>
						</div>
					</div>
					<!-- Descr -->
					<div class="trips__descr-block">
						<div class="trips__descr"><?=$post['descr']?></div>
						<div class="trips__descr-open">подробнее +</div>
					</div>
					<!--  -->
					
					<!--  -->
					<div class="trips__time-block">
						<i class="far fa-clock"></i>
						<div class="trips__start-date"><?=$post['start_date']?></div>
						<span style="color: #00AAF9;"> - </span>
						<div class="trips__end-date"><?=$post['end_date']?></div>
						<!-- <div class="trips__period">april 2020</div> -->
					</div>

					<!--  -->
					<!-- Author -->
					<div class="trips__author-block">
						<div class="trips__author-img"><a href="#"><img src="img/avatars/1.jpg"></a></div>
						<div class="trips__author-name"><a href="#"><?=$post['users_name']?></a></div>
						<div class="trips__author-status"><?=$post['users_status']?></div>
					</div>
					<!-- search characteristics -->
					<div class="trips__search-person"><i class="fas fa-male"></i> / <i class="fas fa-female"></i></div>
					<div class="trips__search-person-popup  hidden">Ищет в попутчики: парня, девушку</div>
					<!--  -->
					<div class="trips__post-time"><?php echo date('d.m.Y', $post['post_time'])?></div>
					<!-- Members -->
					<div class="trips__members-list">
						<div class="trips__members-label">Попутчики:</div>
						<div class="trips__members-item">
							<div class="trips__members-circle">
								<img src="img/avatars/3.jpg">
							</div>
						</div>
					</div>
					<!--  -->
				</li>

			<?php endforeach; ?>
			</ul>

		</div>
	</div>

	
	<?php include_once "blocks/scripts.php" ?>

	<!-- <?php //include_once "php/insert_new_post.php" ?> -->

	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e35bb9b698.js" crossorigin="anonymous"></script>
	<script src="js/common.js"></script> -->
</body>