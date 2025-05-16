<?php
include('./header.php')
?>
<style>
    #dashboard {
        border-radius: 5px 5px 5px 5px;
        border: solid 1px lightgoldenrodyellow;
        background-color: lightgoldenrodyellow;

        a {

            color: rgb(241, 80, 0);
        }
    }

    .greetings h1 {
        color: rgb(241, 80, 0);
        width: 500px;
    }

    .content {
        background-color: white;
        border: inset 2px black;
    }
</style>
<div class="main">
    <div class="greetings">
        <h1>Welcome, <?= $_SESSION['name']; ?></h1>
    </div>
    <div class="content">
        <div class="total-number">
            <h2>Total Records: <?php
                                $db = new crud();
                                $num = $db->view();
                                echo $num['rows'];
                                ?></h2>
        </div>
    </div>
</div>


</html>