<?php $this->view('includes/header', $data); ?>

<?php $this->view('students/sidebar', $data); ?>
<div class="main-panel">
    <div class="panel-header bg-primary-gradient ">
        <div class="page-inner">
        </div>
    </div>
    <div class="content ml-5 mr-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><b> Avalable Course</b></h4>
                        <?= $data['user_data'][0]->Batch ?>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link text-dark active" data-toggle="tab" href="#current">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-warning" data-toggle="tab" href="#add_drop">Add/Drop Courses</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id='current'>
                                <div class="table-responsive mt-5">
                                    <table id="basic-datatables" class="display table table-striped table-hover " >  
                                        <thead>
                                            <tr>
                                                <th scope="col"  style="width: 15px;"> 
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            <span class="form-check-sign"></span>
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>Course Title</th>
                                                <th>Course Code</th>
                                                <th>Credit Hours</th>
                                            </tr>
                                        </thead>
                                    
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane active" id='add_drop'>
                                <div class="table-responsive mt-5">
                                    <table id="basic-datatables2" class="display table table-striped table-hover " >  
                                        <thead>
                                            <tr>
                                                <th scope="col"  style="width: 15px;"> 
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            <span class="form-check-sign"></span>
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>Course Title</th>
                                                <th>Course Code</th>
                                                <th>Credit Hours</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->view('includes/footer'); ?>

<script>

    $(document).ready(function() {

        $.ajax({
            url: "<?=ROOT?>student/available_crs",
            type: "POST",
            dataType: 'json',
            processData: false,
			contentType: false,
            success: function (response) {
                $('#basic-datatables').DataTable( {
                    "ajax": "<?=ROOT?>student/available_crs",
                    "columnDefs": [{
                        "defaultContent": "-",
                        "targets": "_all"
                    }]
                });
            }
        });
        $.ajax({
            url: "<?=ROOT?>student/all_crs",
            type: "POST",
            dataType: 'json',
            processData: false,
			contentType: false,
            success: function (response) {
                $('#basic-datatables2').DataTable( {
                    "ajax": "<?=ROOT?>student/all_crs",
                    "columnDefs": [{
                        "defaultContent": "-",
                        "targets": "_all"
                    }]
                });
            }
        });
    });
</script>
</body>

</html>