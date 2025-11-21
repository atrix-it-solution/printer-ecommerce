<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirm your {{ config('app.name') }} account</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial,Helvetica,sans-serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8;padding:24px 0;">
<tr>
<td align="center">
<table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 18px rgba(0,0,0,0.06);">
<!-- Header -->
<tr>
<td style="padding:24px 32px 8px;">
<h1 style="margin:0;font-size:20px;color:#111827;">Welcome to {{ config('app.name') }}, {{ $user->name }}!</h1>
</td>
</tr>
 
<!-- Body -->
<tr>
<td style="padding:8px 32px 24px;color:#374151;font-size:15px;line-height:1.5;">
<p style="margin:0 0 16px;">Thanks for signing up. To finish creating your account, please confirm your email address by clicking the button below.</p>
 
<!-- Button -->
<table role="presentation" cellpadding="0" cellspacing="0" style="margin:18px 0;">
<tr>
<td align="center">
<a href="{{ $verificationUrl }}" style="display:inline-block;padding:12px 22px;border-radius:6px;text-decoration:none;font-weight:600;background:#2563eb;color:#ffffff;">
Confirm my email
</a>
</td>
</tr>
</table>
 
<p style="margin:0 0 8px;">If the button doesn't work, copy and paste this link into your browser:</p>
<p style="word-break:break-all;margin:0 0 16px;"><a href="{{ $verificationUrl }}" style="color:#2563eb;text-decoration:underline;">{{ $verificationUrl }}</a></p>
 
<p style="margin:0 0 12px;color:#6b7280;font-size:13px;">If you didn't create this account, you can safely ignore this email or contact us at <a href="mailto:{{ config('mail.from.address') }}" style="color:#2563eb;text-decoration:underline;">{{ config('mail.from.address') }}</a>.</p>
</td>
</tr>
 
<!-- Footer -->
<tr>
<td style="padding:16px 32px 24px;font-size:13px;color:#9ca3af;background:#fafafa;">
<p style="margin:0 0 6px;">Thanks — The {{ config('app.name') }} Team</p>
<p style="margin:0;color:#9ca3af;">Need help? Email <a href="mailto:{{ config('mail.from.address') }}" style="color:#9ca3eb;text-decoration:underline;">{{ config('mail.from.address') }}</a></p>
<hr style="border:none;border-top:1px solid #edf2f7;margin:12px 0;">
</td>
</tr>
 
</table>
</td>
</tr>
</table>
</body>
</html>