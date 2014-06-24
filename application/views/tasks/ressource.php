<div class="container-fluid">
        <form class="form-inline" action="" method="POST">
		<div class="form-group">
            <select name="resource_id" class="form-control" id="resource_id">
			<option value="">Choisir une ressource</option>
	         <?php foreach($resources as $r) { ?>
             <option value="<?php echo $r->id ?>"><?php echo $r->name ?></option>
	         <?php } ?>
            </select>
        </div>
            <input type="submit" name="filter" class="btn btn-default" value="Filtrer" />
        </form>
<h2 class="sub-header">List des taches</h2>
<table class="table table-striped">
              <thead>
                <tr>
                  <th>Num</th>
                  <th>Nom tache</th>
                  <th>ressource</th>
                  <th>Date</th>
                  <th>% Avancement</th>
                  <th colspan="2">Actions</th>
                </tr>
              </thead>
              <tbody>
<?php foreach ($tasks as $task) { ?>
                <tr>
                    <td><?php if (isset($task->id)) echo $task->id; ?></td>
                    <td><?php if (isset($task->name)) echo $task->name; ?></td>
                    <td><?php echo $task->resource_name ?></td>
                    <td><?php if (isset($task->date) && $task->date != '0000-00-00') echo date('d/m/Y', strtotime($task->date)); ?></td>
                    <td><?php if (isset($task->advancement)) echo $task->advancement.' %'; ?></td>
                    <td><a title="supprimer" href="<?php echo URL . 'tasks/deletetask/' . $task->id . '/ressource'; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                    <td><a title="éditer" href="<?php echo URL . 'tasks/edit/' . $task->id . '/ressource'; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                </tr>
<?php } ?>
              </tbody>
              </table>
</div>