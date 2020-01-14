@if ($errors->any())
    <div class="card red">
        <div class="card-content white-text">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="valign-wrapper"><i class="material-icons">error_outline</i> &nbsp; <span> {{ $error }}</span></li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
