<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: ./");
}
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
                    <h1 class="h3 mb-3">Dashboard</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body"></div>
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