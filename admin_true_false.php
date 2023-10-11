<style>
    .card-header {
        background-color: #f5f5f5;
        padding: 10px;
        text-align: center;
    }

    .card-body {
        padding: 20px;
    }

    .form-label {
        font-weight: bold;
    }

    .form-check-label {
        margin-left: 10px;
    }

    .btn {
        margin-right: 10px;
    }

    textarea {
        width: 100%;
        height: 100px;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
</style>

<div class="row">
    <div class="col-sm-3 mb-2 mb-sm-0">
        <div class="nav flex-column nav-pills h5" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                <h1>Add True or False Questions</h1>
            </a>

        </div>
    </div> <!-- end col-->

    <div class="row">
        <div class="card-header">
            <h3>Create True or False Questions</h3>
        </div>
        <div class="card-body">
            <!-- form start -->
            <form action="#">
                <div class="mb-3 me-5 ms-4">
                    <label for="simpleinput" class="form-label">Questions</label>
                    <textarea id="question" name="question" placeholder="Please write question here." tabindex="5" required="required"></textarea>
                </div>

                <div class="row me-5 ms-2">
                    <!-- Radios-->
                    <h3>Select Answer</h3>
                    <div class="mt-3">
                        <div class="form-check form-radio-info mb-2">
                            <input type="radio" id="customRadio1" name="customRadio" class="form-check-input" value="true">
                            <label class="form-check-label" for="customRadio1">True</label>
                        </div>
                        <div class="form-check form-radio-info mb-2">
                            <input type="radio" id="customRadio2" name="customRadio" class="form-check-input" value="false">
                            <label class="form-check-label" for="customRadio2">False</label>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end form -->
        </div>
        <!-- end card-body-->

        <div class="card-footer">
            <input type="button" class="btn btn-info" value="Submit">
            <input type="reset" class="btn btn-info" value="Reset">
        </div>
    </div>
    <!--end card header -->
</div>
<!-- end row -->
