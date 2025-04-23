<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f0f0f0;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f0f0f0; padding: 30px 0;">
        <tr>
            <td align="center" valign="top">
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border: 1px solid #e0e0e0; font-family: Arial, sans-serif;">
                    <tr>
                        <td style="padding: 30px;">
                            <h2 style="margin: 0 0 20px 0; font-size: 22px; color: #333333;">Reset Password</h2>
                            <p style="font-size: 14px; color: #333333; line-height: 1.6; margin: 0 0 15px 0;">
                                Halo, <strong><?= $email ?></strong>
                            </p>
                            <p style="font-size: 14px; color: #333333; line-height: 1.6; margin: 0 0 25px 0;">
                                Silakan klik tombol di bawah untuk Reset password akun Anda:
                            </p>
                            <p style="text-align: center; margin: 30px 0;">
                                <a href="<?= $verification_link ?>" style="background-color: #007bff; color: #ffffff !important; padding: 12px 24px; text-decoration: none; border-radius: 5px; display: inline-block; font-size: 14px; font-weight: bold;">
                                    Reset Password
                                </a>
                            </p>
                            <p style="font-size: 14px; color: #333333; line-height: 1.6; margin: 0 0 20px 0;">
                                Jika Anda tidak mendaftar pada platform kami, Anda dapat mengabaikan email ini.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #f9f9f9; padding: 20px; text-align: center; border-top: 1px solid #e0e0e0;">
                            <p style="font-size: 12px; color: #888888; margin: 0;">
                                &copy; <?= date('Y') ?> E-Procurement. Semua hak dilindungi.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>