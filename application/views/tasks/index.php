<div class="container-fluid">
        <h3>Ajouter une tache</h3>
        <form class="form-inline" action="<?php echo URL; ?>tasks/addtask" method="POST">
        <div class="form-group">
            <label class="col-sm-3 control-label">Nom</label>
            <input type="text" class="form-control" name="name" value="" placeholder="Saisir un titre de tâche" required />
        </div><div class="form-group">
            <label class="col-sm-3 control-label">Date</label>
            <input type="text" class="form-control" name="date" value="" required />
        </div><div class="form-group">
            <label class="col-sm-4 control-label">Advancement</label>
            <div class="col-xs-2">
            <input type="text" class="form-control" name="advancement" value="" />
            </div>
        </div>
            <input type="submit" name="submit_add_task" class="btn btn-default" value="Search" />
        </form>
<h2 class="sub-header">List of tasks (data from first model)</h2>
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
                    <td></td>
                    <td><?php if (isset($task->date)) echo $task->date; ?></td>
                    <td><?php if (isset($task->advancement)) echo $task->advancement; ?></td>
                    <td><a href="<?php echo URL . 'tasks/deletetask/' . $task->id; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                    <td><a href="<?php echo URL . 'tasks/edit/' . $task->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                </tr>
<?php } ?>
              </tbody>
              </table>
</div>