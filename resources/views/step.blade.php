@extends('index')

@section('content')
    <div class="mt-3">
        <div id="step1" class="step-content mt-3">
            <h2>Step 1</h2>
            <form>
                <div class="mb-3">
                    <label for="meal" class="form-label">Please select a meal</label>
                    <select class="form-select" id="meal">
                        <option value="">---</option>
                        @foreach(\App\Constants\OrderConstants::MEALS as $key => $meal)
                            <option value="{{ $key }}">{{ $meal }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Please enter number of people</label>
                    <input type="number" class="form-control" id="qty">
                </div>
            </form>
        </div>

        <div id="step2" class="step-content" style="display: none;">
            <h2>Step 2</h2>
            <form>
                <div class="mb-3">
                    <label for="restaurant" class="form-label">Please select a restaurant</label>
                    <select class="form-select" id="restaurant">
                        <option value="">---</option>
                    </select>
                </div>
            </form>
        </div>

        <div id="step3" class="step-content" style="display: none;">
            <h2>Step 3</h2>
            <form>
                <div class="dishes">
                    <div class="mb-3 row">
                        <div class="col-6">
                            <label for="dish" class="form-label">Please select a dish</label>
                            <input type="text" class="form-select" id="dish">
                        </div>
                        <div class="col-5">
                            <label for="dish-qty" class="form-label">Please enter no. of servings</label>
                            <input type="number" class="form-control w-50" id="dish-qty">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary add-dish">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 1a.5.5 0 0 1 .5.5V7h5.5a.5.5 0 0 1 0 1H8v5.5a.5.5 0 0 1-1 0V8H1.5a.5.5 0 0 1 0-1H7V1.5A.5.5 0 0 1 8 1z"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-5">
            <button type="button" class="btn btn-secondary" id="prevBtn">Previous</button>
            <button type="button" class="btn btn-primary float-end" id="nextBtn">Next</button>
        </div>
    </div>
@endsection

@push('js')
    <script>
        var DATA_DISHES = @json($data);
    </script>
    <script src="{{ asset('js/order.js') }}"></script>
@endpush
