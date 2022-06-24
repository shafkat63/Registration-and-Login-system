<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<?php
include('db.php');
$query = "SELECT * FROM users order by id desc";
$select = mysqli_query($connection, $query);
$num_row = mysqli_num_rows($select);
// $num_row = mysqli_fetch_assoc($select);
// $user = mysqli_fetch_assoc($num_row);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $token = $id;
}

if ($num_row) {
?>
    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
        <?php while ($userrow = mysqli_fetch_array($select)) { ?>
            <tr>
                <td><?php echo $userrow['id']; ?></td>
                <td><?php echo $userrow['userId']; ?></td>
                <td><?php echo $userrow['username']; ?></td>
                <td><?php echo $userrow['emailid']; ?></td>
                <td><?php echo $userrow['userType']; ?></td>
                <td><?php echo $userrow['created']; ?></td>
                <td>
                    <a href="view.php?id=<?php echo $userrow['id']; ?>"><span class="view" title="View"> View</span></a> /
                    <a href="edit.php?id=<?php echo $userrow['userId']; ?>"><span class="edit" title="Edit"> Edit</span></a> /
                    <a href="delete.php?id=<?php echo $userrow['id']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">
                        <span class="delete" title="Delete"> Delete</span>
                    </a>
                    <p>aa</p>
                </td>

            </tr>
        <?php } ?>
    </table>
    <a href="admin.php?id=<?php echo $token; ?>"><span class="admin" title="admin">Admin</span></a>

<?php } ?>