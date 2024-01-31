<div style="background-color: red; color: white" class="alert alert-danger">
    @if ($errors->any())
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    @endif
</div>
