<?php
/*
 *
 */

 
?>

<?php   template::header($this); ?>

    <h1>ManageGroups</h1>
    <br>
    <?php
        $groups = $this->admin->getGroups();
    ?>
    <h4>Avaible Groups</h4>
    <table class='table table-hovered'>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Options</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
            if(is_array($groups)):
                foreach($groups as $key=>$group):
                    echo "<tr>";
                    echo "<td>$group->id</td>";
                    echo "<td>$group->name</td>";
                    echo "<td>$group->options</td>";
                    echo "<td><a href='/admin/EditGroup/$group->id' class='btn btn-sm btn-info'> Edit</a></td>";
                    echo "</tr>";
                endforeach;
            else:
                echo "<tr><td colspan='3'>No Groups</td></tr>";
            endif;
            ?>
        </tbody>
    </table>
    
    
    
<?php   template::footer(); ?>