<?php
    use Illuminate\Support\Facades\Session;
?>

@extends('index')

@section('content')
    <div class="mt-3">
        <form method="GET" action="{{ route('step_3') }}">
            @csrf
            <div id="step2" class="step-content">
                <h2>Step 2</h2>
                    <div class="mb-3">
                        <label for="restaurant" class="form-label">Please select a restaurant</label>
                        <select class="form-select" id="restaurant" name="restaurant">
                            <option value="">---</option>
                            @foreach ($restaurants as $restaurant)
                                <?php
                                    $selected = '';
                                    if (isset(Session::get('data')['restaurant']) && Session::get('data')['restaurant'] == $restaurant) {
                                        $selected = 'selected';
                                    } else {
                                        if (old('restaurant') == $restaurant) {
                                            $selected = 'selected';
                                        }
                                    }
                                ?>
                                <option value="{{ $restaurant }}" {{ $selected }}>
                                    {{ $restaurant }}
                                </option>
                            @endforeach
                        </select>
                        @error('restaurant')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            </div>
            <div class="mt-5">
                <a type="button" href="{{ route('step_1') }}" class="btn btn-secondary" id="prevBtn">Previous</a>
                <button type="submit" class="btn btn-primary float-end" id="nextBtn">Next</button>
            </div>
        </form>
    </div>
@endsection
