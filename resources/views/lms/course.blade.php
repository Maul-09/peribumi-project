<x-layout-lms>
    <div class="container mt-4">
        <div class="course-header text-center">
            <h1>Introduction to Programming</h1>
            <p class="text-muted">Instructor: John Doe</p>
        </div>
    </div>

    <!-- Course Content -->
    <div class="container">
        <h3>Course Modules</h3>
        <div class="accordion" id="courseAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Module 1: Basics of Programming
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#courseAccordion">
                    <div class="accordion-body">
                        <p>Introduction to variables, data types, and simple logic structures. This module will help you understand how programming works at a basic level.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Module 2: Control Flow
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#courseAccordion">
                    <div class="accordion-body">
                        <p>Learn how to use conditional statements and loops to make your code more dynamic and capable of making decisions.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Module 3: Functions and Procedures
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#courseAccordion">
                    <div class="accordion-body">
                        <p>This module covers how to write reusable code through functions, making your programs more efficient and organized.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; 2024 LMS Platform. All Rights Reserved.</p>
    </footer>
</x-layout-lms>