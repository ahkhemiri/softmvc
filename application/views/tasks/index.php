<div class="container">
    <h2>You are in the View: application/views/task/index.php (everything in this box comes from that file)</h2>
    <!-- add song form -->
    <div>
        <h3>Add a task</h3>
        <form action="<?php echo URL; ?>tasks/addtask" method="POST">
            <label>Name</label>
            <input type="text" name="name" value="" required />
            <label>Date</label>
            <input type="text" name="date" value="" required />
            <label>Advancement</label>
            <input type="text" name="advancement" value="" />
            <input type="submit" name="submit_add_task" value="Submit" />
        </form>
    </div>
    <!-- main content output -->
    <div>

        <h3>List of tasks (data from first model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Date</td>
                <td>Advancement</td>
                <td>DELETE</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task) { ?>
                <tr>
                    <td><?php if (isset($task->id)) echo $task->id; ?></td>
                    <td><?php if (isset($task->name)) echo $task->name; ?></td>
                    <td><?php if (isset($task->date)) echo $task->date; ?></td>
                    <td><?php if (isset($task->advancement)) echo $task->advancement; ?></td>
                    <td><a href="<?php echo URL . 'tasks/deletetask/' . $task->id; ?>">x</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
