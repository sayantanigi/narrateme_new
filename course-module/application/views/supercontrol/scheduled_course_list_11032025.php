<?php //$this->load->view ('header'); ?>
<!-- BEGIN CONTAINER -->
<style>
#sample_1_filter {padding: 8px; float: right;}
#sample_1_length {padding: 8px;}
#sample_1_info {padding: 8px;}
#sample_1_paginate {float: right; padding: 8px;}
.copied-text {
    position: fixed;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #333;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}
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
                    <li> <a href="<?php echo base_url(); ?>supercontrol/home">Home</a> <i class="fa fa-circle"></i>
                    </li>
                    <li> <span>Admin Panel</span> <i class="fa fa-circle"></i> </li>
                    <li> <span>Show Details </span> </li>
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
                                        <div class="caption"> <i class="fa fa-gift"></i>Scheduled list</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"></a>
                                            <a href="javascript:;" class="reload"></a>
                                            <a href="javascript:;" class="remove"></a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Instructor</th>
                                                    <th>Course Title</th>
                                                    <th>Date</th>
                                                    <th>Start</th>
                                                    <th>End</th>
                                                    <th>Meeting ID</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($schedule_list)) {
                                                    $count = 1;
                                                    foreach ($schedule_list as $i) { ?>
                                                <tr class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                                                    <td><?php echo $count; ?></td>
                                                    <td>
                                                        <?php
                                                        $inst = @$i->instructor_id;
                                                        $user = $this->db->query("SELECT * FROM na_member WHERE id = '".$inst."'")->row();
                                                        echo @$user->prefixname." ".@$user->first_name . " " .@$user->last_name;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if(@$i->course_id != '0') {
                                                            $course = @$i->course_id;
                                                            $course_name = $this->db->query("SELECT * FROM sm_course WHERE course_id = '".$course."'")->row();
                                                            echo $course = @$course_name->course_name;
                                                        } else {
                                                            echo $course = "All course";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo date('Y-m-d', strtotime($i->class_date)); ?></td>
                                                    <td>
                                                        <?php
                                                        $start_time = @$i->start_time;
                                                        $formatted_time = date('g:i A', strtotime($start_time));
                                                        echo $formatted_time;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $end_time = @$i->end_time;
                                                        $formatted_time = date('g:i A', strtotime($end_time));
                                                        echo $formatted_time;
                                                        ?>
                                                    </td>
                                                    <td id="meeting-code-<?php echo @$count; ?>"><?php echo @$i->meeting_code; ?> <i class="fa-regular fa-copy" onclick="copyText('<?php echo @$count; ?>')"></i></td>
                                                    <td>
                                                        <?php if (@$i->status == '1') { ?>
                                                            <a href="<?= base_url('supercontrol/batch/instscheduleDStatus/' . @$i->inst_id) ?>"><span class="badge bg-green">Active</span></a>
                                                        <?php } else { ?>
                                                            <a href="<?= base_url('supercontrol/batch/instscheduleAStatus/' . @$i->inst_id) ?>"><span class="badge bg-red">Inactive</span></a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="https://adgoogly.com/" class="btn red btn-sm btn-outline sbold uppercase" target="_blank">Join Meeting</a>
                                                        <a href="mailto:?subject=<?= 'Meeting link for '. @$course; ?>&body=<?= 'Dear Student, Please click on the link below and use the meeting code to join for the course. Join URL: https://adgoogly.com/. Click on join meeting and use the Meeting Code '.@$i->meeting_code ?>" target="_blank" class="btn red btn-sm btn-outline sbold uppercase shareBtn1"> Share via Email</a>
                                                        <a onclick="deleteone(<?php echo @$i->inst_id; ?>);" class="btn red btn-sm btn-outline sbold uppercase" href="javascript:Void(0);">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php $count++; }
                                                } else { ?>
                                                    <tr>
                                                        <td colspan="9"> No Schdeule List</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
<script>
function copyText(count) {
    var copyText = document.getElementById('meeting-code-' + count).innerText;
    var textArea = document.createElement("textarea");
    textArea.value = copyText;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("Copy");
    document.body.removeChild(textArea);

    var copiedTextDiv = document.createElement('div');
    copiedTextDiv.className = 'copied-text';
    copiedTextDiv.innerText = "Copied the text: " + copyText;
    document.body.appendChild(copiedTextDiv);

    setTimeout(function() {
        copiedTextDiv.style.opacity = 1;
    }, 100);

    setTimeout(function() {
        copiedTextDiv.style.opacity = 0;
        document.body.removeChild(copiedTextDiv);
    }, 3000);
}
function deleteone(id) {
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
            window.location.href = '<?= base_url('supercontrol/batch/deleteinstschedule/') ?>' + id
        }
    });
}
function onclickShare(id) {
        $('#shareMenu_' + id).toggle();
    }
</script>
<?php //$this->load->view ('footer'); ?>