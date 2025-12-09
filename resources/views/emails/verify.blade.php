<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>

<body style="margin:0; padding:0; background:#f5f5f5; font-family:Arial, sans-serif;">

    <!-- Outer Wrapper -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#f5f5f5; padding:30px 0;">
        <tr>
            <td align="center">

                <!-- Email Container -->
                <table width="600" border="0" cellspacing="0" cellpadding="0" 
                       style="background:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1);">

                    <!-- Header -->
                    <tr>
                        <td style="background:#4F46E5; padding:20px 30px; text-align:center;">
                            <h1 style="margin:0; color:#ffffff; font-size:24px; font-weight:bold;">
                                {{ config('app.name') }}
                            </h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px; color:#333333; font-size:16px; line-height:1.6;">
                            
                            <h2 style="margin-top:0; color:#111111;">Hello, {{ $user->name }}!</h2>

                            <p>
                                Thank you for joining <strong>{{ config('app.name') }}</strong>!  
                                Please verify your email address by clicking the button below.
                            </p>

                            <p style="text-align:center; margin:30px 0;">
                                <a href="{{ $url }}" 
                                   style="background:#4F46E5; padding:14px 30px; color:white; 
                                          text-decoration:none; font-weight:bold; border-radius:6px; 
                                          display:inline-block;">
                                    Verify Email
                                </a>
                            </p>

                            <p>
                                If you didn’t create an account, you can safely ignore this email.
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f0f0f0; padding:20px 30px; text-align:center; color:#666666; font-size:14px;">
                            <p style="margin:0;">
                                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
