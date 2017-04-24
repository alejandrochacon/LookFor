<div class="col-md-12">
<form name="kontakt" class="form-horizontal form-condensed" action="<?php echo getValue("phpmodule"); ?>" method="post">
  <div class="form-group control-group">
	<label class="control-label col-md-offset-2 col-md-2" for="email">E-Mail</label>
	<div class="col-md-4">
	  <input type="email" class="form-control" id="email" name="email" value="<?php echo getHtmlValue("email"); ?>" />
	</div>
  </div>
  <div class="form-group control-group">
	<label class="control-label col-md-offset-2 col-md-2" for="password">Passwort</label>
	<div class="col-md-4">
	  <input type="password" class="form-control" id="password" name="password" value="<?php echo getHtmlValue("password"); ?>" />
	</div>
  </div>
  <div class="form-group control-group">
	<label class="control-label col-md-offset-2 col-md-2" for="password2">wiederholen</label>
	<div class="col-md-4">
	  <input type="password" class="form-control" id="password2" name="password2" value="<?php echo getHtmlValue("password2"); ?>" />
	</div>
  </div>
  <div class="form-group control-group">
	<div class="col-md-offset-4 col-md-4">
	  <button type="submit" class="btn btn-success" name="registrieren" id="registrieren">registrieren</button>
	</div>
  </div>
</form>
</div>
