Hello {{$email_data['name']}}
<br><br>
We received a request to change the password!
<br>
Please click the below link to reset your password.
<br><br>
<a href="http://127.0.0.1:8000/reset?code={{$email_data['PasswordResets_code']}}">Click Here!</a>
<br>
If you have not request a reset password, please ignore this message.
<br><br>
<br><br>
Thank you!
<br>
PCP