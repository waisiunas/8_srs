<?php
require_once './partials/connection.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('location: ./');
}

$sql = "SELECT `students`.`name` AS `student_name`, `registrations`.`id` AS `reg_id`, `courses`.`name` AS `course_name`
FROM `students` 
INNER JOIN `registrations`
ON `students`.`id` = `registrations`.`student_id`
INNER JOIN `courses`
ON `registrations`.`course_id` = `courses`.`id`";
$result = $conn->query($sql);
$registrations = $result->fetch_all(MYSQLI_ASSOC);
// echo "<pre>";
// print_r($registrations);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Tasks";
require_once "./partials/head.php";
?>

<body>
    <div class="wrapper">
        <?php require_once "./partials/sidebar.php" ?>

        <div class="main">
            <?php require_once "./partials/topbar.php" ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <div class="row mb-2">
                        <div class="col-6">
                            <h3>Registrations</h3>
                        </div>
                        <div class="col-6 text-end">
                            <a href="./add-registration.php" class="btn btn-outline-primary">Add Registration</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if ($result->num_rows > 0) { ?>
                                        <table class="table table-bordered m-0">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Student Name</th>
                                                    <th>Course Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $sr = 1;
                                                foreach ($registrations as $registration) { ?>
                                                    <tr>
                                                        <td><?php echo $sr++; ?></td>
                                                        <td><?php echo $registration['student_name'] ?></td>
                                                        <td><?php echo $registration['course_name'] ?></td>
                                                        <td>
                                                            <a href="./edit-registration.php?id=<?php echo $registration['reg_id'] ?>" class="btn btn-primary">Edit</a>
                                                            <a href="./delete-registration.php?id=<?php echo $registration['reg_id'] ?>" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    } else { ?>
                                        <div class="alert alert-info m-0">No record found!</div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <?php require_once "./partials/footer.php" ?>
        </div>
    </div>

    <script src="./template/js/app.js"></script>
    <script src="./template/js/custom.js"></script>
</body>

</html>