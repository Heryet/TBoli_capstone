<div class="row">
    <div class="card">
        <div class="card-header mb-3">
            <h4>Add Quiz</h4>
        </div>
        <form action="teacher_add_quiz_multiplec.php?user_id=<?php echo $row['user_id'] ?>" method="POST"
            id="multiple_choice">
            <div class="mb-3 me-5 ms-4">
                <label for="simpleinput" class="form-label">Title</label>
                <input type="text" id="simpleinput" class="form-control" name="title">
                <div class="col-lg-3 me-4">
                    <?php
                    include 'dbcon.php';

                    $sql = "SELECT tbl_lesson.lesson_id, tbl_lesson.name, tbl_lesson.type, tbl_lesson.level, tbl_lesson_files.status FROM tbl_lesson
                                JOIN tbl_lesson_files ON tbl_lesson.lesson_id = tbl_lesson_files.lesson_files_id
                                WHERE tbl_lesson_files.status = 1";

                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        // No need to fetch the first row here
                    } else {
                        echo "No records found in tbl_admin";
                    }
                    ?>
                    <div class="mb-3" style="width: 300px;">
                        <label for="inputState" class="form-label">Select Lesson</label>
                        <select id="inputState" class="form-select" name="lesson">
                            <option selected disabled></option>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $lesson_id = $row['lesson_id'];
                                    $name = $row['name'];
                                    $type = $row['type'];
                                    $level = $row['level'];
                                    echo "<option value='$lesson_id'>$type: $level - $name</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <h3 class="ms-4 mt-3 mb-3">Options</h3>
            <div class="row">
                <div class="col-lg-2 ms-4">
                    <div class="mb-3">
                        <label for="Max Score" class="form-label">Max Score</label>
                        <input type="text" id="Max Score" class="form-control" name="max">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="mb-3 position-relative" id="datepicker1">
                        <label class="form-label">Date Start</label>
                        <input type="datetime-local" class="form-control" name="date_start">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="mb-3 position-relative" id="datepicker1">
                        <label class="form-label">Due</label>
                        <input type="datetime-local" class="form-control" name="due">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 ms-4 mt-4">
                    <div class="mb-3 p-0">
                        <input type="checkbox" class="form-check-input" id="customCheck1" name="allow">
                        <label for="customCheck1" class="form-check-label">Allow Late?</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="mb-3">
                        <label for="Grading" class="form-label">Grading</label>
                        <select id="Grading" class="form-select" name="grading">
                            <option selected disabled>Select grading options</option>
                            <option>Latest Grade</option>
                            <option>Highest Grade</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 me-4">
                    <div class="mb-3">
                        <label for="inputState" class="form-label">Grading Score</label>
                        <select id="inputState" class="form-select" name="grading_score">
                            <option selected disabled>Select score options</option>
                            <option value="best score">Best Score</option>
                            <option value="latest score">Latest Score</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="mb-3" style="width: 170px">
                        <label for="attempts" class="form-label">Attempts</label>
                        <select id="attempts" class="form-select" name="attempts">
                            <option selected disabled>Select attempts</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row me-5 ms-4">
                <h3 class="mt-4 mb-4">Instructions</h3>
                <div class="instructions" id="snow-editor" style="height: 300px;" name="instructions"></div>
            </div>
            <div class="row justify-content-md-center mt-4">
                <div class="card col-sm-11">
                    <div class="card-body">
                        <div class="question-list">
                            <div class="question-container mb-4">
                                <label>Question #1</label>
                                <textarea class="form-control mb-3" name="question[]" cols="130" rows="5"
                                    placeholder="Enter your Questions here" required></textarea>
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="customRadio1a" name="choices[0][correct]"
                                                        class="form-check-input" value="a">
                                                    <label class="form-check-label" for="customRadio1a">a</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="form-control" name="choices[0][a]"
                                                        required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="customRadio1b" name="choices[0][correct]"
                                                        class="form-check-input" value="b">
                                                    <label class="form-check-label" for="customRadio1b">b</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="form-control" name="choices[0][b]"
                                                        required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="customRadio1c" name="choices[0][correct]"
                                                        class="form-check-input" value="c">
                                                    <label class="form-check-label" for="customRadio1c">c</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="form-control" name="choices[0][c]"
                                                        required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="customRadio1d" name="choices[0][correct]"
                                                        class="form-check-input" value="d">
                                                    <label class="form-check-label" for="customRadio1d">d</label>
                                                </div>
                                                <div>
                                                    <input type="text" class="form-control" name="choices[0][d]"
                                                        required>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <input type="submit" class="btn btn-primary" value="Create Quiz" name="createquiz">
                            </div>
                            <div class="col-sm-6 text-sm-end">
                                <input type="button" class="btn btn-primary add-question-btn" value="Add Question"
                                    name="addquestion">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
</div>

<script>
    $(document).ready(function () {
        const addQuestionBtn = document.querySelector('.add-question-btn');
        const questionList = document.querySelector('.question-list');
        let questionNumber = 2; // Starting question number

        addQuestionBtn.addEventListener('click', function () {
            const questionContainer = document.createElement('div');
            questionContainer.classList.add('question-container', 'mb-2');
            questionContainer.innerHTML = `
                    <label>Question #${questionNumber}</label>
                    <textarea class="form-control mb-3" name="question[]" cols="130" rows="5" placeholder="Enter your Questions here" required></textarea>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadio${questionNumber}a" name="choices[${questionNumber - 1}][correct]" class="form-check-input" value="a">
                                        <label class="form-check-label" for="customRadio${questionNumber}a">a</label>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" name="choices[${questionNumber - 1}][a]" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadio${questionNumber}b" name="choices[${questionNumber - 1}][correct]" class="form-check-input" value="b">
                                        <label class="form-check-label" for="customRadio${questionNumber}b">b</label>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" name="choices[${questionNumber - 1}][b]" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadio${questionNumber}c" name="choices[${questionNumber - 1}][correct]" class="form-check-input" value="c">
                                        <label class="form-check-label" for="customRadio${questionNumber}c">c</label>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" name="choices[${questionNumber - 1}][c]" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadio${questionNumber}d" name="choices[${questionNumber - 1}][correct]" class="form-check-input" value="d">
                                        <label class="form-check-label" for="customRadio${questionNumber}d">d</label>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" name="choices[${questionNumber - 1}][d]" required>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                `;

            questionList.appendChild(questionContainer);
            questionNumber++;
        });
    });
</script>


<script>
    $(document).ready(function () {
        $("#multiple_choice").on("submit", function () {
            var hvalue = $('.instructions').text();
            $(this).append("<input type='hidden' name='instructions' value=' " + hvalue + " '/>");
        });
    });
</script>