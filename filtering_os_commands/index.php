<html>

<head>
    <title>CMDi lab</title>
</head>

<body>
    <p><b>yangyangwithgnu's command injection lab - filtering os command</b></p>
    <br />

    <form action="index.php" method="POST">
        ping address: <input type="text" name="ip">
        <input value="submit" type="submit">
    </form>

    <?php
        $ip = $_POST['ip'];
        if (isset($ip)) {
            if (preg_match('/ls|cat|nl|more|ifconfig|nc/', $ip)) {
                die("hackinnnng !!!!");
            } else {
                $output = shell_exec("/bin/ping -c2 " . $ip);
                echo "<b>output</b>: <br />" . nl2br($output); 
            }
        }
    ?>
</body>

</html>
