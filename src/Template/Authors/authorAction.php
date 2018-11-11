<?php

$tblName = 'authors';
if (isset($_POST['action_type']) && !empty($_POST['action_type'])) {
    if ($_POST['action_type'] == 'data') {
        $conditions['where'] = array('id' => $_POST['id']);
        $conditions['return_type'] = 'single';
        $user = $db->getRows($tblName, $conditions);
        echo json_encode($user);
    } elseif ($_POST['action_type'] == 'view') {
        $users = $db->getRows($tblName, array('order_by' => 'id DESC'));
        if (!empty($users)) {
            $count = 0;
            foreach ($users as $user): $count++;
                echo '<tr>';
                echo '<td>#' . $count . '</td>';
                echo '<td>' . $user['surname'] . '</td>';
                echo '<td>' . $user['first_name'] . '</td>';
                echo '<td><a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser(\'' . $user['id'] . '\')"></a><a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?userAction(\'delete\',\'' . $user['id'] . '\'):false;"></a></td>';
                echo '</tr>';
            endforeach;
        }else {
            echo '<tr><td colspan="5">No user(s) found......</td></tr>';
        }
    } elseif ($_POST['action_type'] == 'add') {
        $userData = array(
            'name' => $_POST['surname'],
            'email' => $_POST['first_name']
        );
        $insert = $db->insert($tblName, $userData);
        echo $insert ? 'ok' : 'err';
    } elseif ($_POST['action_type'] == 'edit') {
        if (!empty($_POST['id'])) {
            $userData = array(
                'name' => $_POST['surname'],
                'email' => $_POST['first_name']
            );
            $condition = array('id' => $_POST['id']);
            $update = $db->update($tblName, $userData, $condition);
            echo $update ? 'ok' : 'err';
        }
    } elseif ($_POST['action_type'] == 'delete') {
        if (!empty($_POST['id'])) {
            $condition = array('id' => $_POST['id']);
            $delete = $db->delete($tblName, $condition);
            echo $delete ? 'ok' : 'err';
        }
    }
    exit;
}
