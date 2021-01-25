 @if (Session::get('id') === $cardData->id)
     <tr style="background-color:{{ config('todo.update_message.color') }}">
     @else
     <tr>
 @endif

 @if (Session::get('id') === $cardData->id)
     <div class="alert alert-success" role="alert">
         {{ Session::get('success') }}
     </div>
 @endif

 <th scope="row">
     {{ $cardData->id }}
 </th>
 <th scope="row">
     <img src="/storage/{{ $cardData->image }}" width="150" class="rounded shadow-lg" />
 </th>
 <td>{!! nl2br(e(Str::limit($cardData->title, config('todo.str_limit'), $end = '...'))) !!}</td>
 {{-- <td>
     {!! nl2br(e(Str::limit($cardData->desc, config('todo.str_limit'), $end = '...'))) !!}
 </td> --}}
 <td>
     <a href="{{ route('toggle', ['id' => $cardData->id]) }}"
         class="btn  btn-{{ config('todo.status_icon.' . $cardData->status . '.color') }} w-md waves-effect waves-light d-inline mr-2">
         <i class="{{ config('todo.status_icon.' . $cardData->status . '.icon') }}"></i>
         {{ config('todo.status_icon.' . $cardData->status . '.text') }}
     </a>
     <a href="{{ route('destroy', ['id' => $cardData->id]) }}"
         class="btn  btn-danger w-md waves-effect waves-light d-inline mr-2">
         <i class='bx bxs-trash'></i>
     </a>
     <a href="{{ route('detail', ['id' => $cardData->id]) }}"
         class="btn  btn-primary w-md waves-effect waves-light d-inline">
         <i class='bx bx-right-arrow-alt'></i>
     </a>
 </td>
 </tr>
