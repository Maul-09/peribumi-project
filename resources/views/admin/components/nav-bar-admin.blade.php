<div class="sidebar" id="sidebar">
    <!-- Admin Header with Logo and Hamburger Icon -->
    <div class="admin-header">
        <h2 class="admin-title">ADMINISTRATOR</h2>
        <i class="fas fa-bars hamburger-icon" id="hamburger-icon" onclick="toggleSidebar()"></i>
    </div>
    <div class="admin-logo-section">
        <img src="logo.png" alt="Admin Logo" class="admin-logo">
        <div class="admin-icons">
            <i class="fas fa-user-circle profile-icon" title="Profile"></i>
            <i class="fas fa-cog settings-icon" title="Settings"></i>
            <i class="fas fa-sign-out-alt logout-icon" title="Logout" onclick="logout()"></i>
        </div>
    </div>
    <hr>

    <!-- Sidebar Menu -->
    <div class="sidebar-menu">
        <div class="menu-item active">
            <i class="fas fa-th-large dashboard-icon"></i>
            <p>Dashboard</p>
        </div>
        <div class="menu-item">
            <i class="fas fa-sliders-h product-icon"></i>
            <p>Manajemen Produk</p>
        </div>
        <div class="menu-item">
            <i class="fas fa-archive lms-icon"></i>
            <p>LMS</p>
        </div>
    </div>

    <!-- Profile Picture and Watermark -->
    <div class="admin-profile" id="admin-profile">
        <img src="profile-pic.jpg" alt="Profile Picture" class="profile-pic">
        <p>Peribumi Consultan Admin</p>
    </div>
</div>
