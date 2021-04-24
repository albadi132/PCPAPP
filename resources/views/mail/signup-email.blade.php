Hello {{$email_data['name']}}
<br><br>
Welcome to PCP!
<br>
Please click the below link to verify your email and activate your account!
<br><br>
<a href="http://127.0.0.1:8000/verify?code={{$email_data['verification_code']}}">Click Here!</a>

<br><br>
Thank you!
<br>
PCP