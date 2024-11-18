<x-layout-lms>
    <!-- Navbar -->
    

    <!-- Main Container -->
    <div class="container mt-4">
        <h2 class="mb-4">Welcome to Your LMS Dashboard</h2>
        
        <!-- Dashboard Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <p class="card-text">View and manage all your courses.</p>
                        <a href="{{ route('lmscourse') }}" class="btn btn-primary">Go to Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <p class="card-text">Manage student data and track progress.</p>
                        <a href="#" class="btn btn-primary">Manage Students</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reports</h5>
                        <p class="card-text">Generate and view performance reports.</p>
                        <a href="#" class="btn btn-primary">View Reports</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course List Table -->
        <h4 class="mb-3">Current Courses</h4>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Introduction to Programming</td>
                    <td>John Doe</td>
                    <td><div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                    </div></td>
                    <td><button class="btn btn-info btn-sm">View</button></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Data Science Basics</td>
                    <td>Jane Smith</td>
                    <td><div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                    </div></td>
                    <td><button class="btn btn-info btn-sm">View</button></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Web Development 101</td>
                    <td>Michael Lee</td>
                    <td><div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                    </div></td>
                    <td><button class="btn btn-info btn-sm">View</button></td>
                </tr>
            </tbody>
        </table>
    </div>


</x-layout-lms>