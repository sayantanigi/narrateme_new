<style type="text/css">
    .panel-heading {
        background-color: #075b82 !Important;
        color: #FFF !Important;
        font-weight: bold !Important;
    }
</style>
<!-- Content design start here-->
<div class="clearfix"></div>
<div class="container">
    <div class="about-panel">
        <div class="row">
            <div class="col-sm-12" style="text-align: center; display: inline-block; position: relative; padding: 200px;">
                <div class="padding-50">
                    <div class="panel-group" id="accordion">
                        <?php //$ctn=1; foreach($faq as $fa){ ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php //echo $ctn; ?>"><?php //echo $fa->question ?></a>
                                </h4>
                            </div>
                            <!-- <div id="collapse<?php //echo $ctn; ?>" class="panel-collapse collapse <?php //if($ctn==1){ ?>in<?php //} ?>">
                                <div class="panel-body" align="center">
                                    <img src="<?php echo base_url() ?>img/loder.gif" />
                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypalpayment" name="paypalpayment">
                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" name="business" value="accounts@freelanceswitch.com">
                                        <input type="hidden" name="item_name" value="<?php echo $this->input->post('course_name') ?>">
                                        <input type="hidden" name="item_number" value="1">
                                        <input type="hidden" name="amount" value="<?php echo $this->input->post('price') ?>">
                                        <input type="hidden" name="no_shipping" value="0">
                                        <input type="hidden" name="no_note" value="1">
                                        <input type="hidden" name="currency_code" value="USD">
                                        <input type="hidden" name="lc" value="AU">
                                        <input type="hidden" name="bn" value="PP-BuyNowBF">
                                        <input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
                                        <img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                                    </form>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script>
                                        $(document).ready(function () {
                                            //alert("kkkkkkkkkkkkkk");
                                            $("#paypalpayment").submit();
                                        });
                                    </script>
                                </div>
                            </div> -->

                            <header class="site-header" id="header">
                                <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
                                <h3> You're officially enrolled to <b><?= $course_name?></b> course</h3>
                            </header>
                            <div class="main-content">
                                <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
                                <p class="main-content__body" data-lead-id="main-content-body">We are thrilled to have you as part of our learning community. Your purchase has been successfully completed, and you're all set to start your journey with us! You can now access your course by clicking the button below. Dive into your first lesson and start learning right away!</p>
                                <a href="<?= base_url(); ?>courses/upcomingcoursedetails/<?php echo $course_id; ?>" style=" width: auto; display: inline-block; padding: 10px; background: #d18c13; color: #fff; ">Access Your Course</a>
                            </div>
                        </div>
                        <?php //$ctn++;} ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Content design End here-->