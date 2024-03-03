<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}">
    <title>Test Fabbi</title>
</head>

<body>
    <div class="container mt-5">
        <!-- Thanh chuyển step -->
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1">Radio 1</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">Radio 2</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">Radio 3</label>
        </div>

        <!-- Nội dung từng step -->
        <div id="step1" class="step-content mt-3">
            <h2>Step 1: Information</h2>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
            </form>
        </div>

        <div id="step2" class="step-content" style="display: none;">
            <h2>Step 2: Shipping Address</h2>
            <form>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city">
                </div>
            </form>
        </div>

        <div id="step3" class="step-content" style="display: none;">
            <h2>Step 3: Payment</h2>
            <form>
                <div class="mb-3">
                    <label for="card" class="form-label">Credit Card</label>
                    <input type="text" class="form-control" id="card">
                </div>
                <div class="mb-3">
                    <label for="expiry" class="form-label">Expiry Date</label>
                    <input type="text" class="form-control" id="expiry">
                </div>
            </form>
        </div>

        <!-- Nút Next và Previous -->
        <div class="mt-3">
            <button type="button" class="btn btn-secondary" id="prevBtn">Previous</button>
            <button type="button" class="btn btn-primary float-end" id="nextBtn">Next</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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

            prevBtn.click(function() {
                showStep(currentStep - 1);
            });

            nextBtn.click(function() {
                if (currentStep < steps.length - 1) {
                    showStep(currentStep + 1);
                } else {
                    // Xử lý logic khi submit ở đây
                    alert('Form submitted!');
                }
            });

            stepButtons.each(function(index, button) {
                $(button).click(function() {
                    showStep(index);
                });
            });

            // Hiển thị bước đầu tiên khi trang được tải
            showStep(0);
        });
    </script>
</body>

</html>
