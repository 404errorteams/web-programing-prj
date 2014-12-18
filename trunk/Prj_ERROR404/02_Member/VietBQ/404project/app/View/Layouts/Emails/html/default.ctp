<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
    <head>
        <meta http-equiv="Content-Language" content="ja">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>テンプレート</title>
        <meta http-equiv="Content-Style-Type" content="text/css">

        <style type="text/css"><!--
            body{margin:0;padding:0;font-size:14px;}
            --></style>
    </head>
    <body>
        <table border="0" cellspacing="0" cellpadding="0" style="background:#e8e8e8;">

            <tr>
                <td colspan="3" style="width:480px ; height: 15px; background: gainsboro">
                </td>
            </tr>
            <br>
            <tr>

                <td width="35"></td>
                <td>                    <center><img src="https://scontent-a-hkg.xx.fbcdn.net/hphotos-xfp1/v/t1.0-9/1483227_1519232385020516_2219323298160646438_n.png?oh=6ded4a793650b3c18fc44f599f369b0e&oe=553AB15F"/></center>        </td>
        <td width="35"></td>
    </tr>

            <?php echo $this->fetch('content'); ?>

    <tr>
        <td width="35"></td>
        <td width="410" style="text-align:center;">
            <br>
            <br><br>

            <a href="https://www.facebook.com/404ebook"><p style="text-align:center;color:#666;font-size:12px;margin:10px 0 0px 0;">(c)404ebook</p></a>
        </td>
        <td width="35"></td>
    </tr>
    <br>

    <tr>
        <td colspan="3" style="width:480px ; height: 15px; background: gainsboro">
        </td>
    </tr>


</table>

</body>
</html>