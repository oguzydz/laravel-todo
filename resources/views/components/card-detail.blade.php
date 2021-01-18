<div class="card">
    <div class="card-body">
        <div class="media">
            <img src="{{ asset(config("todo.status_icon.$cardData->status")) }}" alt="" class="avatar-sm mr-4">

            <div class="media-body overflow-hidden">
                <h5 class="text-truncate font-size-15">{{ $cardData->title }}</h5>
            </div>
        </div>

        <h5 class="font-size-15 mt-4">{{ __('Todo Detail:') }}</h5>
        <p class="text-muted">{!! nl2br(e($cardData->desc)) !!}</p>

        <div class="row task-dates">
            <div class="col-sm-4 col-6">
                <div class="mt-4">
                    <h5 class="font-size-14"><i class="bx bx-stats mr-1 text-primary"></i> {{ __('Status:') }}</h5>
                    <div class="custom-control custom-switch custom-switch-lg mb-3" dir="ltr">
                        <input type="checkbox" class="custom-control-input" id="customSwitchsizelg"
                            {{ config("todo.status.$cardData->status") }}>
                        <label class="custom-control-label" for="customSwitchsizelg">make finished</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-6">
                <div class="mt-4">
                    <h5 class="font-size-14"><i class="bx bx-calendar mr-1 text-primary"></i> {{ __('Created Date:') }}
                    </h5>
                    <p class="text-muted mb-0">{{ $cardData->created_at }}</p>
                </div>
            </div>
            <div class="col-sm-4 col-6">
                <div class="mt-4">
                    <h5 class="font-size-14"><i class="bx bx-calendar mr-1 text-primary"></i> {{ __('Updated Date:') }}
                    </h5>
                    <p class="text-muted mb-0">{{ $cardData->updated_at }}</p>
                </div>
            </div>
            @if ($cardData->status == '1')
                <div class="col-sm-4 col-6">
                    <div class="mt-4">
                        <h5 class="font-size-14"><i class="bx bx-calendar-check mr-1 text-primary"></i>
                            {{ __('Finish Date:') }}
                        </h5>
                        <p class="text-muted mb-0">{{ $cardData->updated_at }}</p>
                    </div>
                </div>
            @endif
            <div class="col-md-12 mt-4">
                <a href="{{ route('edit', $cardData->id) }}">
                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"
                        style="background: #224686; border: none;"><i class="mdi mdi-briefcase-edit mr-1"></i>
                        {{ __('Edit') }}</button>
                </a>
                <a href="{{ route('destroy', $cardData->id) }}" onclick="return confirm('Are you sure?')">
                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"
                        style="background: #224686; border: none;"><i class="mdi mdi-delete mr-1"></i>
                        {{ __('Delete') }}</button>
                </a>
                <a href="{{ route('toggle', $cardData->id) }}">
                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"
                        style="background: #224686; border: none;"><i class="mdi mdi-briefcase-edit mr-1"></i>
                        {{ __('Make ') . config("todo.status.$cardData->status")  }}</button>
                </a>
            </div>
        </div>
    </div>
</div>
