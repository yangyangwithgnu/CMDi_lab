<html>

<head>
    <title>CMDi lab</title>
</head>

<body>
    <p><b>yangyangwithgnu's command injection lab - hard filtering os command</b></p>
    <br />
    
    <p>you task, let me access URL http://&ltsite.com&gt/CMDi_lab/hard_filtering_os_commands/&ltfoo&gt.php?cmd=&ltcommand&gt to run command</p>

    <form action="index.php" method="POST">
        ping address: <input type="text" name="ip">
        <input value="submit" type="submit">
    </form>

    <?php
        $ip = $_POST['ip'];
        if (isset($ip)) {
            
            // no normal command
            $filter = 'ls|ll|find|echo|'; // list file
            $filter .= 'cat|nl|tee|less|more|head|tail|strings|diff|bzmore|bzgrep|bzdiff|tac|grep|'; // view file
            $filter .= 'base64|xxd|od|openssl|'; // base64 and hex code
            $filter .= 'nc|ncat|socat|python|php|perl|ruby|lua|awk|sh|'; // reverse shell
            $filter .= 'ftp|curl|wget|GET|'; // download file
            
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
