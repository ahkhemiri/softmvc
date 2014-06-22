<?php var_dump($task);die; ?>
<form role="form">
  <div class="form-group">
    <label for="name">Nom</label>
    <input name="name" type="text" class="form-control" id="name" placeholder="Nom de la tache">
  </div>
  
    <div class="form-group">
    <label for="resource_id">Ressource</label>
    <select name="resource_id" class="form-control" id="resource_id">
    <option value="1">ressource1</option>
    <option value="2">ressource2</option>
    <option value="3">ressource3</option>
    </select>
  </div>
  
  <div class="form-group">
    <label for="advancement">Avancement</label>
    <div class="input-group">
      <input name="advancement" type="text" class="form-control" id="advancement" placeholder="">
      <span class="input-group-addon">%</span> </div>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox">
      Check me out </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
