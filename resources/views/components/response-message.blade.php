<div class="alert alert-{{ $msg->type }} w-100" role="alert">
    {{ $msg->content }}
    <a href="{{ $msg->urlLink }}" class="alert-link">{{ $msg->urlContent }}</a>
</div>
