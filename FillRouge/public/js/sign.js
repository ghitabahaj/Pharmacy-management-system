let upForm = $('#sign-up');
let inForm = $('#sign-in');
let inBtn = $('#lg-Btn');
let upBtn = $('#su-Btn');

function whoIsActive(buttonActive,buttonNotActive){
    buttonActive.removeClass('button1');
    buttonActive.addClass('bg-white');
    buttonNotActive.addClass('button1');
    buttonNotActive.removeClass('bg-white');
}

inBtn.click(function(){
    upForm.addClass('d-none');
    inForm.removeClass('d-none');
    whoIsActive(inBtn,upBtn);
})

upBtn.click(function(){
    upForm.removeClass('d-none');
    inForm.addClass('d-none');
    whoIsActive(upBtn , inBtn);
})