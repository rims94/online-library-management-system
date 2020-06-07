<?php

$to = "dec3rd1994@gmail.com";

$subject = "Contact Lead";

$message = "<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>";

$header = 'From: <saayaanghosh@gmail.com>' . "\r\n";
$header .= 'Content-type:text/html;charset=UTF-8' . "\r\n";


if(mail($to,$subject,$message,$header)){

echo "Email send successfully";

}else{

echo "Email Failed";

}


?>