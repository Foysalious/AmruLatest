//navbar mob
$(document).ready(function(){
	$(".show-nav").click(function(){
		$(".left-sidebar").css({
			'display' : 'block',
			'width' : '100%'
		})
		$(".main-content").css({
			'display' : 'none',
		});
		$(".show-nav").hide();
		$(".hide-nav").show();
	})
	$(".hide-nav").click(function(){
		$(".left-sidebar").css({
			'display' : 'none',
			'width' : '0'
		})
		$(".main-content").css({
			'display' : 'block',
			'width' : '100%'

		});
		$(".show-nav").show();
		$(".hide-nav").hide();
	})
})

//navbar dropdown
$(document).ready(function(){
	$('.navbar-dropdown-top').click(function(){
		var navId = $(this).attr('id');
		if( navId != 'all'){
			$('.' + navId).slideToggle();
			
		}
	})
})


//filtering row
$(document).ready(function(){
	$(".filter-item").click(function(){
		var selectItem 	= $(this).attr('id');
		var selectRow 	= $(this).attr('id');
		if( selectItem != 'all' ){
			$(".filter-item").removeClass("active-item");
			$("." + selectItem).addClass("active-item");
		}
		if( selectRow != 'all' ){
			$(".filter-row").removeClass("active-row");
			$(".filter-row").removeClass("active-item");
			$("." + selectRow).addClass("active-row");
		}
	})
})

$('#image').change(function(){
          
    let reader = new FileReader();
    reader.onload = (e) => { 
    $('#image_preview_container').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 

});

$('#image2').change(function(){
          
    let reader = new FileReader();
    reader.onload = (e) => { 
    $('#image_preview_container_2').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 

});

$('#image3').change(function(){
          
    let reader = new FileReader();
    reader.onload = (e) => { 
    $('#image_preview_container_3').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 

});