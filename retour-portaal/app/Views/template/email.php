<div style="font-family:HelveticaNeue-Light,Arial,sans-serif;background-color:#eeeeee">
    <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
        <tbody>
        <tr>
            <td>
                <table align="center" width="750px" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee" style="width:750px!important">
                    <tbody>
                    <tr>
                        <td>
                            <table width="690" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
                                <tbody>
                                <tr>
                                    <td colspan="3" align="center">
                                        <table width="630" align="center" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td colspan="3" height="60"></td></tr><tr><td width="25"></td>
                                                <td align="center">
                                                    <h1 style="font-family:HelveticaNeue-Light,arial,sans-serif;font-size:48px;color:#404040;line-height:48px;font-weight:bold;margin:0;padding:0">Thank you for submitting Your return!</h1>
                                                </td>
                                                <td width="25"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" height="40"></td></tr><tr><td colspan="5" align="center">
                                                    <p style="color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0">
                                                        We have received your return submission successfully, someone will review your return if approved you will receive and email with your return label. So just hold on a little longer most request are processed with 2 - 3 work days.
                                                    </p>
                                                    <br>
                                                </td>
                                            </tr>
                                            <tr><td colspan="3" height="30"></td></tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr bgcolor="#ffffff">
                                    <td width="30" bgcolor="#eeeeee"></td>
                                    <td>
                                        <table width="570" align="center" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td colspan="4" align="center">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="center"><h2 style="font-size:24px">Items submitted for return</h2></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <?php foreach ($items as $item){ $check = false ?>
                                            <tr>
                                                <td width="120" align="right" valign="top"><h1><?= $item['amount']?>x</h1></td>
                                                <td width="30"></td>
                                                <td align="left" valign="middle">
                                                    <h3 style="color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0"><?php foreach ($products as $product) {if ($product['sku'] == $item['sku'] && $check == false){ echo $product['name']; $check = true; }} ?></h3>
                                                    <div style="line-height:5px;padding:0;margin:0">&nbsp;</div>
                                                    <div style="color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0">Reason: <?php if(!empty($item['reason'])){ echo $item['reason']; }elseif(!empty($item['description'])){ echo $item['description']; } ?></div>
                                                    <div style="line-height:10px;padding:0;margin:0">&nbsp;</div>
                                                </td>
                                                <td width="30"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" height="40" style="padding:0;margin:0;font-size:0;line-height:0"></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="4">&nbsp;</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="30" bgcolor="#eeeeee"></td>
                                </tr>
                                </tbody>
                            </table>
                            <table align="center" width="750px" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee" style="width:750px!important">
                                <tbody>
                                <tr>
                                    <td>
                                        <table width="630" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#eeeeee">
                                            <tbody>
                                            <tr><td colspan="2" height="30"></td></tr>
                                            <tr><td colspan="2" height="5"></td></tr>

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>