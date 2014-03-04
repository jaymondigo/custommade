@extends('base')

@section('head')

@stop

@section('body')
<p>
How was the experience?
</p>
<p>
Did you have a hard time purchasing? Why?
</p>
<p>
Is there something you suggest us to improve on?
</p>
<br>

Customer says:
<br>
<br>
<p>
{{nl2br($feedback)}}
</p>
@stop