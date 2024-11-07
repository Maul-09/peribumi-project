<x-layout>
    <x-slot:name>Beranda</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-edit-profile.css') }}</x-slot>
    <div class="profile-container">
        <form action="{{ route('update.profile', $field->id) }}" method="post" class="profile-form"
            enctype="multipart/form-data">
            @csrf

            <!-- Profile Image -->
            <div class="form-profile">
                @if ($field->image)
                    <img src="{{ asset('profile/' . $field->image) }}" alt="Profile Image" class="profile-image"
                        style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                @else
                    @php
                        // Menggunakan huruf pertama dari nama untuk gambar default
                        $initial = strtolower(substr($field->name, 0, 1));
                        $defaultImageName = 'default_' . $initial . '.png';
                        $defaultImagePath = public_path('profile/' . $defaultImageName);
                    @endphp

                    @if (file_exists($defaultImagePath))
                        <img src="{{ asset('profile/' . $defaultImageName) }}" alt="Default Profile Image"
                            class="profile-image"
                            style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                    @else
                        <div class="profile-image"
                            style="width: 150px; height: 150px; background-color: #ccc; display: flex; justify-content: center; align-items: center; border-radius: 50%;">
                            <span style="font-size: 60px; color: white;">{{ strtoupper($initial) }}</span>
                        </div>
                    @endif
                @endif

                <label class="label-image">Profile Image</label>
                <input type="file" class="file-input @error('image') is-invalid @enderror" name="image">
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Name Input -->
            <div class="form-profile">
                <label class="label">Name</label>
                <input type="text" class="form-control" @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', $field->name) }}" placeholder="Enter your name">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Input -->
            <div class="form-profile">
                <label class="label">Email</label>
                <input type="email" class="form-control" @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email', $field->email) }}" placeholder="Enter your new email">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Username Input -->
            <div class="form-profile">
                <label class="label">Username</label>
                <input type="text" class="form-control" @error('username') is-invalid @enderror" name="username"
                    value="{{ old('username', $field->username) }}" placeholder="Enter your username">
                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="form-profile">
                <label class="label">Password</label>
                <input type="password" class="form-control" @error('password') is-invalid @enderror" name="password"
                    placeholder="Enter new password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="save-btn">Save Changes</button>
            <form action="{{ route('deleteAccount', $field->id) }}" method="post" class="delete-form">
                @csrf
                <button type="submit" class="delete-btn">Delete Account</button>
            </form>
        </form>

        <!-- Delete Account Button -->

    </div>

</x-layout>
