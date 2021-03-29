<div class="row d-flex">
    <div class="col ml-3">
        <a href="{{route("web.pessoa.edit", ["pessoa" => $pessoa->id])}}"
           class="btn btn-icon btn-light btn-hover-primary btn-sm">
    <span class="svg-icon svg-icon-md svg-icon-primary">
        {{ Metronic::getSVG('media/svg/icons/Communication/Write.svg') }}
    </span>
        </a>
    </div>
    <div class="col ml-3">
        <form method='post' action='{{ route("web.pessoa.destroy", ["pessoa" => $pessoa->id]) }}'
              onsubmit='return confirm("Tem certeza que deseja remover?")'>
            @csrf
            @method('DELETE')
            <button class="btn btn-icon btn-light btn-hover-danger btn-sm">
                {{ Metronic::getSVG('media/svg/icons/General/Trash.svg', "svg-icon svg-icon-md svg-icon-danger") }}
            </button>
        </form>
    </div>
</div>
