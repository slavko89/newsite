
  $("#box-preview1 input[type=file]").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
			var imgFile = this.files[0];
			var thisImg = $("#image-preview .active");
				
				reader.onload = function (e) {
					if(imgFile.size <= 307200){
						$('#image-preview .active').before(	'<div id = "box-preview">'+ 
																'<img src="' + e.target.result + '" id="thumb-image"/></br>' +
															'</div>'
															);
																					
						$('#image-preview .active').removeClass('active').hide();
						thisImg.next().addClass('active').show();

					}else{
						alert("Розмір файлу перевищує 300 кб");
					}
				}
				
				reader.readAsDataURL(this.files[0]);

        }

   });
   
   $("input[type=button]").on("click", function(){
	  alert("ура");
   });
  

    
		
   