// variabel



//function
function sidebarToggle(){
	$('.menu-toggle').click(function(){
		$(this).toggleClass('full')
		$('#site-main').toggleClass('full')
		$('#site-sidebar').toggleClass('full')
		$('#site-header').toggleClass('full')
		$('#site-sidebar .sidebar-inner ul li a .logo-text').animate({opacity:'toggle'},0)
	})
}
function submenuToggle(){
	$('#site-sidebar .sidebar-inner ul li.has-submenu').click(function(){
			event.preventDefault();
	    var submenu = $(this).toggleClass('active').find('.submenu');
	    submenu.slideToggle(150);
	})
}

function addAnimateDropdrownBootstrap() {
 // Add slideDown animation to Bootstrap dropdown when expanding.
  $('.dropdown').on('show.bs.dropdown', function() {
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
  });
  // Add slideUp animation to Bootstrap dropdown when collapsing.
  $('.dropdown').on('hide.bs.dropdown', function() {
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp(150);
  });
}

function googleInputHasValue(){
	$('input.form-control, input, textarea').on('change', function(){
		if($(this).val() != ""){
			$(this).siblings('label').addClass('has-val')
		} else {
			$(this).siblings('label').removeClass('has-val')
		}
	})
}

//document ready
$(document).ready(function(){
	sidebarToggle();
	submenuToggle();
	addAnimateDropdrownBootstrap();
	googleInputHasValue();
	$('.play-data-table').DataTable({
		 "paging":   false,
	    "ordering": true,
	    "info":     false
	})
})