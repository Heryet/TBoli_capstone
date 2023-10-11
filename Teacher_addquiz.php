<!DOCTYPE html>
<html lang="en">



<body>
    <div class="container">
        <div class="row justify-content-md-center mt-4">
            <div class="card col-sm-10">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-9">
                            <label for="project-overview" class="form-label">Please select subject</label>
                            <select class="form-control select2" data-toggle="select2" name="category">
                                <option>Select Category</option>
                                <option value="AZ">Literacy</option>
                                <option value="CO">Numeracy</option>
                            </select>
                        </div>
                    </div>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Quiz Title</label>
                            <input type="text" id="simpleinput" name="title" class="form-control">
                        </div>

                        <div class="question-list">
                            <div class="question-container mb-2">
                                <label>Question #1</label>
                                <textarea class="form-control mb-3" name="question" id="" cols="130" rows="5"
                                    placeholder="Enter your Questions here"></textarea>
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="form-check form-check-inline mt-1">
                                                            <input type="radio" id="customRadio1a" name="choices1"
                                                                class="form-check-input">
                                                            <label class="form-check-label"
                                                                for="customRadio1a">a</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <div>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="form-check form-check-inline mt-1">
                                                            <input type="radio" id="customRadio1b" name="choices1"
                                                                class="form-check-input">
                                                            <label class="form-check-label"
                                                                for="customRadio1b">b</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <div>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="form-check form-check-inline mt-1">
                                                            <input type="radio" id="customRadio1c" name="choices1"
                                                                class="form-check-input">
                                                            <label class="form-check-label"
                                                                for="customRadio1c">c</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <div>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="form-check form-check-inline mt-1">
                                                            <input type="radio" id="customRadio1d" name="choices1"
                                                                class="form-check-input">
                                                            <label class="form-check-label"
                                                                for="customRadio1d">d</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <div>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <input type="button" class="btn btn-primary add-question-btn" value="Add Question">
                            </div>
                            <div class="col-sm-6 text-sm-end mt-3">
                                <input type="button" class="btn btn-primary" value="Create Quiz">
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addQuestionBtn = document.querySelector('.add-question-btn');
            const questionList = document.querySelector('.question-list');
            let questionNumber = 2; // Starting question number

            addQuestionBtn.addEventListener('click', function () {
                const questionContainer = document.createElement('div');
                questionContainer.classList.add('question-container', 'mb-2');
                questionContainer.innerHTML = `
                    <label>Question #${questionNumber}</label>
                    <textarea class="form-control mb-3" name="" id="" cols="130" rows="5"
                        placeholder="Enter your Questions here"></textarea>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="form-check form-check-inline mt-1">
                                                <input type="radio" id="customRadio${questionNumber}a" name="choices${questionNumber}"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="customRadio${questionNumber}a">a</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-11">
                                            <div>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="form-check form-check-inline mt-1">
                                                <input type="radio" id="customRadio${questionNumber}b" name="choices${questionNumber}"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="customRadio${questionNumber}b">b</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-11">
                                            <div>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="form-check form-check-inline mt-1">
                                                <input type="radio" id="customRadio${questionNumber}c" name="choices${questionNumber}"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="customRadio${questionNumber}c">c</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-11">
                                            <div>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="form-check form-check-inline mt-1">
                                                <input type="radio" id="customRadio${questionNumber}d" name="choices${questionNumber}"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="customRadio${questionNumber}d">d</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-11">
                                            <div>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
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
</body>

</html>