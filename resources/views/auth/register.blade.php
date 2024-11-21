<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="register">
        <form action="{{ route('signup') }}" method="post" class="signup">
            @csrf
            <h2 class="title">Sign up</h2>
            <div class="input-field">
                <input type="text" name="name" placeholder="Nama lengkap" value="{{ old('name') }}">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                @error('username')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password" placeholder="Password">
                @error('password')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-field">
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Confirm Password">
                @error ('password_confirmation')
                    <p style="color: red;">{{$message }}</p>
                @enderror
            </div>
            <input type="submit" class="btn" value="Sign up" />
        </form>
        <p>Sudah punya akun? <a href="{{ route('login') }}" class="btn-login">Sign In</a></p>
    </div>

    <script>
        document.getElementById('signup-form').onsubmit = function(event) {
            event.preventDefault(); // Mencegah refresh halaman

            // Mengambil data form
            const formData = new FormData(this);

            fetch("{{ route('signup') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.errors) {
                        // Menampilkan kesalahan
                        for (const [key, value] of Object.entries(data.errors)) {
                            const errorElement = document.querySelector(`input[name="${key}"]`).nextElementSibling;
                            if (errorElement) {
                                errorElement.innerText = value[0]; // Menampilkan pesan kesalahan
                            }
                        }
                    } else {
                        // Tindakan setelah pendaftaran berhasil, misalnya redirect
                        window.location.href = data.redirect; // Ganti dengan URL redirect yang sesuai
                    }
                })
                .catch(error => console.error('Error:', error));
        };
    </script>
</body>

</html>
