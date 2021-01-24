<form method="post" name="person_search">
	<!-- <label class="search-block__label"><?=$search_label?></label> -->
	<input class="search-block__search" type="text" autocomplete="off" placeholder='<?=$placeholder?>' autofocus name="request" id="search-inp" value=<?=$personSearchRes?> >
	<!-- <?php //if ("" !== trim($_POST['request'])): ?>
		<input class="search-block__search" type="text" placeholder="альпинист" autofocus name="request" id="search-inp" value=<?php //echo trim($_POST['request'])?>>
	<?php //else: ?>
		<input class="search-block__search" type="text" placeholder="альпинист" autofocus name="request" id="search-inp">
	<?php //endif; ?> -->

	<button class="search-block__set-btn btn btn__enter"><i class="fas fa-sliders-h"></i></button>
	<input class="search-block__submit  btn btn__enter" type="submit" value="Найти" name="find">
</form>