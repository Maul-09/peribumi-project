<x-layout :ShowNavbar="false" :ShowFooter="false">
    <x-slot:name>Beranda</x-slot>
    <x-slot:title>{{ asset('css/user-style/style-edit-profile.css') }}</x-slot>
    <div class="profile-container">
        <!-- Profile Image Section with Icons -->
        <div class="profile-image-section">
            @php
            $initial = strtolower(substr($field->name, 0, 1));
            $defaultImageName = 'default_' . $initial . '.png';
            $defaultImagePath = public_path('profile/' . $defaultImageName);
            @endphp

            @if ($field->image)
                <img src="{{ asset('profile/' . $field->image) }}" alt="Profile Image" class="profile-image">
            @else
                <div class="profile-image" style="background-color: #ccc; display: flex; justify-content: center; align-items: center;">
                    <span style="font-size: 60px; color: white;">{{ strtoupper($initial) }}</span>
                </div>
            @endif

            <div class="image-buttons">
                <label for="file-upload" class="icon-button" title="Choose Photo">
                    <i class="fas fa-upload"></i>
                </label>
                <input id="file-upload" type="file" class="file-input @error('image') is-invalid @enderror" name="image" style="display: none;">
                <button type="button" class="icon-button icon-delete" title="Delete Photo">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Profile Forms Section -->
        <div class="profile-forms">
            <!-- Profile Information Card -->
            <div class="profile-card">
                <form action="{{ route('update.profile', $field->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Name -->
                    <div class="form-profile">
                        <label class="label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $field->name) }}" placeholder="Enter your name">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-profile">
                        <label class="label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $field->email) }}" placeholder="Enter your new email">
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Username -->
                    <div class="form-profile">
                        <label class="label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $field->username) }}" placeholder="Enter your username">
                        @error('username')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="save-btn">Save Changes</button>
                </form>
            </div>

            <!-- Password Update Card -->
            <div class="profile-card">
                <form action="{{ route('updatePassword', $field->id) }}" method="post">
                    @csrf
                    <!-- Password -->
                    <div class="form-profile">
                        <label class="label">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter new password">
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-profile">
                        <label class="label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm new password">
                    </div>
                    <button type="submit" class="save-btn">Save Password</button>
                </form>
            </div>

            <!-- Delete Account Card -->
            <div class="profile-card">
                <form action="{{ route('deleteAccount', $field->id) }}" method="post">
                    @csrf
                    <button type="submit" class="delete-btn">Delete Account</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
