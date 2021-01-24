<?php
	// header('Content-Type: text/html; charset=utf-8');
	session_start();

	$name = $_SESSION["postName"];
	$descr = $_SESSION["postDescr"];
	$postDate = $_SESSION["postTime"];	

	$postCount = 1;

//Создание поста ввиде html блока в trips.php
	echo '<script language="javascript">';

	// echo "$newElem = `<li class='trips__item'>".
	// 				"<div class='trips__header-color'></div>
	// 				<!-- <a href='#' class='trips__link'></a> -->
					
	// 				<!-- Places -->
	// 				<div class='trips__place-list'>
	// 					<div class='trips__place-item'>
	// 						<a href='#' class='trips__place-link'></a>
	// 						<div class='trips__place-ico'><i class='fas fa-map-marker-alt'></i></div>
	// 						<div class='trips__place-name'>Африка</div>
	// 					</div>
	// 				</div>
	// 				<!-- IMG -->
	// 				<div class='trips__img'>
	// 					<img src='img/for header/2.jpg' alt='img'>
	// 				</div>
	// 				<!--  -->
	// 				<div class='trips__name'>".$name."</div>
	// 				<!--Tags -->
	// 				<div class='trips__tag-list'>
	// 					<div class='trips__tag-item'>
	// 						<a href='#' class='trips__tag-link'></a>
	// 						<div class='trips__tag-ico'><i class='fas fa-tag'></i></div>
	// 						<div class='trips__tag-name'>экстрим</div>
	// 					</div>
	// 				</div>
	// 				<!-- Descr -->
	// 				<div class='trips__descr-block'>
	// 					<div class='trips__descr'>".$descr."</div>
	// 					<div class='trips__descr-open'>подробнее +</div>
	// 				</div>
	// 				<!--  -->
					
	// 				<!--  -->
	// 				<div class='trips__time-block'>
	// 					<i class='far fa-clock'></i>
	// 					<div class='trips__start-date'>01.04.2020</div>
	// 					<span style='color: #00AAF9;'> - </span>
	// 					<div class='trips__end-date'>16.04.2020</div>
	// 					<!-- <div class='trips__period'>april 2020</div> -->	
	// 				</div>

	// 				<!--  -->
	// 				<!-- Author -->
	// 				<div class='trips__author-block'>
	// 					<div class='trips__author-img'><a href='#'><img src='img/avatars/1.jpg'></a></div>
	// 					<div class='trips__author-name'><a href='#'>Иван Deus Вульф</a></div>
	// 					<div class='trips__author-status'>зожник, экстремал</div>
	// 				</div>
	// 				<!-- search characteristics -->
	// 				<div class='trips__search-person'><i class='fas fa-male'></i> / <i class='fas fa-female'></i></div>
	// 				<div class='trips__search-person-popup  hidden'>Иван ищет в попутчики: парня, девушку</div>
	// 				<!--  -->
	// 				<div class='trips__post-time'>'.$postDate.'</div>
	// 				<!-- Members -->
	// 				<div class='trips__members-list'>
	// 					<div class='trips__members-label'>Попутчики:</div>
	// 					<div class='trips__members-item'>
	// 						<div class='trips__members-circle'>
	// 							<img src='img/avatars/3.jpg'>
	// 						</div>
	// 					</div>
	// 				</div>
	// 				<!--  -->
	// 			</li>`";

	// echo "$('#post-list').prepend($newElem)";

	// $newElem = `<li class='trips__item' id='post-item-".$postCount."'>".
	// 				"<div class='trips__header-color'></div>
	// 				<!-- <a href='#' class='trips__link'></a> -->
					
	// 				<!-- Places -->
	// 				<div class='trips__place-list'>
	// 					<div class='trips__place-item'>
	// 						<a href='#' class='trips__place-link'></a>
	// 						<div class='trips__place-ico'><i class='fas fa-map-marker-alt'></i></div>
	// 						<div class='trips__place-name'>Африка</div>
	// 					</div>
	// 				</div>
	// 				<!-- IMG -->
	// 				<div class='trips__img'>
	// 					<img src='img/for header/2.jpg' alt='img'>
	// 				</div>
	// 				<!--  -->
	// 				<div class='trips__name'>".$name."</div>
	// 				<!--Tags -->
	// 				<div class='trips__tag-list'>
	// 					<div class='trips__tag-item'>
	// 						<a href='#' class='trips__tag-link'></a>
	// 						<div class='trips__tag-ico'><i class='fas fa-tag'></i></div>
	// 						<div class='trips__tag-name'>экстрим</div>
	// 					</div>
	// 				</div>
	// 				<!-- Descr -->
	// 				<div class='trips__descr-block'>
	// 					<div class='trips__descr'>".$descr."</div>
	// 					<div class='trips__descr-open'>подробнее +</div>
	// 				</div>
	// 				<!--  -->
					
	// 				<!--  -->
	// 				<div class='trips__time-block'>
	// 					<i class='far fa-clock'></i>
	// 					<div class='trips__start-date'>01.04.2020</div>
	// 					<span style='color: #00AAF9;'> - </span>
	// 					<div class='trips__end-date'>16.04.2020</div>
	// 					<!-- <div class='trips__period'>april 2020</div> -->	
	// 				</div>

	// 				<!--  -->
	// 				<!-- Author -->
	// 				<div class='trips__author-block'>
	// 					<div class='trips__author-img'><a href='#'><img src='img/avatars/1.jpg'></a></div>
	// 					<div class='trips__author-name'><a href='#'>Иван Deus Вульф</a></div>
	// 					<div class='trips__author-status'>зожник, экстремал</div>
	// 				</div>
	// 				<!-- search characteristics -->
	// 				<div class='trips__search-person'><i class='fas fa-male'></i> / <i class='fas fa-female'></i></div>
	// 				<div class='trips__search-person-popup  hidden'>Иван ищет в попутчики: парня, девушку</div>
	// 				<!--  -->
	// 				<div class='trips__post-time'>'.$postDate.'</div>
	// 				<!-- Members -->
	// 				<div class='trips__members-list'>
	// 					<div class='trips__members-label'>Попутчики:</div>
	// 					<div class='trips__members-item'>
	// 						<div class='trips__members-circle'>
	// 							<img src='img/avatars/3.jpg'>
	// 						</div>
	// 					</div>
	// 				</div>
	// 				<!--  -->
	// 			</li>`;

	// for ($postCount=0; ; $postCount++) {
	// 	echo "$('#post-list').prepend(".$newElem.")";
	// }

	echo "$('#post-list').prepend(`<li class='trips__item' id='post-item-".$postCount."'>".
					"<div class='trips__header-color'></div>
					<!-- <a href='#' class='trips__link'></a> -->
					
					<!-- Places -->
					<div class='trips__place-list'>
						<div class='trips__place-item'>
							<a href='#' class='trips__place-link'></a>
							<div class='trips__place-ico'><i class='fas fa-map-marker-alt'></i></div>
							<div class='trips__place-name'>Африка</div>
						</div>
					</div>
					<!-- IMG -->
					<div class='trips__img'>
						<img src='img/for header/2.jpg' alt='img'>
					</div>
					<!--  -->
					<div class='trips__name'>".$name."</div>
					<!--Tags -->
					<div class='trips__tag-list'>
						<div class='trips__tag-item'>
							<a href='#' class='trips__tag-link'></a>
							<div class='trips__tag-ico'><i class='fas fa-tag'></i></div>
							<div class='trips__tag-name'>экстрим</div>
						</div>
					</div>
					<!-- Descr -->
					<div class='trips__descr-block'>
						<div class='trips__descr'>".$descr."</div>
						<div class='trips__descr-open'>подробнее +</div>
					</div>
					<!--  -->
					
					<!--  -->
					<div class='trips__time-block'>
						<i class='far fa-clock'></i>
						<div class='trips__start-date'>01.04.2020</div>
						<span style='color: #00AAF9;'> - </span>
						<div class='trips__end-date'>16.04.2020</div>
						<!-- <div class='trips__period'>april 2020</div> -->	
					</div>

					<!--  -->
					<!-- Author -->
					<div class='trips__author-block'>
						<div class='trips__author-img'><a href='#'><img src='img/avatars/1.jpg'></a></div>
						<div class='trips__author-name'><a href='#'>Иван Deus Вульф</a></div>
						<div class='trips__author-status'>зожник, экстремал</div>
					</div>
					<!-- search characteristics -->
					<div class='trips__search-person'><i class='fas fa-male'></i> / <i class='fas fa-female'></i></div>
					<div class='trips__search-person-popup  hidden'>Иван ищет в попутчики: парня, девушку</div>
					<!--  -->
					<div class='trips__post-time'>'.$postDate.'</div>
					<!-- Members -->
					<div class='trips__members-list'>
						<div class='trips__members-label'>Попутчики:</div>
						<div class='trips__members-item'>
							<div class='trips__members-circle'>
								<img src='img/avatars/3.jpg'>
							</div>
						</div>
					</div>
					<!--  -->
				</li>`)";


	// echo `<li class="trips__item">
	// 				<div class="trips__header-color"></div>
	// 				<!-- <a href="#" class="trips__link"></a> -->
					
	// 				<!-- Places -->
	// 				<div class="trips__place-list">
	// 					<div class="trips__place-item">
	// 						<a href="#" class="trips__place-link"></a>
	// 						<div class="trips__place-ico"><i class="fas fa-map-marker-alt"></i></div>
	// 						<div class="trips__place-name">Африка</div>
	// 					</div>
	// 				</div>
	// 				<!-- IMG -->
	// 				<div class="trips__img">
	// 					<img src="img/for header/2.jpg" alt="img">
	// 				</div>
	// 				<!--  -->
	// 				<div class="trips__name">`.$name.`</div>
	// 				<!--Tags -->
	// 				<div class="trips__tag-list">
	// 					<div class="trips__tag-item">
	// 						<a href="#" class="trips__tag-link"></a>
	// 						<div class="trips__tag-ico"><i class="fas fa-tag"></i></div>
	// 						<div class="trips__tag-name">экстрим</div>
	// 					</div>
	// 				</div>
	// 				<!-- Descr -->
	// 				<div class="trips__descr-block">
	// 					<div class="trips__descr">`.$descr.`</div>
	// 					<div class="trips__descr-open">подробнее +</div>
	// 				</div>
	// 				<!--  -->
					
	// 				<!--  -->
	// 				<div class="trips__time-block">
	// 					<i class="far fa-clock"></i>
	// 					<div class="trips__start-date">01.04.2020</div>
	// 					<span style="color: #00AAF9;"> - </span>
	// 					<div class="trips__end-date">16.04.2020</div>
	// 					<!-- <div class="trips__period">april 2020</div> -->	
	// 				</div>

	// 				<!--  -->
	// 				<!-- Author -->
	// 				<div class="trips__author-block">
	// 					<div class="trips__author-img"><a href="#"><img src="img/avatars/1.jpg"></a></div>
	// 					<div class="trips__author-name"><a href="#">Иван Deus Вульф</a></div>
	// 					<div class="trips__author-status">зожник, экстремал</div>
	// 				</div>
	// 				<!-- search characteristics -->
	// 				<div class="trips__search-person"><i class="fas fa-male"></i> / <i class="fas fa-female"></i></div>
	// 				<div class="trips__search-person-popup  hidden">Иван ищет в попутчики: парня, девушку</div>
	// 				<!--  -->
	// 				<div class="trips__post-time">`.$postDate.`</div>
	// 				<!-- Members -->
	// 				<div class="trips__members-list">
	// 					<div class="trips__members-label">Попутчики:</div>
	// 					<div class="trips__members-item">
	// 						<div class="trips__members-circle">
	// 							<img src="img/avatars/3.jpg">
	// 						</div>
	// 					</div>
	// 				</div>
	// 				<!--  -->
	// 			</li>`;
	// echo `var newItem = `.$new_item.`;`;


	echo '$("#post-list").filter(":first").remove';  ///если требуется убрать первый элемент со страницы (вставленный через js)
	echo '</script>';

	$postCount++;
	///
	// header('Location: /trips.php');
?>