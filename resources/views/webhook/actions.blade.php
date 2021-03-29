<div class="row d-flex">
    <div class="col ml-3">
        <a href="{{route("web.webhook.edit", ["webhook" => isset($webhook)?$webhook->id:"___rowid"])}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
    <span class="svg-icon svg-icon-md svg-icon-primary">
        {{ Metronic::getSVG('media/svg/icons/Communication/Write.svg') }}
    </span>
        </a>
    </div>
    <div class="col ml-3">
        <form method='post' action='{{ route("web.webhook.destroy", ["webhook" => isset($webhook)?$webhook->id:'___rowid']) }}' onsubmit='return confirm("Tem certeza que deseja remover?")'>
            @csrf
            @method('DELETE')
            <button class="btn btn-icon btn-light btn-hover-primary btn-sm">
        <span class="svg-icon svg-icon-md svg-icon-primary">
            {{ Metronic::getSVG('media/svg/icons/General/Trash.svg') }}
        </span>
            </button>
        </form>
    </div>
</div>
