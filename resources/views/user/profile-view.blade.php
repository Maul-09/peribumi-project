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
                <div class="profile-image"
                    style="background-color: #ccc; display: flex; justify-content: center; align-items: center;">
                    <span style="font-size: 60px; color: white;">{{ strtoupper($initial) }}</span>
                </div>
            @endif


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
                    <div class="image-buttons">
                        <label for="file-upload" class="icon-button" title="Choose Photo">
                            <i class="fas fa-upload"></i>
                        </label>
                        <input id="file-upload" type="file" class="file-input @error('image') is-invalid @enderror"
                            name="image" style="display: none;">
                        <button type="button" class="icon-button icon-delete" title="Delete Photo">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <!-- Name -->
                    <div class="form-profile">
                        <label class="label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $field->name) }}" placeholder="Enter your name">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-profile">
                        <label class="label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email', $field->email) }}" placeholder="Enter your new email">
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Username -->
                    <div class="form-profile">
                        <label class="label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username', $field->username) }}"
                            placeholder="Enter your username">
                        @error('username')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="save-btn">Save Changes</button>
                </form>
            </div>

            <!-- Password Update Card -->
            <div class="profile-card">
                <form action="{{ route('change.password', $field->id) }}" method="POST">
                    @csrf

                    <div class="form-profile">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" class="form-control" required>
                        @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-profile">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" class="form-control" required>
                        @error('new_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-profile">
                        <label for="new_password_confirmation">Confirm Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required>
                        @error('new_password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="save-btn">Save Changes</button>
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

    {{-- <div class="account-settings">
        <h4>Account Settings</h4>
        <div class="settings-container">
            <div class="nav-tabs">
                <div class="tabs">
                    <a href="#" class="tab-link active" data-target="general">General</a>
                    <a href="#" class="tab-link" data-target="change-password">Change Password</a>
                    <a href="#" class="tab-link" data-target="info">Info</a>
                    <a href="#" class="tab-link" data-target="social-links">Social Links</a>
                    <a href="#" class="tab-link" data-target="notifications">Notifications</a>
                </div>
            </div>
            <div class="tab-content">
                <!-- General -->
                <div class="tab-pane active" id="general">
                    <div class="photo-upload">
                        <img src="default-photo.png" alt="Profile Photo" class="profile-photo">
                        <div>
                            <label>Upload new photo</label>
                            <input type="file" class="file-input">
                            <button type="button" class="btn-reset">Reset</button>
                            <small>Allowed JPG, GIF, or PNG. Max size 800KB</small>
                        </div>
                    </div>
                    <hr>
                    <div class="form-section">
                        <div class="form-group">
                            <label class="form-label"><i class="icon-user"></i> Name</label>
                            <input type="text" class="form-control" value="nmaxwell">
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="icon-envelope"></i> Email</label>
                            <input type="text" class="form-control" value="nmaxwell@mail.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="icon-user-circle"></i> Username</label>
                            <input type="text" class="form-control" value="Nelle Maxwell">
                            <div class="alert">
                                Your email is not confirmed. Please check your inbox.<br>
                                <a href="javascript:void(0)">Resend confirmation</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="icon-briefcase"></i> Company</label>
                            <input type="text" class="form-control" value="Company Ltd.">
                        </div>
                    </div>
                </div>

                <!-- Change Password -->
                <div class="tab-pane" id="change-password">
                    <h5>Change Your Password</h5>
                    <div class="form-group">
                        <label class="form-label">Current Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control">
                    </div>
                </div>

                <!-- Info -->
                <div class="tab-pane" id="info">
                    <h5>Personal Information</h5>
                    <div class="form-group">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="tab-pane" id="social-links">
                    <h5>Social Media Links</h5>
                    <div class="form-group">
                        <label class="form-label">Facebook</label>
                        <input type="url" class="form-control" placeholder="https://facebook.com/username">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Twitter</label>
                        <input type="url" class="form-control" placeholder="https://twitter.com/username">
                    </div>
                </div>

                <!-- Notifications -->
                <div class="tab-pane" id="notifications">
                    <h5>Manage Notifications</h5>
                    <div class="form-group">
                        <label>
                            <input type="checkbox"> Email Notifications
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox"> SMS Notifications
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox"> Push Notifications
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="action-buttons">
            <button type="button" class="btn-save">Save changes</button>
            <button type="button" class="btn-cancel">Cancel</button>
        </div>
    </div> --}}

</x-layout>
