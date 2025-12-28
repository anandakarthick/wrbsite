# 📧 Email Configuration Guide for KA Software Website

## Overview
This guide explains how to configure SMTP email for the contact form to send:
1. **Admin Notification** - Email sent to info@kasoftware.in when someone submits the form
2. **Customer Auto-Reply** - Confirmation email sent to the customer

---

## Step 1: Choose Your SMTP Provider

### Option A: Gmail SMTP (Recommended for Testing)

1. Go to Google Account Settings: https://myaccount.google.com/
2. Navigate to Security > 2-Step Verification (Enable it)
3. Go to Security > App Passwords
4. Generate a new App Password for "Mail"
5. Copy the 16-character password

**Update .env file:**
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-gmail@gmail.com
MAIL_PASSWORD=xxxx-xxxx-xxxx-xxxx  # App Password (not your regular password)
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="info@kasoftware.in"
MAIL_FROM_NAME="KA Software"
```

---

### Option B: Hostinger SMTP (If using Hostinger hosting)

**Update .env file:**
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=587
MAIL_USERNAME=info@kasoftware.in
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="info@kasoftware.in"
MAIL_FROM_NAME="KA Software"
```

---

### Option C: cPanel/Web Hosting SMTP

**Update .env file:**
```env
MAIL_MAILER=smtp
MAIL_HOST=mail.kasoftware.in
MAIL_PORT=587
MAIL_USERNAME=info@kasoftware.in
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="info@kasoftware.in"
MAIL_FROM_NAME="KA Software"
```

---

### Option D: SendGrid (Professional Email Service)

1. Sign up at https://sendgrid.com/
2. Create an API Key
3. Verify your sender email

**Update .env file:**
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=your-sendgrid-api-key
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="info@kasoftware.in"
MAIL_FROM_NAME="KA Software"
```

---

### Option E: Mailgun (Professional Email Service)

**Update .env file:**
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=postmaster@your-domain.mailgun.org
MAIL_PASSWORD=your-mailgun-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="info@kasoftware.in"
MAIL_FROM_NAME="KA Software"
```

---

## Step 2: Update Admin Email (Optional)

To change where admin notifications are sent, edit:
`app/Http/Controllers/ContactController.php`

```php
private $adminEmail = 'info@kasoftware.in';  // Change this
```

Or add to .env:
```env
ADMIN_EMAIL=info@kasoftware.in
```

And update controller to:
```php
private $adminEmail;

public function __construct()
{
    $this->adminEmail = env('ADMIN_EMAIL', 'info@kasoftware.in');
}
```

---

## Step 3: Clear Cache After Changes

After updating .env, run these commands:

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

---

## Step 4: Test Email Configuration

### Method 1: Use Tinker
```bash
php artisan tinker
```
Then run:
```php
Mail::raw('Test email from KA Software', function($message) {
    $message->to('your-test-email@gmail.com')->subject('Test');
});
```

### Method 2: Submit Contact Form
Simply fill out the contact form on the website and check:
1. Admin inbox (info@kasoftware.in) for notification
2. Customer inbox for auto-reply

---

## Troubleshooting

### Error: "Connection could not be established"
- Check if your hosting allows outbound SMTP connections
- Verify MAIL_HOST and MAIL_PORT are correct
- Try port 465 with MAIL_ENCRYPTION=ssl

### Error: "Authentication failed"
- Double-check username and password
- For Gmail, ensure you're using App Password, not regular password
- Verify 2-Step Verification is enabled for Gmail

### Emails going to Spam
- Set up SPF, DKIM, and DMARC records for your domain
- Use a professional email service like SendGrid or Mailgun
- Ensure MAIL_FROM_ADDRESS matches your domain

### Error: "stream_socket_enable_crypto()"
- Try changing MAIL_ENCRYPTION from tls to ssl
- Or change MAIL_PORT from 587 to 465

---

## Email Templates Location

- Admin notification: `resources/views/emails/contact-inquiry.blade.php`
- Customer auto-reply: `resources/views/emails/customer-auto-reply.blade.php`

You can customize these templates to match your branding.

---

## Quick Setup Checklist

- [ ] Choose SMTP provider
- [ ] Update .env with correct credentials
- [ ] Clear Laravel cache
- [ ] Test by submitting contact form
- [ ] Verify admin receives notification
- [ ] Verify customer receives auto-reply

---

## Support

If you need help configuring email:
- Email: helpdesk@kasoftware.in
- Phone: +91 8056653499
