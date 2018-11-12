<?php
$urlToRestApi = $this->Url->build('/api/authors', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Authors/index');
?>
<html>
    <div class="container">
        <div class="row">
            <div class="panel panel-default authors-content">
                <div class="panel-heading">Authors <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
                <div class="panel-body none formData" id="addForm">
                    <h2 id="actionLabel">Add Author</h2>
                    <form class="form" id="authorAddForm" enctype='application/json'>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" class="form-control" name="surname" id="surname"/>
                        </div>
                        <div class="form-group">
                            <label>First name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"/>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" onclick="authorAction('add')">Add Author</a>
                        <!-- input type="submit" class="btn btn-success" id="addButton" value="Add Author" -->
                    </form>
                </div>
                <div class="panel-body none formData" id="editForm">
                    <h2 id="actionLabel">Edit Author</h2>
                    <form class="form" id="authorEditForm" enctype='application/json'>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" class="form-control" name="surname" id="surnameEdit"/>
                        </div>
                        <div class="form-group">
                            <label>First name</label>
                            <input type="text" class="form-control" name="first_name" id="first_nameEdit"/>
                        </div>
                        <input type="hidden" class="form-control" name="id" id="idEdit"/>
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" onclick="authorAction('edit')">Update Author</a>
                        <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Author" -->
                    </form>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>First name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="authorData">
                        <?php
                        $count = 0;
                        foreach ($authors as $author): $count++;
                            ?>
                            <tr>
                                <td><?php echo '#' . $count; ?></td>
                                <td><?php echo $author['surname']; ?></td>
                                <td><?php echo $author['first_name']; ?></td>
                                <td>
                                    <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editAuthor('<?php echo $author['id']; ?>')"></a>
                                    <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? authorAction('delete', '<?php echo $author['id']; ?>') : false;"></a>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                        <tr><td colspan="5">No author(s) found......</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
