<?php use_helper('I18N') ?>
<form class="form-horizontal" id="auth-signin-form" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <fieldset>
    <legend>Legend</legend>
    <?php foreach ($form as $field): ?>
      <?php if(get_class($field->getWidget()) != 'sfWidgetFormInputHidden'): ?>
      <div class="form-group">
        <label for="<?php echo $field->getName(); ?>" class="col-lg-2 control-label"><?php echo $field->renderLabel(); ?></label>
        <div class="col-lg-10">
          <?php echo $field->render(array('class' => 'form-control')); ?>
        </div>
      </div>
      <?php else: ?>
          <?php echo $field->render(); ?>
      <?php endif; ?>
    <?php endforeach ?>
    
    <input class="btn btn-success pull-right" type="submit" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
          
   <?php $routes = $sf_context->getRouting()->getRoutes() ?>
   <?php if (isset($routes['sf_guard_forgot_password'])): ?>
     <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
   <?php endif; ?>

   <?php if (isset($routes['sf_guard_register'])): ?>
     &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
   <?php endif; ?>
</form>

<?php if(sfConfig::get('app_sf_guard_plugin_signin_ajax', false)): ?>

<script type="text/javascript">
  function login(){  
    mdShowLoading();

    $.ajax({
      url: $('#auth-signin-form').attr('action'),
      data: $('#auth-signin-form').serialize(),
      type: 'POST',
      dataType: 'json',
      success: function(json) {
        if(json.response == 'OK'){
          document.location.href = json.options.location;
        }else{
          mdHideLoading(function(){mdShowMessage(json.options.error)});
        }
      }
    });
    return false;
  }

  $(document).ready(function() {
      $("#auth-signin-form").live('submit', function(event){
        event.preventDefault();
        return login();
      });    
  });
</script>

<?php endif; ?>
