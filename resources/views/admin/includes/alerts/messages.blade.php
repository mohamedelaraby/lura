

{{-- check for session success --}}
@if(session('msg'))
    <div class="row mr-2 ml-2" >
        <button type="text" class="btn btn-lg btn-block btn-success mb-2"
                id="type-error">
                {{session('msg')}}
        </button>
    </div>
@endif

@if(session('error'))
    <div class="row mr-2 ml-2" >
        <button type="text" class="btn btn-lg btn-block btn-danger mb-2"
                id="type-error">
                {{session('error')}}
        </button>
    </div>
@endif

