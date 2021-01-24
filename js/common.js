
//изменение Input-а с паролем при нажатии на eye-инонку 
$('#pass-eye').click(function(){
	if( $(this).hasClass("eye_closed") ) {
		$(this).children().empty();
		$(this).html('<i class="fas fa-eye"></i>');
		$(this).toggleClass("eye_closed");

		$(this).prev('input').attr('type', 'text/plain');
	} else {
		$(this).children().empty();
		$(this).html('<i class="fas fa-eye-slash"></i>');
		$(this).toggleClass("eye_closed");

		$(this).prev('input').attr('type', 'password');
	}
});


//активация кнопки в popup форме при заполнении input
$('.popup__form').keyup(function(){
	$emp = 0;
	$('.popup__form').each(function(){
		if ( $(this).val() === '') {
			$emp +=1;
		} else {
			return;
		}
	});
	if ($emp == 0) { 
		$('.popup__enter').removeClass('disabled');
	} else {
		$('.popup__enter').addClass('disabled');
	}
});


//всплывающая форма при нажатии на кнопку Войти
$(document).ready(function(){  
	$btn_ent = $('#auth-btn');
	$btn_ent.click(function(){
		$('.overlay').fadeIn(100);
		$('.popup').fadeIn(200);

		$('.overlay').toggleClass('active');
		$('body').toggleClass('overflow_h'); //?
	});
});

//закрытие всплывашки с авторизацией
$('#close-btn').click(function(){
	$('.popup').fadeOut(100);
	$('.overlay').fadeOut(200);

	$('.overlay').toggleClass('active');
	$('body').toggleClass('overflow_h'); //?
});


//всплывание блока меню при наведении на profile__btn
$('#prof-btn').mouseenter(function(){
	$(this).next('#dropdown-mnu').fadeIn(300);
});
// скрытие блока меню при расфокусе
// $('#dropdown-mnu').mouseleave(function(){
// 	$(this).fadeOut(300);
// });

$(document).mousemove(function(e){
	// console.log(e.target);
	if (e.target!=$('#dropdown-mnu')[0] && !$('#dropdown-mnu').has(e.target).length 
		&& e.target!=$('#prof-btn')[0] && !$('#prof-btn').has(e.target).length) {
		$('#dropdown-mnu').fadeOut(300);
		$('#prof-btn').removeClass('active');
	} else {
		$('#prof-btn').addClass('active');
	}
});



//регистрация. Активация кнопки зарегестрироваться при заполнении input-ов
$('.register__form').keyup(function(){
	$emp = 0;
	$('.register__form').each(function(){
		if ( $(this).val() === '') {
			$emp +=1;
		} else {
			return;
		}
	});
	if ($emp == 0) { 
		$('.register__enter').removeClass('disabled');
	} else {
		$('.register__enter').addClass('disabled');
	}
});


// авто увелечение высоты textarea
autosize($('textarea'));


//всплывашка Дополнительно в форме Создания объявления
$('#trip-det-btn').click(function(e){
	$('#trip-det-block').toggleClass('show-flex');
	$('#trip-det-block').toggleClass('animated bounceIn');
	e.preventDefault();
	// if (e.keyCode = 13) {
	// 	e.preventDefault();
	// }
});


$(document).ready(function(){
	$('.no-enter').keypress(function(e){
		if (e.keyCode == 13) {
			e.preventDefault();
		}
	});
});
// $(document).keypress(function(e){
// 	if (e.keyCode = 13) {
// 		e.preventDefault();
// 	}
// });

////////////////////


//всплывающая форма создания объявления при нажатии на "+"
$(document).ready(function(){
	$('#btn-create-post').click(function(){
		$('#overlay-block').fadeIn(100);
		$('.create-trip__block').fadeIn(200);

		$("body").toggleClass('overflow_h'); //скрыть скролл
		// $('.overlay').toggleClass('active');
		// $('body').toggleClass('overflow_h'); //?
	});
});

//Закрытие всплывашки создания объявления
$('#create-trip-close').click(function(){
	$('.create-trip__block').fadeOut(100);
	$('#overlay-block').fadeOut(200);

	if ( $('#trip-det-block').hasClass('show-flex') ) {
		$('#trip-det-block').removeClass('animated bounceIn');
		$('#trip-det-block').removeClass('show-flex');
	}
	$("body").toggleClass('overflow_h'); //скрыть скролл
	// $('.overlay').toggleClass('active');
});


//открытие и закрытия подменю с тегами в блоке создания объявления
$('#tag-open').click(function(){
	$('#tag-block').fadeIn(100);
});

$('#tag-done').click(function(){
	$('#tag-block').fadeOut(100);
});

//открытие и закрытие блока "Места" в создании объявлений
$('#places-open').click(function(){
	$('#places-block').fadeIn(100);
});

$('#places-done').click(function(){
	$('#places-block').fadeOut(100);
});



//ЗАГРУЗКА  превью изображения в форму создания объявления

$("#sendImgLink").click(function(){
	$('#sendImgInp').click();	
});


$('#sendImgInp').change(function(){
	// console.log($('#sendImgInp')[0].files[0]);
	if ( $(this)[0].files.length !== 0 ) {
		console.log("есть загрузка");
		$url = URL.createObjectURL( $(this)[0].files[0] );
		$('#preview').attr('src', $url);

		// $('#sendImgForm').submit();

		// $('#sendImgBtn').click(); //нажатие на submit -> отправка формы
	}
});

//Отключает автообновлении при отправки формы
// $('#sendImgForm').submit(function(e){
// 	e.preventDefault();
// });


//........................................
// $('#createPost').click(function(e){
// 	$postError = "<?php echo $error ?>";
// 	console.log($postError);
// 	if ( $('#sendImgInp')[0].files.length !== 0 ) {
// 		$('#sendImgBtn').click();
// 	}

//.......................................

// 	// $('#createPost').click(); 
// 	e.preventDefault();
// });



$('#createPostForm').submit(function(e){
	e.preventDefault();
});

//....................................//


//Активация кнопки "Создать объявлении" при заполненных полях
//keyup
$('.create-required-field').focusout(function(){
	$emp = 0;
	$('.create-required-field').each(function(){
		if ( $(this).val() === '') {
			$emp +=1;
		} else {
			return;
		}
	});
	if ($emp == 0) {
		$('#createPost').removeClass('disabled');
	} else {
		$('#createPost').addClass('disabled');
	}
});


//////////////////
//Подгонка фона под размеры textarea в "Создании объявления"
$(document).ready(function(){
	$('.create-trip__name').keydown(function(){
		$areaHeight = $('.create-trip__name').outerHeight()
		$bg = $('.create-trip__head-color');
		$bg.css('height', $areaHeight+115); 
		// console.log( $areaHeight );
	})

	$('.create-trip__name').keyup(function(){
		$areaHeight = $('.create-trip__name').outerHeight()
		$bg = $('.create-trip__head-color');
		$bg.css('height', $areaHeight+115); 
		// console.log( $areaHeight );
	})
});

//////////////////

/////////
//Вставка тегов в объявление и очищение инпута по нажатию кнопки +
$('#create-tag-add').click(function(){
	$tagSearch = $('#create-tag-search');
	// console.log($tagSearch.val());
	if ($tagSearch.val() !== '') {
		$tagVal = $tagSearch.val();
		// console.log($tagVal);

		$tagInsert = '<div class="create-trip__tag-item"><a href="#" class="create-trip__tag-link"></a><div class="create-trip__tag-ico"><i class="fas fa-tag"></i></div><div class="create-trip__tag-name">' + $tagVal +'</div><div class="create-trip__tag-exit"><i class="fas fa-times"></i></div></div>'
		$('.create-trip__tag-list').append($tagInsert);

		$tagSearch.val('');
	}
});

//...............................
//Удаление тега + счетчик тегов после удаления
$('html').on('click', '.create-trip__tag-link', function(){
	$search = $('#create-tag-search');
	$tagList = $('.create-trip__tag-list');
	$counter = $tagList.children().length;

	// console.log($counter-1 + ' on remove');

	$(this).parent().remove();
	if ($counter-1 < 5) {
		$search.removeClass('disabled');
	}
}); 
//.................
// $('.create-trip__tag-link').click(function(){
// 	// $(this).parent().remove();
// 	// $(this).detach();
// 	// $(this).remove();
// 	console.log('delete');
	//create-trip__tag-item
// });

//.................................

//Ограничение на ввод тегов в "Создании объявления"
$(document).ready(function(){
	$('#create-tag-add').click(function(e){
		$tag = $('.create-trip__tag-item');
		$search = $('#create-tag-search');
		$tagList = $('.create-trip__tag-list');
		$counter = $tagList.children().length;

		console.log($counter);

		if ($counter >= 5) {
			$search.addClass('disabled');
		}
		else {
			$search.removeClass('disabled');
		}

		e.preventDefault(); ///////////////////////////01.04.2020
	})
});
//.....................//

///..........................//////
//Вставка "мест" в объявление
$('#create-places-add').click(function(){
	$placeSearch = $('#create-places-search');
	// console.log($tagSearch.val());
	if ($placeSearch.val() !== '') {
		$placesVal = $placeSearch.val();

		// console.log($placesVal);
		$placesInsert = '<div class="create-trip__places-item"><a href="#" class="create-trip__places-link" id="delete-places"></a><div class="create-trip__places-ico"><i class="fas fa-map-marker-alt"></i></div><div class="create-trip__places-name">' + $placesVal + '</div><div class="create-trip__places-exit"><i class="fas fa-times"></i></div></div>';
		$('.create-trip__places-list').append($placesInsert);

		$placeSearch.val('');
	}
});
//.........................................................///
//удаление мест и пересчет их кол-ва
$('html').on('click', '.create-trip__places-item', function(){
	$searchPlace = $('#create-places-search');
	$placeList = $('.create-trip__places-list');
	$placeCounter = $placeList.children().length;

	// console.log($placeCounter-1 + ' on remove');

	$(this).remove();
	if ($placeCounter-1 < 4) {
		$searchPlace.removeClass('disabled');
	}
}); 

//..........................................//
//Счетчик кол-ва добаленных мест и ограничения
$(document).ready(function(){
	$('#create-places-add').click(function(){
		$place = $('.create-trip__places-item');
		$searchPlace = $('#create-places-search');
		$placeList = $('.create-trip__places-list');
		$placeCounter = $placeList.children().length;

		// console.log($counter);

		if ($placeCounter >= 4) {
			$searchPlace.addClass('disabled');
		}
		else {
			$searchPlace.removeClass('disabled');
		}
	})
});

//..........................//


$(document).ready(function(){
	$pBtn = $('.trips__search-person');
	$pLabel = $('.trips__search-person-popup');

	$pBtn.hover(function(){
		$pLabel.toggleClass('hidden');
		// $pLabel.toggleClass('animated slideInLeft');
	});
});

//................................//

$('.trips__descr-open').click(function(){
	// $('.trips__descr').toggleClass('open');
	$(this).prev('.trips__descr').toggleClass('open');
});

// .trips__search-person:hover
// 	box-shadow: 0 8px 20px rgba(18, 27, 73, 0.2)
// 	.trips__search-person-popup
// 		display: block



//////////////////

// $(document).ready(function(){
// 	$('#create-textarea').change(function(){
// 		$pageHeight = $(document).outerHeight();
// 		console.log($pageHeight);
// 	})
// 	// print($pageHeight);
// });


// print($pageHeight); ---- //ПЕЧАТЬ СТРАНИЦЫ (открывает менеджер печати) ИЛИ сохраянет файл (pdf)