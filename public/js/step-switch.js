$(document).ready(function () {
    var url = window.location.href;
    var baseUrl = url.split('?')[0];
    var parts = baseUrl.split('/');
    var currentStep = parts[parts.length - 1];
    console.log(currentStep)

    setActiveStep(currentStep);

    function setActiveStep(step) {
        $('.btn-group a').removeClass('active');
        $('#step-' + step).addClass('active');
    }

    $('.btn-group a').click(function(){
        var clickedStep = parseInt($(this).attr('id').split('-')[1]);
        if(clickedStep - currentStep == 1) {
            currentStep = clickedStep;
            setActiveStep(currentStep);
            console.log(currentStep)
            $('#form-step-'+(Number(currentStep) - 1)).submit();

        } else if(clickedStep < currentStep) {
            let route = baseUrl.replace(currentStep, clickedStep);
            currentStep = clickedStep;
            setActiveStep(currentStep);

            window.location.href = route;
        }
    });
})
