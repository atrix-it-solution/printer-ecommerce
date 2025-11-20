<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Password Reset OTP</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #f8f9fa; padding: 20px; text-align: center; }
        .otp-container { background: #f8f9fa; padding: 20px; text-align: center; margin: 20px 0; }
        .otp-code { font-size: 32px; font-weight: bold; letter-spacing: 10px; color: #007bff; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pro Printer Shop</h1>
            <h2>Password Reset OTP</h2>
        </div>
        
        <p>Hello,</p>
        
        <p>You have requested to reset your password. Use the following OTP to verify your identity:</p>
        
        <div class="otp-container">
            <div class="otp-code">{{ $otp }}</div>
            <p style="margin-top: 10px; font-size: 14px; color: #666;">
                This OTP will expire in 10 minutes.
            </p>
        </div>
        
        <p>If you did not request this password reset, please ignore this email.</p>
        
        <div class="footer">
            <p>Thank you,<br>The Pro Printer Shop Team</p>
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>