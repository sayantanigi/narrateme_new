<style>
#sample_1_filter { padding: 8px; float: right; }
#sample_1_length { padding: 8px; }
#sample_1_info { padding: 8px; }
#sample_1_paginate { float: right; padding: 8px; }
.modal-open .modal { display: flex !important; align-items: center !important; }
.modal-dialog { flex-grow: 1; }
.dataTables_info {padding: 7px;}
</style>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <?php $this->load->view('supercontrol/leftbar'); ?>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo base_url(); ?>supercontrol/home">Home</a><i class="fa fa-circle"></i></li>
                    <li><span>Supercontrol Panel</span> <i class="fa fa-circle"></i></li>
                    <li><span>Show Course Session List</span></li>
                </ul>
            </div>
            <?php if ($this->session->flashdata('success') != '') { ?>
            <div class="alert alert-success alert-dismissable" style="padding: 0; margin: 0;">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
                <strong>
                    <div class="alert alert-success text-center" style="padding: 0; margin: 0;">
                        <?php
                            echo $this->session->flashdata('success');
                            // Unset the flashdata after displaying it
                            $this->session->unset_userdata('success');
                        ?>
                    </div>
                </strong>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line boxless tabbable-reversed">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title">
                                        <div class="caption"><i class="fa fa-gift"></i>Show Course Session List</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"></a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"></a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <button class="btn btn-warning btn-sm pull-right" id="del_all" style="padding:5px; margin:8px;" onclick="return confirm('Are you sure about this delete?');">Delete selected</button>
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                                            <div id="mydiv">
                                                <thead>
                                                    <tr>
                                                        <th><input id="selectall" type="checkbox"></th>
                                                        <th>Total Session</th>
                                                        <th>Total Time</th>
                                                        <th>Session Time table </th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($batchlist)) {
                                                    foreach ($batchlist as $key => $batch) { ?>
                                                    <tr class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                                                        <td>
                                                            <input name="checkbox[]" class="checkbox1" type="checkbox" value="<?php echo $batch->id; ?>">
                                                        </td>
                                                        <td><?php echo $batch->total_session; ?></td>
                                                        <td><?php echo $batch->total_hour; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="getTimeTable('<?= $batch->batchId?>')"> Session Time table </button>
                                                        </td>
                                                        <td style="max-width:50px;">
                                                            <a class="btn green btn-sm btn-outline sbold uppercase" href="<?php echo base_url() ?>supercontrol/course/edit_coursesession_view/<?php echo $batch->batchId; ?>">Edit</a>
                                                            <a class="btn red btn-sm btn-outline sbold uppercase" onclick="DeleteSession(<?php echo $batch->batchId; ?>)">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php } } else { ?>
                                                    <tr class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                                                        <td colspan="5">No data found.</td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </div>
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
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Course Session Time Table</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                    <div id="mydiv">
                        <thead>
                            <tr>
                                <th>Session</th>
                                <th>Session Start date</th>
                                <th>Session Start Time</th>
                                <th>Session End Time</th>
                                <th>Session Time Type</th>
                                <th>Session Objective</th>
                                <th>Session Location</th>
                            </tr>
                        </thead>
                        <tbody id="respose"></tbody>
                    </div>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
$(document).ready(function () {
    $("#selectall").click(function () {
        var check = $(this).prop('checked');
        if (check == true) {
            $('.checker').find('span').addClass('checked');
            $('.checkbox1').prop('checked', true);
        } else {
            $('.checker').find('span').removeClass('checked');
            $('.checkbox1').prop('checked', false);
        }
    });

    $("#del_all").on('click', function (e) {
        e.preventDefault();
        var checkValues = $('.checkbox1:checked').map(function () {
            return $(this).val();
        }).get();
        console.log(checkValues);
        $.each(checkValues, function (i, val) {
            $("#" + val).remove();
        });
        $.ajax({
            url: '<?php echo base_url() ?>supercontrol/press/delete_multiple',
            type: 'post',
            data: 'ids=' + checkValues
        }).done(function (data) {
            $("#respose").html(data);
            var newurl = '<?php echo base_url() ?>supercontrol/press/show_press';
            window.location.href = newurl;
            $('#selectall').attr('checked', false);
        });
    });

    function resetcheckbox() {
        $('input:checkbox').each(function () { //loop through each checkbox
            this.checked = false; //deselect all checkboxes with class "checkbox1"
        });
    }
});
function f1(stat, id) {
    $.ajax({
        type: "get",
        url: "<?php echo base_url(); ?>supercontrol/press/statuspress",
        data: { stat: stat, id: id }
    });
}
function getTimeTable(id) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>supercontrol/course/get_time_table",
        data: { id: id }
    }).done(function (data) {
        $("#respose").html(data);
    });
}
function DeleteSession(id) {
    swal({
        title: 'Are You sure want to delete this record?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#36A1EA',
        cancelButtonColor: '#e50914',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        closeOnConfirm: true,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            window.location.href = '<?= base_url('supercontrol/course/delete_coursesession/') ?>' + id
        }
    });
}
</script>