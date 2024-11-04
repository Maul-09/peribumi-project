<x-layout>
    <x-slot:name>Beranda</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-edit-profile.css') }}</x-slot>
    <div class="profile-container">
        <form action="" method="post" class="profile-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Image -->
            <div class="form-profile">
                <label class="label-image">Profile Image</label>
                <input type="file" class="file-input @error('image') is-invalid @enderror" name="image">
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Name Input -->
            <div class="form-profile">
                <label class="label">Name</label>
                <input type="text" class="form-control" @error('name') is-invalid @enderror" name="name" value="{{ old('name', $field->name) }}" placeholder="Enter your name">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Input -->
            <div class="form-profile">
                <label class="label">Email</label>
                <input type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email', $field->email) }}" placeholder="Enter your new email">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Username Input -->
            <div class="form-profile">
                <label class="label">Username</label>
                <input type="text" class="form-control" @error('username') is-invalid @enderror" name="username" value="{{ old('username', $field->username) }}" placeholder="Enter your username">
                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="form-profile">
                <label class="label">Password</label>
                <input type="password" class="form-control" @error('password') is-invalid @enderror" name="password" placeholder="Enter new password">
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
