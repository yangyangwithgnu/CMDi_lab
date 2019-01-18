<html>

<head>
    <title>CMDi lab</title>
</head>

<body>
    <p><b>yangyangwithgnu's command injection lab - escaping_quotation (assume no outcoming networking flow)</b></p>
    <br />
    

    <?php
        highlight_file(__FILE__);
         
        $file1 = $_GET['f1'];
        $file2 = $_GET['f2'];
        
        // WAF
        if (preg_match("/\'|\"|;|,|\`|\*|\\|\n|\t|\r|\xA0|\{|\}|\(|\)|<|\&[^\d]|@|\||ls|cat|sh|flag|find|grep|echo|w/is", $file1))
            $file1 = "";
        if (preg_match("/\'|\"|;|,|\`|\*|\\|\n|\t|\r|\xA0|\{|\}|\(|\)|<|\&[^\d]|@|\||ls|cat|sh|flag|find|grep|echo|w/is", $file2))
            $file2 = "";
        
        // Prevent injection
        $file1 = '"' . $file1 . '"';
        $file2 = '"' . $file2 . '"';
         
        // run command
        $cmd = "file $file1 $file2";
        system($cmd);
    ?>
</body>

</html>
