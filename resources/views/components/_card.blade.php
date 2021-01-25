<div {{ $attributes->merge(['class' => $status]) }}>
    <div class="card-body">
        <div class="media">
            <div class="media-body overflow-hidden">
                <h5 class="text-truncate font-size-15"><a href="{{ route('detail', $cardData->id) }}" class="text-dark">{{ $cardData->title }} <i class="fas fa-external-link-alt"></i></a></h5>
                <p class="text-muted mb-4">{!! nl2br(e(Str::limit($cardData->desc, config('todo.str_limit'), $end = '...'))) !!}</p>
                <a href="{{ route('detail', $cardData->id) }}">
                    <button type="button" class="btn btn-light btn-sm btn-rounded" data-toggle="modal" data-target=".exampleModal">
                        <i class= "mdi mdi-more mr-1"></i> Read More
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="px-4 py-3 border-top">
        <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
                <span class="badge badge-light">{{ config("todo.status.$cardData->status") }}</span>
            </li>
            <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Due Date">
                <i class= "bx bx-calendar mr-1"></i> {{ $cardData->created_at }}
            </li>
        </ul>
    </div>
</div>
