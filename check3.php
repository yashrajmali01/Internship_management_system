<?php
$link = mysqli_connect("localhost:3306", "root", "", "intern") or die("Database can not be connected.");

if (!empty($_POST['username'])) {

    $result = mysqli_query($link, "select * from job where jid='" . $_POST["username"] . "'") or die("failed to query database" . mysqli_error($link));
    if (mysqli_num_rows($result) > 0) {
        echo "<span class='glyphicon glyphicon-remove red'> Username Not Available. </span>";
        $v = $_POST["username"] . mt_rand(0, 10000);

        $select = mysqli_query($link, "select * from job where jid='$v'");
        if (mysqli_num_rows($select) > 0) {
            $vv = $_POST["username"] . mt_rand(0, 50000);
            $select2 = mysqli_query($link, "select * from job where jid='$vv'");
            if (mysqli_num_rows($select2) > 0) {
                $vvv = $_POST["username"] . mt_rand(0, 100000);
                echo "<span class='g'> Try This name= '$vvv' </span>";
            } else {
                echo "<span class='g'> Try This name= '$vv' </span>";
            }
        } else {
            echo "<span class='g'> Try This name= '$v' </span>";
        }
    } else {
        echo "<span class='glyphicon glyphicon-ok g'>Username Available.</span>";
    }
}

?>

<script>
    document.getElementById('ljname').style.display = 'block';
    document.getElementById('jname').style.display = 'block';
    document.getElementById('ljdesc').style.display = 'block';
    document.getElementById('jdesc').style.display = 'block';
    document.getElementById('lcity').style.display = 'block';
    document.getElementById('city').style.display = 'block';
    document.getElementById('lpost').style.display = 'block';
    document.getElementById('post').style.display = 'block';
    document.getElementById('lsal').style.display = 'block';
    document.getElementById('sal').style.display = 'block';
    document.getElementById('submit').style.display = 'block';
</script>
