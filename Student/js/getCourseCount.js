document.addEventListener("DOMContentLoaded", function () {
    const xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../control/courseCountControl.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

    // Handle AJAX response
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                const response = JSON.parse(this.responseText);
                if (response.course_count !== undefined) {
                    document.getElementById("courseCount").textContent = response.course_count;
                } else {
                    alert(response.message);
                }
            } catch (error) {
                alert("Error processing response.");
            }
        }
    };
});
