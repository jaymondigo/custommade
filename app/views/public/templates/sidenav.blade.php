
<div class='padded'>
  <div class="remaining-fund-number">
    <big>${{Auth::user()->sumFunds()}}</big>
  </div>
  <div class="label-remaining-funds">Remaining Funds</div>
  <br><br>
  <a class="btn btn-lg btn-block btn-green" href="{{URL::to('funds/add-funds')}}">Add Funds</a>
  <i class='add-funds-caption'>Add funds to place orders quickly</i>
</div>
<br><br>
<ul class='sidenav-list'>
  <li class="@if(isset($active) && $active == 'dashboard') active  @endif">
    <a href="{{URL::to('services')}}"><span class="glyphicon glyphicon-home"></span>Dashboard</a>
  </li>
  <li  class="@if(isset($active) && $active == 'cart') {{'active'}}  @endif">
    <a href="{{URL::to('cart')}}"><span class="glyphicon glyphicon-shopping-cart"></span>My Shopping Cart</a>
  </li>
  <li  class="@if(isset($active) && $active == 'orders') {{'active'}}  @endif">
    <a href="{{URL::to('orders')}}"><span class="glyphicon glyphicon-tags"></span>My Orders</a>
  </li>
  <li  class="@if(isset($active) && $active == 'activities') {{'active'}}  @endif">
    <a href="{{URL::to('activities')}}"><span class="glyphicon glyphicon-calendar"></span>My Activities</a>
  </li>
  <li  class="@if(isset($active) && $active == 'refer') {{'active'}}  @endif">
    <a href="{{URL::to('referral')}}"><span class="glyphicon glyphicon-send"></span>Refer a Friend</a>
  </li>
  <li  class="@if(isset($active) && $active == 'updates') {{'active'}}  @endif">
    <a href="{{URL::to('updates')}}"><span class="glyphicon glyphicon-bullhorn"></span>Updates</a>
  </li>
  <li  class="@if(isset($active) && $active == 'help') {{'active'}}  @endif">
    <a href="{{URL::to('help')}}"><span class="glyphicon glyphicon-comment"></span>Need Help?</a>
  </li>
</ul>
<div class='padded'>
  <br>

  <form method="post" action="{{URL::to('help/feedback')}}" id='feedback-form'>

    <div class="form-group">    
      <label for="feedback">We would love to hear from you.</label>
      
      <div class="alert alert-success feedback_alert" style="display: none;">Thank you!</div>

      <textarea class='form-control feedback' required="required" class="feedback" placeholder='Type your feedback here.'></textarea>
    </div>

    <div class="form-group">
      <label class='sr-only'></label>
      <input type='submit' class='btn btn-block btn-info feedback_btn' value='Send'>
    </div>

  </form>

</div>
<hr>
<div style="padding: 20px">
  {{image_tag('4-years-logo.png', array('class' => 'img-responsive'))}}
</div>
