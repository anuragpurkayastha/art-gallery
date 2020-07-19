/*	Script to display only selected categories of paintings 	*/

/*	ORIGINAL
$(function(){
	//	On a change of the selected category value.
	$( '#selectCategoryMenu' ).on('change',function(){
		
		//	Get the selected category.
		let selectedCategory = $( '#selectCategoryMenu' ).val();
		
		//	Reload the page with the selected category as part of the URL.
		window.location.href = encodeURI('gallery.php?category='+selectedCategory.toLowerCase());
	});
});
*/

$(function(){
	
	//	On a change of the selected category value.
	$( '#selectCategoryMenu' ).on('change', function(){
		
		// 	Get the selected category
		let selectedCategory = $(' #selectCategoryMenu' ).val();
		
		//	Form the url with the category as an option
		//let url = encodeURI('display_category.php?category='+selectedCategory.toLowerCase());
		
		$.ajax({
				url: 'display_category.php',
				type: 'POST',
				data: 'category='+selectedCategory.toLowerCase(),
				dataType: 'html',
				success: function(result){
					$( '#images' ).html(result);
				}
		});
		
		//	Perform an Ajax request
	});
});
