
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

var show = function() {
     console.log("Orientation type is " + screen.orientation.type);
     console.log("Orientation angle is " + screen.orientation.angle);
  }

screen.orientation.addEventListener("change", show);
window.onload = show;

$('tr[data-href]').on("click", function() {
	href = $(this).data('href');
	axios.get(href).then(function (response) {
	$("#modal-container").removeAttr("class").addClass('one');
    $('nav').hide('slow');
    $("body").addClass("modal-active");
    $('.modal').scrollTop(0);
    $('#details').html(response.data);
    if ($('#details > div > div').hasClass('alert')) {
      $("#live-button").hide();
    } else{
      $("#live-button").show();
    }
    $('#live-div').append("<p id='match_ref' hidden>"+href+"</p>");
	}).catch(function (error) {
		console.log(error);
	});
});

$('div.box[data-href]').on("click", function() {
  href = $(this).data('href');
  axios.get(href).then(function (response) {
  $("#modal-container").removeAttr("class").addClass('five');
    $('nav').hide('slow');
    $("body").addClass("modal-active");
    $('.modal').scrollTop(0);
    $('#details').html(response.data);
    $('#live-div').append("<p id='match_ref' hidden>"+href+"</p>");
  }).catch(function (error) {
    console.log(error);
  });
});

$("#live-button").on("click", function() {
	$('body').addClass('loading');
    axios.get('/live').then(function (response) {
	  	axios.get($('#match_ref').text()).then(function (response) {
			    $('#details').html(response.data);
			    $('body').removeClass('loading');
		}).catch(function (error) {
			console.log(error);
		});
	}).catch(function (error) {
		console.log(error);
	});
});

$('#details').click(function(){
  $('nav').show('slow');
	$('#modal-container').addClass('out');
	$('body').removeClass('modal-active');
});

/*
var modalBtn = $('button');
var modal = $('#myModal');
var animInClass = "rollIn";
var animOutClass = "rollOut";

modalBtn.on('click', function() {
  animInClass = selectIn.find('option:selected').val();
  animOutClass = selectOut.find('option:selected').val();
  if ( animInClass == '' || animOutClass == '' ) {
    alert("Please select an in and out animation type.");
  } else {
    modal.addClass(animInClass);
    modal.modal({backdrop: false});
  }
})

modal.on('show.bs.modal', function () {
  var closeModalBtns = modal.find('button[data-custom-dismiss="modal"]');
  closeModalBtns.one('click', function() {
    modal.on('webkitAnimationEnd oanimationend msAnimationEnd animationend', function( evt ) {
      modal.modal('hide')
    });
    modal.removeClass(animInClass).addClass(animOutClass);
  })
})

modal.on('hidden.bs.modal', function ( evt ) {
  var closeModalBtns = modal.find('button[data-custom-dismiss="modal"]');
  modal.removeClass(animOutClass)
  modal.off('webkitAnimationEnd oanimationend msAnimationEnd animationend')
  closeModalBtns.off('click')
})*/