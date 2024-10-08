let intervalId = 0;
let canSendNewAjaxRequest = true;
$(".ongoing-course-modal-class").on("show.bs.modal", function () {
    let modal = $(this);
    let exam_id = this.getAttribute("data-exam-id");
    let users = [];
    modal.find(".users-exams-input-class").each(function (index, input) {
        users.push({
            student_id: input.getAttribute("data-student-id"),
            user_exam_id: input.value,
        });
    });

    let data = {
        _token: document.body.getAttribute("data-token"),
        exam_id: exam_id,
        users: users,
    };

    intervalId = setInterval(function () {
        if (!canSendNewAjaxRequest) {
            return;
        }
        $.ajax({
            url: "/update-remain-time",
            data: data,
            type: "post",
            beforeSend() {
                canSendNewAjaxRequest = false;
            },
            success: function (res) {
                if (res.status) {
                    for (var studentId in res.users) {
                        var studentData = res.users[studentId];
                        if (studentData.exam_submitted) {
                            modal
                                .find(
                                    'tr[data-student-id="' +
                                        studentId +
                                        '"] .score-report-td'
                                )
                                .html(studentData.score_report_dom);
                            modal
                                .find(
                                    'tr[data-student-id="' +
                                        studentId +
                                        '"] .main-certification-td'
                                )
                                .html(studentData.certifications_dom);
                        } else {
                            modal
                                .find(".answered-class" + studentId)
                                .html(studentData.answered);
                            modal
                                .find(".remaining-class" + studentId)
                                .html(studentData.remainingTime);
                        }
                    }
                }
                canSendNewAjaxRequest = true;
            },
        });
    }, 1000);
});

$(".ongoing-course-modal-class").on("hide.bs.modal", function () {
    clearInterval(intervalId);
});
