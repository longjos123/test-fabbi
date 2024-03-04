@extends('index')

@section('content')
    <div class="mt-3">
        <div id="step3" class="step-content">
            <h2>Preview</h2>
            <div class="mb-3 mt-4 row">
                <div class="d-flex">
                    <label class="col-3 fw-bold">Meal</label>
                    <span class="col-9">{{ $dataOrder['meal'] }}</span>
                </div>
                <div class="d-flex mt-3">
                    <label class="col-3 fw-bold">No. of People</label>
                    <span class="col-9">{{ $dataOrder['qty'] }}</span>
                </div>
                <div class="d-flex mt-3">
                    <label class="col-3 fw-bold">Restaurant</label>
                    <span class="col-9">{{ $dataOrder['restaurant'] }}</span>
                </div>
                <div class="d-flex mt-3">
                    <label class="col-3 fw-bold">Dishes</label>
                    <div class="col-9 d-gird">
                        @foreach($dataOrder['dishes'] as $dish)
                            <span>{{ $dish['name'] . '  -  ' .  $dish['qty'] }}</span><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <a type="button" href="{{ route('step_3') }}" class="btn btn-secondary" id="prevBtn">Previous</a>
            <button type="button" class="btn btn-primary float-end" id="nextBtn">Submit</button>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('#nextBtn').click(function () {
                console.log(@json($dataOrder));
                $.ajax({
                    type: 'get',
                    url: '{{ route('submit') }}',
                    success:function(data){
                        location.href = '{{ route('step_1') }}';
                    }
                });
            })
        })
    </script>
@endpush
