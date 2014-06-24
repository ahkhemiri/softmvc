<h2>Editer</h2>
<form role="form" method="post">
  <div class="form-group">
    <label for="name">Nom</label>
    <input name="name" type="text" class="form-control" id="name" placeholder="Nom de la tache" value="<?php echo $task->name ?>">
  </div>
  
  <div class="form-group">
    <label for="resource_id">Ressource</label>
    <select name="resource_id" class="form-control" id="resource_id">
	 <?php foreach($resources as $r) { ?>
     <option value="<?php echo $r->id ?>"><?php echo $r->name ?></option>
	 <?php } ?>
    </select>
  </div>
  <div class="form-group">
        <label for="date" class="control-label">Date</label>
        <input id="date" type="text" class="form-control datepicker" name="date" value="<?php echo $task->date ?>" required />
  </div>
  <div class="form-group">
    <label for="advancement">Avancement</label>
    <div class="input-group">
    <div>
      <input name="advancement" type="text" class="form-control" id="advancement" placeholder="" value="<?php echo $task->advancement ?>">
    </div>
      <span class="input-group-addon">%</span> </div>
  </div>
  <input type="hidden" name="id" value="<?php echo $task->id ?>">

  <button type="submit" class="btn btn-default">Enregistrer</button>
</form>
