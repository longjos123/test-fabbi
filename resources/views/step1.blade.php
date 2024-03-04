<?php
    use Illuminate\Support\Facades\Session;
    use App\Constants\OrderConstants;
?>

@extends('index')

@section('content')
    <div class="mt-3">
        <form method="GET" action="{{ route('step_2') }}" id="form-step-1">
            @csrf
            <div id="step1" class="step-content mt-3">
                <h2>Step 1</h2>
                <div class="mb-3">
                    <label for="meal" class="form-label">Please select a meal</label>
                    <select class="form-select @error('meal') is-invalid @enderror"
                            id="meal"
                            name="meal">
                        <option value="">---</option>
                        @foreach (OrderConstants::MEALS as $key => $meal)
                            <?php
                                $selected = '';
                                if (Session::has('data') && Session::get('data')['meal'] == $key) {
                                    $selected = 'selected';
                                } else {
                                    if (old('meal') == $key) {
                                        $selected = 'selected';
                                    }
                                }
                            ?>
                            <option value="{{ $key }}" {{ $selected }}>{{ $meal }}</option>
                        @endforeach
                    </select>
                    @error('meal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Please enter number of people</label>
                    <input type="number"
                           name="qty"
                           value="{{ Session::has('data') ? Session::get('data')['qty'] : old('qty') }}"
                           class="form-control @error('qty') is-invalid @enderror"
                           id="qty">
                    @error('qty')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mt-5">
                <button type="submit" class="btn btn-primary float-end" id="nextBtn">Next</button>
            </div>
        </form>
    </div>
@endsection
