<div class="btn-group" role="group" aria-label="Basic outlined example">
    <a type="button" class="btn btn-outline-primary switch-1 {{ $step == 1 ? 'active' : '' }}">Step 1</a>
    <a type="button" class="btn btn-outline-primary switch-2 {{ $step == 2 ? 'active' : '' }}">Step 2</a>
    <a type="button" class="btn btn-outline-primary switch-3 {{ $step == 3 ? 'active' : '' }}">Step 3</a>
    <a type="button" class="btn btn-outline-primary switch-prev {{ $step == '' ? 'active' : '' }}">Preview</a>
</div>
