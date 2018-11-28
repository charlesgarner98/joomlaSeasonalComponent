<?php

  defined('_JEXEC') or die('Restricted access');

  if(isset($_POST['snow']) && isset($_POST['music']) && isset($_POST['fireworks'])){

    $snow = $_POST['snow'];
    $music = $_POST['music'];
    $fireworks = $_POST['fireworks'];

    echo 'success';
  }

  JToolbarHelper::title(JText::_('Seasonal Controls'), 'flash');
  JToolbarHelper::save('seasonal.save');
	JToolbarHelper::cancel(
		'seasonal.cancel',
		$isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE'
	);

  // Get a db connection.
  $db = JFactory::getDbo();
  $query = $db->getQuery(true);

  //Get value for snow
  $query = "SELECT published FROM #__seasonal WHERE id = 1;";
  $db->setQuery($query);
  $snow = $db->loadResult();

  //Get value for music
  $query = "SELECT published FROM #__seasonal WHERE id = 2;";
  $db->setQuery($query);
  $music= $db->loadResult();

  //Get value for fireworks
  $query = "SELECT published FROM #__seasonal WHERE id = 3;";
  $db->setQuery($query);
  $fireworks= $db->loadResult();
?>
<form action="/administrator/index.php?option=com_seasonal" id="component-form" method="post" name="adminForm" autocomplete="off" class="form-validate form-horizontal">
  <div class="control-group">
    <div class="control-label">
      <label id="jform_snow-lbl" for="jform_seasonal" class="hasPopover" title data-content="Enable or disable falling snow on the site." data-original-title="Enable Snow">
        Enable Snow
      </label>
    </div>
    <div class="controls">
      <fieldset id="jform_snow" class="radio btn-group btn-group-yesno">
  			<input type="radio" id="jform_snow0" value="1" name="jform[snow]">
        <label for="jform_snow0" class="btn <?php if($snow == 1) echo 'btn-success'; ?>">Yes</label>
  			<input type="radio" id="jform_snow1" value="0" name="jform[snow]">
        <label for="jform_snow1" class="btn <?php if($snow == 0) echo 'btn-danger'; ?>">No</label>
  		</fieldset>
    </div>
  </div>

  <div class="control-group">
    <div class="control-label">
      <label id="jform_music-lbl" for="jform_seasonal" class="hasPopover" title data-content="Enable or disable christmas music on the site." data-original-title="Enable Music">
        Enable Music
      </label>
    </div>
    <div class="controls">
      <fieldset id="jform_music" class="radio btn-group btn-group-yesno">
        <input type="radio" id="jform_music0" value="1" name="jform[music]">
        <label for="jform_music0" class="btn <?php if($music == 1) echo 'btn-success'; ?>">Yes</label>
        <input type="radio" id="jform_music1" value="0" name="jform[music]">
        <label for="jform_music1" class="btn <?php if($music == 0) echo 'btn-danger'; ?>">No</label>
      </fieldset>
    </div>
  </div>

  <div class="control-group">
    <div class="control-label">
      <label id="jform_fireworks-lbl" for="jform_seasonal" class="hasPopover" title data-content="Enable or disable fireworks on the site." data-original-title="Enable Fireworks">
        Enable Fireworks
      </label>
    </div>
    <div class="controls">
      <fieldset id="jform_fireworks" class="radio btn-group btn-group-yesno">
        <input type="radio" id="jform_fireworks0" value="1" name="jform[fireworks]">
        <label for="jform_fireworks0" class="btn <?php if($fireworks == 1) echo 'btn-success'; ?>">Yes</label>
        <input type="radio" id="jform_fireworks1" value="0" name="jform[fireworks]">
        <label for="jform_fireworks1" class="btn <?php if($fireworks == 0) echo 'btn-danger'; ?>">No</label>
      </fieldset>
    </div>
  </div>
</form>
<div id="update"></div>

<script>

  jQuery('#toolbar-save button').click(function(){
    if(jQuery('#jform_snow label').hasClass('btn-success')){
      var snow_set = 1;
    } else {
      var snow_set = 0;
    }
    if(jQuery('#jform_music label').hasClass('btn-success')){
      var music_set = 1;
    } else {
      var music_set = 0;
    }
    if(jQuery('#jform_fireworks label').hasClass('btn-success')){
      var fireworks_set = 1;
    } else {
      var fireworks_set = 0;
    }

    jQuery.ajax({
      type: "POST",
      url: "/administrator/components/com_seasonal/ajax.php",
      data: { 'snow' : snow_set, 'music' : music_set, 'fireworks' : fireworks_set},
    }).done(function(result){
      if(result == 'success'){
        window.location.href = "/administrator";
      }
    });
  });

  jQuery('#toolbar-cancel button').click(function(){
    window.location.href = "/administrator";
  });

</script>
