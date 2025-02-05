document.addEventListener("DOMContentLoaded", function () {
    const enrollBtn = document.getElementById("enroll-btn");

    if (enrollBtn) {
        enrollBtn.addEventListener("click", function () {
            const courseId = enrollBtn.getAttribute("data-course-id");

            if (!courseId) {
                document.getElementById("enroll-message").innerText = "Invalid course.";
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../control/enrollCourseControl.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("course_id=" + courseId);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        const response = JSON.parse(xhr.responseText);
                        document.getElementById("enroll-message").innerText = response.message;
                    } else {
                        document.getElementById("enroll-message").innerText = "An error occurred.";
                    }
                }
            };
        });
    }
});
