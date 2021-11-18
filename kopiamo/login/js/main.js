$(function() {

    $('.btn-link[aria-expanded="true"]').closest('.accordion-item').addClass('active');
  $('.collapse').on('show.bs.collapse', function () {
	  $(this).closest('.accordion-item').addClass('active');
	});

  $('.collapse').on('hidden.bs.collapse', function () {
	  $(this).closest('.accordion-item').removeClass('active');
	});

    

});

function showPass() {
	var x = document.getElementById("pword");
	if (x.type === "password") {
	  x.type = "text";
	} else {
	  x.type = "password";
	}
  } 

// function validator(){
// 	var x = document.getElementById("username").value;
// 	var y = document.getElementById("password").value;


// }