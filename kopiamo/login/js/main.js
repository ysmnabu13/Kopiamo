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
	if (x.type === "pword") {
	  x.type = "text";
	} else {
	  x.type = "pword";
	}
  } 

// function validator(){
// 	var x = document.getElementById("username").value;
// 	var y = document.getElementById("password").value;


// }