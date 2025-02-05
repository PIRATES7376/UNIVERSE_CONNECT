document.addEventListener("DOMContentLoaded", function () {
    loadEnrolledCourses();
});

function loadEnrolledCourses() {
    const xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../control/enrolledCoursesControl.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                const response = JSON.parse(this.responseText);
               

                const courseListDiv = document.getElementById("course-list");

                if (response.courses && response.courses.length > 0) {
                    let courseCards = "";
                    response.courses.forEach(course => {
                        courseCards += `
                            <div class="course-item">
                                <h3>${course.course_name}</h3>
                                <h3>${course.course_code}</h3>
                                <p><strong>Instructor:</strong> ${course.instructor_username}</p>
                                <p>${course.course_description}</p>
                            </div>
                        `;
                    });
                    courseListDiv.innerHTML = courseCards;
                } else {
                    courseListDiv.innerHTML = "<p>You are not enrolled in any courses.</p>";
                }
            } catch (error) {
                console.error("Error parsing JSON:", error);  // Log error if parsing fails
                
            }
        }
    };
}
