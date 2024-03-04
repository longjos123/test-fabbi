<?php
use Illuminate\Support\Facades\Session;
?>

@extends('index')

@section('content')
    <div class="mt-3">
        <form method="GET" action="{{ route('preview') }}" id="form-step3">
            <div id="step3" class="step-content">
                <h2>Step 3</h2>
                <div class="dishes">
                    @if(!isset($dataOrder['dishes']))
                        <div class="mb-3 row">
                            <div class="col-6">
                                <label for="dish" class="form-label">Please select a dish</label>
                                <select class="form-select" id="dish" name="dish[]">
                                    <option value="">---</option>
                                    @foreach($dishes as $key => $dish)
                                        <option value="{{ $key }}">{{ $dish }}</option>
                                    @endforeach
                                </select>
                                <span class="error-msg text-danger"></span>
                            </div>
                            <div class="col-5">
                                <label for="dish-qty" class="form-label">Please enter no. of servings</label>
                                <input type="number"
                                       value="1"
                                       class="form-control w-50"
                                       name="dish-qty[]"
                                       id="dish-qty">
                                <span class="error-msg text-danger"></span>
                            </div>
                        </div>
                    @else
                        @foreach($dataOrder['dishes'] as $id => $dishSession)
                            <div class="mb-3 row">
                                <div class="col-6">
                                    <label for="dish" class="form-label">Please select a dish</label>
                                    <select class="form-select" id="dish" name="dish">
                                        <option value="">---</option>
                                        @foreach($dishes as $key => $dish)
                                            <option value="{{ $key }}" {{ $id == $key ? 'selected' : '' }}>{{ $dish }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error-msg text-danger"></span>
                                </div>
                                <div class="col-5">
                                    <label for="dish-qty" class="form-label">Please enter no. of servings</label>
                                    <input type="number"
                                           value="{{ $dishSession['qty'] }}"
                                           class="form-control w-50"
                                           name="dish-qty"
                                           id="dish-qty">
                                    <span class="error-msg text-danger"></span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary add-dish">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus" viewBox="0 0 16 16">
                            <path
                                d="M8 1a.5.5 0 0 1 .5.5V7h5.5a.5.5 0 0 1 0 1H8v5.5a.5.5 0 0 1-1 0V8H1.5a.5.5 0 0 1 0-1H7V1.5A.5.5 0 0 1 8 1z" />
                        </svg>
                    </button>
                </div>
                <span class="error-qty-dish text-danger"></span>
            </div>
            <div class="mt-5">
                <a type="button" href="{{ route('step_2') }}" class="btn btn-secondary" id="prevBtn">Previous</a>
                <button type="button" class="btn btn-primary float-end" id="nextBtn">Next</button>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        var NUM_OF_PEOPLE = @json($dataOrder['qty']);

        $(document).ready(function () {
            $('.add-dish').click(function() {
                var newRow = $(".dishes .row:first").clone();
                newRow.find('input').val(1);
                newRow.find('select').val('');
                $('.dishes').append(newRow);

                if ($('.dishes .form-select').length > 9) {
                    $('.add-dish').attr('disabled', true)
                }
            })
        })
    </script>
    <script src="{{ asset('js/step3.js') }}"></script>
@endpush
