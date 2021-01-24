<?php
	// header('Content-Type: text/html; charset=utf-8');
	session_start();

	// $tagCount = 0;
	// if (isset($_POST['tags'])) {
	// 	$tags = filter_var(trim($_POST['tags']), FILTER_SANITIZE_STRING);

	// 	// $tags = filter_var(trim(), FILTER_SANITIZE_STRING);
	// 	// $tagCount++; 
	// 	echo "Hello" . $tags;
	// }
	
	if (isset($_POST['submitPost'])) {

		$name = filter_var(trim($_POST['createPostName']), FILTER_SANITIZE_STRING);
		$descr = filter_var(trim($_POST['createPostDescr']), FILTER_SANITIZE_STRING);

		$startDate = filter_var(trim($_POST['startDate']), FILTER_SANITIZE_STRING);
		$endDate = filter_var(trim($_POST['endDate']), FILTER_SANITIZE_STRING);
		$period = filter_var(trim($_POST['period']), FILTER_SANITIZE_STRING);

		// echo $startDate;
		// echo $endDate;
		// echo $period;

		// $tags = filter_var(trim($_POST['tags']), FILTER_SANITIZE_STRING);

		// $userMail = filter_var(trim($_COOKIE['email']), FILTER_SANITIZE_STRING);

		// $img = $_FILES['avatar'];

		// echo $userMail;
		// echo "имя " . $name;

		$error = false;

		$error_name = "";
		$error_descr = "";

		if(mb_strlen($name) < 5 || mb_strlen($name) > 100) { //5 до 100
			$error_name = "Краткость - сестра таланта. Длина от 5 до 100 символов";
			$error = true;
		} 
		if(mb_strlen($descr) < 10 || mb_strlen($descr) > 500) {
			$error_descr = "От 10 до 500 символов";
			$error = true;
		}

		// echo "юзер - " . $_COOKIE['email'];

		if(!$error) {

			$postDate = time();

			$_SESSION["postName"] = $name;
			$_SESSION["postDescr"] = $descr;
			$_SESSION["postTime"] = $postDate;


			$_SESSION["startDate"] = $startDate;
			$_SESSION["endDate"] = $endDate;
			$_SESSION["period"] = $period;
			

			$_SESSION["tags"] = $tags;

			// echo "кол-во: " . $tagCount . "<br>";

			// echo "Теги: ".$tags;
			// exit();

			// $authSelect = $mysqlPost->query("SELECT `id` FROM `users` WHERE `email` = '$userMail'");
			// $authIDArr = $authSelect->fetch_assoc();

			// // echo 'result = ' . $authID['id'];
			// $authID = $authIDArr['id'];
			// // echo $authID;

			header('Location: php/create_post.php');
			// exit();
		}

		// sendImgInp
		// sendImgForm
		// sendImgBtn
		// createPostForm
		// createPost
		// createPostName
		// createPostDescr

	}

	// загрузка изображения в папку server/img
	if (isset($_POST['load_img'])) {
	// if (isset($_POST['load_img'])) {
		// echo "photo: ";
		// readfile( "server/img/" . $_FILES['avatar']['name']);

		// if ($img ) {}
		$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/server/img/'; 
		// echo "Корневая папка = " . $_SERVER['DOCUMENT_ROOT'];
		$uploadfile = $uploaddir.basename($_FILES['avatar']['name']);

		if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
			// echo "Файл загружен!";
		} else {
			// echo "Ошибка загрузки: " . $_FILES['avatar']['error'];
			exit(); 
		}
	}
?>

<script>
	// 
	// $('#create-tag-add').click(function(){
	// 	if ( $('#create-tag-search').val() !== '') {
	// 		console.log("HELLOO!");
	// 		var tagAdd = document.querySelector('#create-tag-add');
	// 		console.log(tagAdd);
	// 	}
	// 	// console.log( $('#create-tag-search').val() );
	// }
	//
	$('#createPost').click(function(e){
		// $postError = "<?php //echo $error ?>";
		// console.log($postError);
		if ( $('#sendImgInp')[0].files.length !== 0 ) {
			// $('#sendImgBtn').click();
			$('#sendImgForm').submit();
		}
		// $('#createPost').click(); 
		e.preventDefault();
	});
</script>


<div class="create-trip__overlay" id="overlay-block">
	<div class="create-trip__block">
		<div class="create-trip__head-color"></div>
		<h4 class="create-trip__header">Создать поездку</h4>
		

		<!-- PLACES Insert -->
		<div class="create-trip__places-list">
			<!-- <div class="create-trip__places-item">
				<a href="#" class="create-trip__places-link" id="delete-places"></a>
				<div class="create-trip__places-ico"><i class="fas fa-map-marker-alt"></i></div>
				<div class="create-trip__places-name">Африка</div>
				<div class="create-trip__places-exit"><i class="fas fa-times"></i></div>
			</div> -->
		</div>
		<!--  -->


		<!-- exit-btn -->
		<div class="create-trip__close btn" id="create-trip-close" ><i class="fas fa-times" aria-hidden="true"></i></div>

		<!-- IMG INSERT -->
		<form method="POST" enctype="multipart/form-data" id="sendImgForm">
			<div class="create-trip__insert-img">
				<input type="file" accept=".jpg, .jpeg, .png, .gif" name="avatar" id="sendImgInp" class="create-trip__insert-inp">
				<input type="submit" name="load_img" class="create-trip__insert-subm" id="sendImgBtn">  

				<div class="create-trip__insert-prev"><img id="preview" /></div>
				<a class="create-trip__insert-link" id="sendImgLink"></a> 
				<i class="fas fa-plus"></i>
			</div>
		</form>
		<!--  -->
		
		<form method="post" enctype="multipart/form-data" name="createPostForm">
			<textarea class="create-trip__textarea create-trip__name  create-required-field" name="createPostName" id="createTextarea1" cols="70" rows="6" placeholder="Как вы назовете свое путешествие?"></textarea>
			<!-- <span class="create-trip__error"><?=$error_name?></span>   -->

			<div class="create-trip__tag-list">
				<!-- <div class="create-trip__tag-item">
					<a href="#" class="create-trip__tag-link" id="delete-tag"></a>
					<div class="create-trip__tag-ico"><i class="fas fa-tag"></i></div>
					<div class="create-trip__tag-name">экстрим</div>
					<div class="create-trip__tag-exit"><i class="fas fa-times"></i></div>
				</div> -->
			</div>
			
			<!-- IMG INSERT -->
			<!-- <div class="create-trip__insert-img">
				<input type="file" accept=".jpg, .jpeg, .png, .gif" name="avatar" id="sendImgInp" class="create-trip__insert-inp">
				<input type="submit" name="load_img" class="create-trip__insert-subm" id="sendImgBtn"> 
				
				<div class="create-trip__insert-prev"><img id="preview" /></div>
				<a class="create-trip__insert-link" id="sendImgLink"></a> 
				<i class="fas fa-plus"></i>
			</div> -->

			<!-- <div class="create-trip__insert-img">
				<a href="#" class="create-trip__insert-link" id="trip-add-img"></a>
				<i class="fas fa-plus"></i>
			</div> -->
			
			<!-- text -->
			<textarea class="create-trip__textarea create-trip__descr  create-required-field" name="createPostDescr" id="createTextarea2" cols="70" rows="6" placeholder="Опишите свою поездку, чтобы найти попутчиков"></textarea> 
			<!-- <span class="create-trip__error"><?=$error_descr?></span> -->

			<div class="create-trip__date-wrap">
				<label>Начало поездки</label>
				<input type="text" name="startDate" class="datepicker-here create-trip__date create-trip__start-date no-enter" data-position="top left">
				<label>Конец поездки</label>
				<input type="text" name="endDate" class="datepicker-here create-trip__date create-trip__end-date no-enter" data-position="top right">
				<!--  -->
				<!-- Промежуток -->
				<br>
				<label>Или промежуток</label>
				<input type="text" name="period" class="datepicker-here create-trip__period create-trip__date  create-required-field   no-enter" data-position="top right" data-min-view="months" data-view="months" data-date-format="MM yyyy" data-range="true" data-multiple-dates-separator=" - " readonly>
			</div>

			<!--   -->
			<button class="create-trip__btn-det btn btn__detail" id="trip-det-btn"><i class="fas fa-bars"></i> Детали</button>

			<div class="create-trip__fellow-search"  id="trip-det-block">
				<!--  -->
				<label class="create-trip__fellow-label">Я ищу: </label>
				<div class="create-trip__fellow-choice">
					<a href="#" class="create-trip__fellow-link"></a>
					<i class="fas fa-male"></i> Мужчину
				</div>
				<div class="create-trip__fellow-choice">
					<a href="#" class="create-trip__fellow-link"></a>
					<i class="fas fa-female"></i> Женщину
				</div>
				<div class="create-trip__fellow-choice">
					<a href="#" class="create-trip__fellow-link"></a>
					<i class="fas fa-user-friends"></i> Компанию
				</div>
				<div class="create-trip__fellow-choice">
					<a href="#" class="create-trip__fellow-link"></a>
					<i class="fas fa-snowman"></i> Кого угодно
				</div>
			</div>

			<div class="create-trip__dop">
				<!-- PLACES -->
				<a href="#" class="create-trip__check create-trip__places"  id="places-open"><i class="fas fa-map-marker-alt"></i> Места</a>
				<div class="create-trip__places-wrap" id="places-block">
					<div class="create-trip__places-open">
						<div class="create-trip__places-header">Места</div>
						<a href="#" class="create-trip__places-done"  id="places-done">Готово</a>
						<input type="text" name="places" placeholder="Африка" class="create-trip__places-search   no-enter" id="create-places-search">
						<a href="#" class="create-trip__places-add" id="create-places-add"><i class="fas fa-plus"></i></a>
					</div>
				</div>
				<!-- TAGS -->
				<a href="#" class="create-trip__check create-trip__tags"  id="tag-open"><i class="fas fa-tags"></i> Теги</a>
				<div class="create-trip__tag-wrap"  id="tag-block">
					<div class="create-trip__tag-open">
						<div class="create-trip__tag-header">Теги</div>
						<a href="#" class="create-trip__tag-done"  id="tag-done">Готово</a>
						<input type="text" name="tags" placeholder="Экстрим" class="create-trip__tag-search   no-enter" id="create-tag-search">
						<button href="#" name="addTag" class="create-trip__tag-add" id="create-tag-add"><i class="fas fa-plus"></i></button>
					</div>
				</div>
				<!--  -->
			</div>
			

			<input type="submit" value="Создать объявление" name="submitPost" class="btn create-trip__create-btn disabled" id="createPost">
		</form>

	</div>
</div>