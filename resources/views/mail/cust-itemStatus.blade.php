@component('mail::message')
# Your item was reviewed by SoulPlug

If your item was approved it'll be put up for sale shortly at your requested pricing. If it was declined it will be mailed/returned to you in a few business days. It could have been declined for a number of reasons and based on our discretion. If you would like to know more please contact us at <a href="mailto:info@soul-plug.com">info@soul-plug.com</a>

### Your item {{ $item->name }}
Size: {{ $item->size }}

Condition: {{ $item->condition }}

Status: <strong>{{ $status }}</strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
