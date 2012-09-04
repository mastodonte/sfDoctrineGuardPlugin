<?php use_helper('I18N') ?>

<form id="forgot-signin-form" action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot><tr><td><input type="submit" name="change" value="<?php echo __('Request', null, 'sf_guard') ?>" /></td></tr></tfoot>
  </table>
</form>

<?php if(sfConfig::get('app_sf_guard_plugin_forgot_ajax', false)): ?>

<script type="text/javascript">
  function execute_forgot(){  
    mdShowLoading();

    $.ajax({
      url: $('#forgot-signin-form').attr('action'),
      data: $('#forgot-signin-form').serialize(),
      type: 'POST',
      dataType: 'json',
      success: function(json) {
        if(json.response == 'OK'){
          mdHideLoading(function(){mdShowMessage(json.options.message)});
        }else{
          mdHideLoading(function(){mdShowMessage(json.options.message)});
        }
      }
    });
    return false;
  }

  $(document).ready(function() {
      $("#forgot-signin-form").live('submit', function(event){
        event.preventDefault();
        return execute_forgot();
      });    
  });
</script>

<?php endif; ?>
