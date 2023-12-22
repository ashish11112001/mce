$(function(){
    'use strict'
    
    $("#msg").fadeOut(5000);

    // Profile pic upload
    $("#logo").change(function(){
        var img = document.getElementById('logo');

        readIMG(this);
        
        var _URL = window.URL || window.webkitURL;
        var image, logo;
        if ((logo = this.files[0])) {
            image = new Image();
            image.onload = function() {
                var width = this.width;
                var height = this.height;

                if(width <= 2000 && height <= 2000){
                    $("#res").html("");
                    $("#pic").prop('disabled',false);
                }else {
                    $("#res").html("Uploaded image exceeds size limit..!!");
                    $("#pic").prop('disabled',true);
                }
            };
            image.src = _URL.createObjectURL(logo);
        }
    });

    $("#pic").prop('disabled',true);

    $("#logo").change(function(){
        var file = $("#logo").val();
        if(file != '')
          $("#pic").prop('disabled',false);
        else $("#pic").prop('disabled',true);
    });
    
 
})
  
function readIMG(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
             $('#img_upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }else{
         $('#img_upload').attr('src', '<?=base_url();?>assets/student_pics/avatar.jpg');
         $("#res").html("");
    }
}