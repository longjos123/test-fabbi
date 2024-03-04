$(document).ready(function () {
    $('#nextBtn').click(function (event) {
        let selectDishes = [];
        let totalDish = 0;
        let isValid = true;

        $('select[id="dish"]').each(function() {
            const selectedDish = $(this).val();
            const errorMsg = $(this).next('.error-msg');

            if (selectedDish == '') {
                isValid = false;
                errorMsg.text('The dish field is required.');

                return false;
            } else {
                errorMsg.text('');
            }
            if ($.inArray(selectedDish, selectDishes) !== -1) {
                isValid = false;
                errorMsg.text('The dish has been selected previously.');

                return false;
            } else {
                selectDishes.push(selectedDish);
                errorMsg.text('');
            }
        });
        $('input[id="dish-qty"]').each(function () {
            totalDish = Number(totalDish) + Number($(this).val());
        })
        if (totalDish < NUM_OF_PEOPLE) {
            isValid = false;
            $('.error-qty-dish').text('The number of dishes is not enough.');

            return false;
        } else {
            $('.error-qty-dish').text('');
        }

        if (isValid) {
            event.preventDefault();
            $('#form-step3').submit();
        }
    })
})
