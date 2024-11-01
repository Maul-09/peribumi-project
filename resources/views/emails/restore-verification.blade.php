<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi Pemulihan Akun</title>
</head>

<body>
    <h1>Verifikasi Pemulihan Akun</h1>
    <p>Anda telah meminta pemulihan akun. Klik tautan di bawah ini untuk memulihkan akun Anda:</p>
    <a href="{{ route('restore.confirm', ['token' => $token, 'email' => $user->email]) }}">Restore Account</a>
</body>

</html>
