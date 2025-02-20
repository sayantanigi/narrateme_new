<style>
.error {
    color: #F00;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.datetimepicker.css" />
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
                    <li><a href="<?php echo base_url(); ?>supercontrol/home">Home</a> <i class="fa fa-circle"></i></li>
                    <li> <span>supercontrol panel</span> </li>
                </ul>
            </div>
            <?php if ($this->session->flashdata('success') != '') { ?>
            <div class="alert alert-success alert-dismissable" style="padding:10px;">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
                <strong>
                    <div class="alert alert-success text-center" style="margin: 0; padding: 0;">
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
                                        <div class="caption"><i class="fa fa-gift"></i>Add page</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"></a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                            <a href="javascript:;" class="reload"></a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <form action="<?php echo base_url().'supercontrol/course/add_course_syllabus' ?>" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Syllabus Title</label>
                                                    <div class="col-md-8">
                                                        <?php echo form_input(array('id' => '', 'name' => 'syllabus_name', 'class' => 'form-control')); ?>
                                                        <?php echo form_error('syllabus_name'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Syllabus Content</label>
                                                    <div class="col-md-8">
                                                        <?php echo form_textarea(array('id' => 'pagedes', 'name' => 'syllabus_content', 'class' => 'form-control')); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="hidden" name="course_id" value="<?php echo end($this->uri->segment_array()); ?>" />
                                                        <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit', 'class' => 'btn red')); ?>
                                                        <button type="button" class="btn default">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.datetimepicker.full.js"></script>
<script>
    $.datetimepicker.setLocale('en');
    $('#timepicker1').datetimepicker({
        datepicker: false,
        format: 'H:i',
        step: 5
    });

    $('#timepicker2').datetimepicker({
        datepicker: false,
        format: 'H:i',
        step: 5
    });

    $('#datetimepicker2').datetimepicker({
        format: 'd-m-Y',
        timepicker: false,
        formatDate: 'd-m-Y',
        minDate: '-2016/11/03',
    });
    $('#datetimepicker_dark').datetimepicker({ theme: 'dark' })
</script>