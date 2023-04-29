<?php
$verif_box = $_REQUEST["verif_box"];
// check to see if verificaton code was correct
if(md5($verif_box).'a4xn' == $_COOKIE['tntcon'])

{
$from="reply@sfccoolcarrier.in";
$headers = "From: info@sfccoolcarrier.in";//.$from; info@sfccoolcarrier.in

$to="vadodara@sfccoolcarrier.in";
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$services=$_POST['services'];
$message=$_POST['message'];
$subject="SFC Cool Service Request: $name";

$senddate=date("d M Y");
 $mess = "<html>      
            <body>
            <STYLE type=text/css>
                .text {
                    font-family: Verdana, Arial, Helvetica, sans-serif;
                    font-size: 11px;
                    font-weight: normal;
                    color: #000000;
                    text-decoration: none;
                    }           

            .texttitle {
                        color: #006898; 
                        FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
                        FONT-SIZE: 11px;
                        FONT-WEIGHT: bold
                    }
            .texttitle1 {
                        color: #804040; 
                        FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
                        FONT-SIZE: 11px;
                        FONT-WEIGHT: bold
                    }
            .texttitle2 {
                        color: #543AE4; 
                        FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
                        FONT-SIZE: 11px;
                        FONT-WEIGHT: bold
                    }

            </style>
            <table align=center>
               <tr>
                    <td class=text>&nbsp;<b>Inquiry Details of $name</b></td>
                </tr>
                <tr>
                    <td class=text>&nbsp;<br><br></td>
                </tr>
                </table>
                       <table align=center width=500 cellspacing=0 cellpadding=2 style=border-collapse:collapse border=1 >
                            <tr>
                                <td class=texttitle1><p>Name</p></td>
                                <td class=text>&nbsp;$name</td>
                            </tr>
							
							<tr>
                                <td class=texttitle1 ><p>Email</p></td>
                                <td class=text>&nbsp;$email</td>
                            </tr>
							<tr>
                                <td class=texttitle1 ><p>Phone</p></td>
                                <td class=text>&nbsp;$phone</td>
                            </tr>
							<tr>
                                <td class=texttitle1 ><p>Service</p></td>
                                <td class=text>&nbsp;$services</td>
                            </tr>
                            <tr>
                                <td class=texttitle1 ><p>Message</p></td>
                                <td class=text>&nbsp;$message</td>
                            </tr>                            
                        </table>";
        $mess =$mess. "</body></html>";
 mail($to,$subject,$mess,"From:$from\nReply-To: $from\nContent-Type: text/html; charset=iso-8859-1");
header("Location:thanks.html");
}
else {
	// if verification code was incorrect then return to contact page and show error
	header("Location:".$_SERVER['HTTP_REFERER']."?subject=$subject&from=$from&message=$message&wrong_code=true");
	exit;
}
?>
