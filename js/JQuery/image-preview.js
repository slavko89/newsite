$("#files").on('change', function () {

     var imgItem = $(this)[0].files;
     var countFiles = $(this)[0].files.length;
	 var imgPath = $(this)[0].value;
	 var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-preview");
     image_holder.empty();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {

            for (var i = 0; i < countFiles; i++) {
				var imgType = imgItem[i].type;
				var imgSize = imgItem[i].size;
				var imgName = imgItem[i].name;
				var reader = new FileReader();
						reader.onload = function (e) {
							$(image_holder).append('<div id = "box-preview">'+ '<img src="'+e.target.result+'" id="thumb-image"/><div/>');
						}
						image_holder.show();
						reader.readAsDataURL($(this)[0].files[i]);
			
			}

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });