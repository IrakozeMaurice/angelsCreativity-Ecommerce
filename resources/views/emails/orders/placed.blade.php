@component('mail::message')

# Order Received

Thank you for your order.

**Order ID:** {{ $order->id }}

**Client Email:** {{ $order->email }}

**Client firstname:** {{ $order->firstname }}

**Client lastname:** {{ $order->lastname }}

**Order Total:** {{ formatPrice($order->total) }} Rwf

**Items Ordered** <br>
@foreach ($order->products as $product)
Name: {{ $product->name }} <br>
Price: {{ $product->presentPrice() }} Rwf <br>
Quantity: {{ $product->pivot->quantity }} <br>
@endforeach

You can get further details about your order by logging into our website.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us.

Regards,<br>
{{ config('app.name') }}
@endcomponent
