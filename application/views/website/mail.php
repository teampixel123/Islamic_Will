<<?php

$to ='asif@pixelbazar.com';
       $subject = 'Email From Web:';
       $message = '
           <style type="text/css">
           a:hover { text-decoration: none !important; }
           .header h1 {color: #fff !important; font: normal 33px Georgia, serif; margin: 0; padding: 0; line-height: 33px;}
           .header p {color: #dfa575; font: normal 11px Georgia, serif; margin: 0; padding: 0; line-height: 11px; letter-spacing: 2px}
           .content h2 {color:#8598a3 !important; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 30px; font-size: 30px;font-family: Georgia, serif; }
           .content p {color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 12px;font-family: Georgia, serif;}
           .content a {color: #d18648; text-decoration: none;}
           .footer p {padding: 0; font-size: 11px; color:#fff; margin: 0; font-family: Georgia, serif;}
           .footer a {color: #f7a766; text-decoration: none;}
           </style>
           <div style="margin: 0; padding: 0; background: #bccdd9;">
               <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                   <tr>
                       <td align="center" style="margin: 0; padding: 0; padding: 35px 0">
                           <table cellpadding="0" cellspacing="0" border="0" align="center" width="650" style="font-family: Georgia, serif;" class="header">
                               <tr>
                                   <td style="" align="center">
                                       <h2 style="color:#8598a3; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 30px; font-size: 20px;font-family: Georgia, serif; ">Welcome</h2>
                                   </td>
                               </tr>
                           <tr>
                               <td style="font-size: 1px; height: 5px; line-height: 1px;" height="5">&nbsp;</td>
                           </tr>
                       </table><!-- header-->
                       <table cellpadding="0" cellspacing="0" border="0" align="center" width="650" style="font-family: Georgia, serif; background: #fff;" bgcolor="#ffffff">
                               <tr>
                                   <td width="14" style="font-size: 0px;" bgcolor="#ffffff">&nbsp;</td>
                           <td width="620" valign="top" align="left" bgcolor="#ffffff"style="font-family: Georgia, serif; background: #fff;">
                               <table cellpadding="0" cellspacing="0" border="0"  style="color: #717171; font: normal 11px Georgia, serif; margin: 0; padding: 0;" width="620" class="content">

                               <tr>
                                   <td style="padding: 25px 0 0;" align="left">
                                       <h2 style="color:#8598a3; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 30px; font-size: 20px;font-family: Georgia, serif; ">Hello</h2>
                                   </td>
                               </tr>
                               <tr>
                                   <td style="" align="left">
                                       <h2 style="color:#8598a3; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 30px; font-size: 20px;font-family: Georgia, serif; ">Greetings of the day.</h2>
                                   </td>
                               </tr>
                               <tr>
                                   <td style="padding: 15px 0 30px; border-bottom: 1px solid #d2b49b;"  valign="top">
                                       <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
                                       '.$message1.'
                                       </p><br><br>
                                       <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
                                       Your Regarding,
                                       </p>
                                       <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
                                   '.$name.'
                                       </p>
                                   </td>
                               </tr>
                               <tr>
                                   <td style="padding: 15px 0 30px; border-bottom: 1px solid #d2b49b;"  valign="top">
                                       <p style="color:#698291; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 16px;font-family: Georgia, serif; ">
                                       Sender Information:
                                       </p>
                                       <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
                                       Name: '.$name.'
                                       </p>
                                       <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
                                       Mobile No: '.$mobile.'
                                       </p>
                                       <p style="color:#767676; font-weight: normal; margin: 0; padding: 0; line-height: 20px; font-size: 14px;font-family: Georgia, serif; ">
                                       Email: <a href="mailto:'.$email.'">'.$email.'</a>
                                       </p>

                                   </td>
                               </tr>
                               </table>
                           </td>
                               </tr>
                       </table><!-- body -->
                       <table cellpadding="0" cellspacing="0" border="0" align="center" width="650" style="font-family: Georgia, serif; line-height: 10px;" bgcolor="#698291" class="footer">
                               <tr>
                                   <td bgcolor="#698291"  align="center" style="padding: 15px 0 10px; font-size: 11px; color:#fff; margin: 0; line-height: 1.2;font-family: Georgia, serif;" valign="top">
                               <p style="padding: 0; font-size: 14px; color:#fff; margin: 0; font-family: Georgia, serif;">Mail from PixelBazar web contact form</p>
                           </td>
                               </tr>
                       </table><!-- footer-->
                       </td>
               </tr>
               </table>
           </div>
       ';
       $headers = "From: ".$email." \r\n";
       $headers .= "Reply-To: ".$email."\r\n";
   $headers .= "Content-Type: text/html; charset=iso-8859-1' . ";

       $send_meil = mail($to, $subject, $message, $headers);

       if($send_meil){
           $this->session->set_flashdata("email_msg","email_success");
           header('location:contact');
       }
       else{
           $this->session->set_flashdata("email_msg","email_error");
         header('location:contact');
       }
    }

 ?>
