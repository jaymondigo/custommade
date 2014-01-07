@extends('base')

@section('head')

@stop

@section('body')
<p>Hi {{$order->user->email}},</p>
<br>
<p>Phew! What a relief.</p>

<p>
	Your order of {{$order->quantity}} {{$order->service->name}}
	{{$order->subService->sub_service_name}} went through smooth as silk. Now it is high time for our hardworking gnomes to get to work!
	Your campaign will start in 48 to 72 hours or sooner.
</p>

<p>
	We will send an email to let you know when your campaign ends or you can just longin to your account to track and manage your orders at
	{{HTML::link('/')}}
</p>

<p>Let's review the details of your order:</p>

<p>
	{{$order->service->name}} {{$order->subService->sub_service_name}}<br>
	Transaction ID: {{$order->order_number}}<br>
	Quantity: {{$order->quantity}}<br>
	Price: {{$order->price}}<br>
	URL: <a href="{{$order->resource}}">{{$order->resource}}</a><br>
	Remaining Funds: {{$order->user->sumFunds()}}
</p>
<p>
	Did we get that right? Great.
	Now you can make the order placement shebang a whole lot easy breezy next time by adding funds to your account. Skip the long line at Paypal and just purchase with a single click, we promise! No forms to fill out, no hassles at the shopping counter. One click and you're done.
	A trick you didn't know, eh?
</p>
<p>
Well, we be off now. Thanks for choosing Buy Real Marketing. Have an awesome day!
</p>
<p>
Catch ya later,
<br>
Team Buy Real Marketing
</p>
@stop