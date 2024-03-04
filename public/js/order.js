$(document).ready(function() {
    let currentStep = 0;
    const steps = $('.step-content');
    const prevBtn = $('#prevBtn');
    const nextBtn = $('#nextBtn');
    const stepButtons = $('.btn-outline-primary');

    function showStep(stepIndex) {
        steps.each(function(index, step) {
            if (index === stepIndex) {
                $(step).show();
            } else {
                $(step).hide();
            }
        });
        currentStep = stepIndex;
        updateButtonVisibility();
    }

    function updateButtonVisibility() {
        if (currentStep === 0) {
            prevBtn.hide();
        } else {
            prevBtn.show();
        }

        if (currentStep === steps.length - 1) {
            nextBtn.text('Submit');
        } else {
            nextBtn.text('Next');
        }
    }

    //Validate inputs
    function validateStep(step) {
        let error = false;

        $(step).find('form').find('input').each(function(index, input) {
            if (!$(input).val()) {
                $(input).addClass('is-invalid');
                error = true;
            } else {
                $(input).removeClass('is-invalid');
            }
        });

        $(step).find('form').find('select').each(function(index, select) {
            if (!$(select).val()) {
                $(select).addClass('is-invalid');
                error = true;
            } else {
                $(select).removeClass('is-invalid');
            }
        });

        return error;
    }

    prevBtn.click(function() {
        showStep(currentStep - 1);
    });

    nextBtn.click(function() {
        error = validateStep('#step' + (currentStep + 1));
        if (error) return;

        if (currentStep < steps.length - 1) {
            showStep(currentStep + 1);
        } else {
            // Xử lý logic khi submit ở đây
            alert('Form submitted!');
        }
    });

    stepButtons.each(function(index, button) {
        $(button).click(function() {
            error = validateStep('#step' + (index + 1));
            if (error) return;

            showStep(index);
        });
    });

    // Hiển thị bước đầu tiên khi trang được tải
    showStep(0);

    //Filter restaurant by meal
    $('#meal').change(function() {
        $('#restaurant').empty();
        const meal = $(this).val();
        let restaurantOptions = '<option value="">---</option>';

        var filteredRestaurants = DATA_DISHES.filter(function(restaurant) {
            return restaurant.availableMeals.includes(meal);
        }).map(function (restaurant) {
            return restaurant.restaurant;
        }).filter(function(value, index, self) {
            return self.indexOf(value) === index;
        });

        filteredRestaurants.forEach(function(restaurant) {
            restaurantOptions += `<option value="${restaurant}">${restaurant}</option>`
        })

        $('#restaurant').append(restaurantOptions)
    });

    //Filter dishes by restaurant
    $('#restaurant').change(function() {
        $('#dish').empty();
        const restaurant = $(this).val();
        let dishOptions = '<option value="">---</option>';

        var filteredDishes = DATA_DISHES.filter(function(dish) {
            return dish.restaurant === restaurant;
        }).map(function (dish) {
            return { id: dish.id, name: dish.name };
        });

        filteredDishes.forEach(function(dish) {
            console.log(dish.name)
            dishOptions += `<option value="${dish.id}">${dish.name}</option>`
        })
        $('#dish').append(dishOptions)
    })

    //Add dishes
    $('.add-dish').click(function() {
        var newRow = $(".dishes .row:first").clone();
        newRow.find('input').val('');
        newRow.find('select').val('');
        $('.dishes').append(newRow);
    })
});
