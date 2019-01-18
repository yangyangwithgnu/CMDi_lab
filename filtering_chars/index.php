<html>

<head>
    <title>CMDi lab</title>
</head>

<body>
    <p><b>yangyangwithgnu's command injection lab - filtering characters</b></p>
    <br />
    
    <p>you task, to run 'cat /etc/issue', but there is no c, a, and t characters. </p>

    <form action="index.php" method="POST">
        ping address: <input type="text" name="ip">
        <input value="submit" type="submit">
    </form>

    <?php
        $ip = $_POST['ip'];
        if (isset($ip)) {
            
            // no c, a and t
            $filter = '[cat]|';
            
            // no globbing
            $filter .= '[\?\*\[\]]';
            
            // filtering
            if (preg_match('/' . $filter . '/', $ip)) {
                die("hackinnnng !!!!");
            } else {
                $output = shell_exec("/bin/ping -c1 " . $ip);
                echo "<b>output</b>: <br />" . nl2br($output); 
            }
        }
    ?>
</body>

</html>
