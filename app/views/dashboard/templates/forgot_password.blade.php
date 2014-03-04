<!-- Modal -->
<div class="modal fade" id="changepass_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
       
       <form action="{{URL::to('user/change-password')}}" id="change-pass-form">
          <div class="form-group">
            <label>Old Password</label>
            <input type="password" name="old_pass" class="form-control old_pass" required="required">
          </div>
          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="new_pass" class="form-control new_pass" required="required">
          </div>
          <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="confirm_pass" class="form-control confirm_pass" required="required">
          </div>
          <div class="notification-con-pass"></div>          
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-green btn-lg btn-block btn-change-pass" value="Change Password" />
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->