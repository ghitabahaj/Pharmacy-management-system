let resetForm = $('#reset-form');

resetForm.click(function(){
    document.getElementById("RegisterForm").reset();
})

$(document).ready(function() {
    $('#reset-form').click(function(event) {
      event.preventDefault();
    });
  });