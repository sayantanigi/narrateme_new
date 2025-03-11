<style>
.list-box figure img{height:215px!important}.price-view{text-align:justify!important}.courses-view-other,.formcourse .wrapper-form,.search-courses,.upcoming-courses{padding:0!important}.couldnt-find-course{padding:90px 0!important}.emply-resume-list{width:100%;text-align:center;padding:0 0 60px}.list-box,.list-box-courses{float:left;width:100%;background:#fff;margin-top:0;box-shadow:0 0 10px #f90;-moz-border-radius:8px;-ms-border-radius:8px;-o-border-radius:8px;border-radius:8px;overflow:hidden;padding:0 0 25px}.other-courses{background-size:100% 475px!important;padding:0!important}.list-box-courses figure{margin:0 0 10px;padding:0;border:4px solid #ededf0}.both-bt a.button-default{min-width:46%;font-size:18px;padding:10px 6px 13px}.price-view span{padding:5px 15px;text-align:center;min-width:180px;color:#fff;font-size:16px;background:#2e3192;border-radius:34px;line-height:normal;display:inline-block}.courses-view-other ul li{padding:25px 24px!important}.users_email_err,.users_name_err,.users_phno_err{display:none}
.btn.btn-outline.red {
    border-color: #e7505a;
    color: #e7505a;
    background: #d18c13;
    width: auto;
    font-size: 12px;
    padding: 10px;
    color: #fff;
}
.timetable .table thead th {
    font-size: 15px;
    color: #272d32;
    font-family: 'Lato', sans-serif;
    font-weight: 400;
    vertical-align: middle;
    padding: 8px 30px;
    position: relative;
    background-color: #f8f8f8;
    border: 1px solid #b5b5b5;
    text-align: center;
}
.timetable .table tbody tr td {
    font-size: 15px;
    color: #272d32;
    font-family: 'Lato', sans-serif;
    font-weight: 400;
    padding: 8px 30px;
    border-top: 0;
    vertical-align: middle;
    border: 1px solid #b5b5b5;
    text-align: center;
}
.copied-text{
    position: fixed;
    bottom: 10px;
    left: 50%;
    transform: translatex(-50%);
    background-color: #333;
    color: #fff;
    padding: 10px;
    transition: opacity 0.5s ease-in-out;
}
.hd-bt h3 {width: 100% !important;}
</style>
<div class="inner-banner">
    <div class="blue-banenr">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner-hd-banenr">
                        <?= $course->course_name; ?>
                    </div>
                    <div class="badecame">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><?= $course->course_name; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="microsoftword-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="microWords-col">
                    <div class="tabing-col">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#courseOverview" role="tab" data-toggle="tab" aria-selected="true">Course Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#syllabus" role="tab" data-toggle="tab" aria-selected="false">Syllabus</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#reviews" role="tab" data-toggle="tab" aria-selected="false">Participant Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active show" id="courseOverview">
                            <div class="overview-details">
                                <div class="price-detail-div">
                                    <p><strong>Course Price:</strong> £<?= $course->price; ?></p>
                                    <!-- <p><strong>Location: </strong> <?= $batchSession->session_location; ?>, Location City</p> -->
                                    <p><strong>Course Level:</strong>
                                        <?php
                                        $this->load->model('generalmodel');
                                        $table_name = 'sm_levels';
                                        $primary_key = 'id';
                                        $wheredata = $course->course_level;
                                        $queryalllevels = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '');
                                        echo $queryalllevels[0]->level_title;
                                        ?>
                                    </p>
                                    <p><strong>Course Instructor:</strong>
                                        <?php
                                        if($course->userid != '0'){
                                            $getInsData = $this->db->query("SELECT * FROM na_member WHERE id = '".$course->userid."'")->row();
                                            if(!empty($getInsData)) {
                                                echo $getInsData->first_name." ".$getInsData->last_name;
                                            }
                                        } else {
                                            echo "Admin";
                                        }
                                        ?>
                                    </p>
                                    <p><strong>Delivery Method: </strong> <?php
                                    $this->load->model('generalmodel');
                                    $table_name = 'sm_mode';
                                    $primary_key = 'id';
                                    $wheredata = $course->course_mode;
                                    $queryallmode = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '');
                                    echo $queryallmode[0]->mode_title;
                                    ?>
                                    </p>
                                    <p><strong>Certification:</strong> <?php echo $course->certificate; ?></p>
                                    <?php
                                    $getBatchData = $this->db->query("SELECT SUM(total_hour) as total_hour, SUM(total_session) as total_session  FROM sm_batch WHERE courseId = '".$course->course_id."' AND status = '1'")->row();
                                    //echo "SELECT * FROM sm_course_booking WHERE course_id = '".$course->course_id."' AND student_id = '".$this->session->userdata('loginuserID')."'";
                                    $getisPurchased = $this->db->query("SELECT * FROM sm_course_booking WHERE course_id = '".$course->course_id."' AND student_id = '".$this->session->userdata('loginuserID')."'")->row();
                                    ?>
                                    <p><strong>Total Duration:</strong> <?= $getBatchData->total_hour; ?> hours</p>
                                    <p><strong>Total Sessions:</strong> <?= $getBatchData->total_session; ?> </p>
                                </div>
                                <div class="coursesContent">
                                    <h4>Course Overview:</h4>
                                    <p><?= $course->course_description; ?> </p>
                                    <h4>Skills Required:</h4>
                                    <p><?= $course->entry_requirment; ?></p>
                                    <h4>Who should Apply:</h4>
                                    <p><?= $course->who_should_apply; ?>.</p>
                                    <h5>Timetable</h5>
                                    <div class="timetable">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Session</th>
                                                    <th>Date</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Time Type</th>
                                                    <th>Session Objective</th>
                                                    <th>Location</th>
                                                    <?php if(!empty($getisPurchased)) {?>
                                                    <!-- <th>Meeting Code</th> -->
                                                    <th>Action</th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $batchData =$this->db->query("SELECT GROUP_CONCAT(batchId) AS batchId FROM sm_batch WHERE courseId = '".$course->course_id."'")->row();
                                                if(!empty($batchData->batchId)) {
                                                $ctb = 1;
                                                $batchSession = $this->db->query("SELECT * FROM sm_course_sessions WHERE batch_id IN (".$batchData->batchId.")")->result();
                                                if(!empty($batchSession)){
                                                foreach ($batchSession as $bs) { ?>
                                                <tr>
                                                    <td><?php echo $ctb; ?></td>
                                                    <td><?php echo $bs->date ?></td>
                                                    <td><?php echo date("h:i A", strtotime($bs->starttime)) ?></td>
                                                    <td><?php echo date("h:i A", strtotime($bs->endtime)) ?></td>
                                                    <td><?php echo $bs->time_type ?></td>
                                                    <td><?php echo $bs->session_objective ?></td>
                                                    <td>
                                                        <?php
                                                        $getCountry = $this->db->query("SELECT * FROM countries WHERE id = '".$bs->session_location."'")->row();
                                                        echo $getCountry->name;
                                                        ?>
                                                    </td>
                                                    <?php if(!empty($getisPurchased)) { ?>
                                                    <!-- <td onclick="copyText(<?= $bs->id?>)" id="meeting-code-<?= $bs->id?>">
                                                        <?php
                                                        $getmeetingData = $this->db->query("SELECT * FROM sm_course_instructor WHERE course_id = '".$course->course_id."' AND class_date like '%".$bs->date."%' AND start_time = '".$bs->starttime."' AND end_time = '".$bs->endtime."'")->row();
                                                        echo $getmeetingData->meeting_code;
                                                        ?>
                                                    </td> -->
                                                    <td>
                                                        <?php
                                                        $getmeetingData = $this->db->query("SELECT * FROM sm_course_instructor WHERE course_id = '".$course->course_id."' AND class_date like '%".$bs->date."%' AND start_time = '".$bs->starttime."' AND end_time = '".$bs->endtime."'")->row();
                                                        if(!empty($getmeetingData->meeting_code)) {
                                                        $studentId = $getisPurchased->student_id;
                                                        $student_details = $this->db->query("SELECT * FROM na_member WHERE id = '".$studentId."'")->row();
                                                        $current_date = date('Y-m-d');
                                                        if(strtotime($current_date) < strtotime($bs->date)) { ?>
                                                        <a href="https://adgoogly.com/join/<?= @$getmeetingData->meeting_code; ?>?userName=<?= @$student_details->username; ?>&userEmail=<?= @$student_details->email; ?>" class="btn red btn-sm btn-outline sbold uppercase" target="_blank">Join Class</a>
                                                        <?php } else { ?>
                                                        <a href="javascript:void(0)" class="btn red btn-sm btn-outline sbold uppercase">Class Link Expired</a>
                                                        <?php } } else { ?>
                                                        <a href="javascript:void(0)" class="btn red btn-sm btn-outline sbold uppercase">Class Link not created yet</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php $ctb++; } } } }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tableButton">
                                        <!-- <a href="#" class="button-default">Add to my Basket</a> -->
                                        <?php if(empty($getisPurchased)) {?>
                                        <a href="<?php echo base_url('courses/payment/'.$course->course_id); ?>" class="button-default">Book Now</a>
                                        <?php } ?>
                                    </div>
                                    <div class="events-sectionsInn">
                                        <h2>Customers who booked this course also booked following courses:</h2>
                                        <div class="courses-view">
                                            <ul>
                                                <?php
                                                $mylink = $_SERVER['REQUEST_URI'];
                                                $link_array = explode('/', $mylink);
                                                $lastpart = end($link_array);
                                                //print_r($lastpart);
                                                $query = $this->db->query("SELECT * FROM sm_course WHERE course_type = 'Upcoming Courses' AND course_id != '" . $lastpart . "'")->result_array();
                                                if (!empty($query)) {
                                                    $ctn = 1;
                                                    foreach ($query as $i) { ?>
                                                        <li>
                                                            <div class="list-box">
                                                                <figure><img
                                                                        src="<?php echo base_url() ?>uploads/courseimage/<?php echo $i['course_image'] ?>"
                                                                        alt=""></figure>
                                                                <div class="all-content">
                                                                    <div class="hd-bt clearfix">
                                                                        <h3><?php echo $i['course_name']; ?></h3>
                                                                    </div>
                                                                    <div class="price-view">
                                                                        <span style="margin-left: 5px;">Price
                                                                            $<?php echo $i['price']; ?></span>
                                                                        <span class="name-bt" style="margin-right: 5px;">
                                                                            <?php
                                                                            $queryallcat = $this->db->query("SELECT * FROM sm_category WHERE category_id = '" . $i['course_category'] . "'")->row();
                                                                            echo $category_name = $queryallcat->category_name;
                                                                            ?>
                                                                        </span>
                                                                    </div>
                                                                    <div class="contentView">
                                                                        <p><?php echo date('jS M `y', strtotime($i['course_startDate'])); ?>
                                                                            to
                                                                            <?php echo date('jS M `y', strtotime($i['course_endDate'])); ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="both-bt">
                                                                        <a href="<?= base_url(); ?>course-module/courses/upcomingcoursedetails/<?php echo $i['course_id']; ?>" class="button-default orange">Course Details</a>
                                                                        <!-- <a href="<?= base_url(); ?>courses/payment" class="button-default orange">Book Now</a> -->
                                                                        <!-- <a href="#" class="button-default orange">Book Now</a> -->
                                                                        <?php
                                                                        $getPurchasedCourse = $this->db->query("SELECT * FROM sm_course_booking WHERE course_id = '".$i['course_id']."' AND student_id = '".$this->session->userdata('loginuserID')."'")->row();
                                                                        if(!empty($getPurchasedCourse)){ ?>
                                                                        <a href="<?= base_url(); ?>courses/upcomingcoursedetails/<?php echo $i['course_id']; ?>" class="button-default orange">Start Learning</a>
                                                                        <?php } else { ?>
                                                                        <a href="<?= base_url(); ?>courses/payment/<?= $i['course_id']; ?>" class="button-default orange">Book Now</a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php $ctn++;
                                                    }
                                                } else { ?>
                                                    <li> No data found</li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="syllabus">
                            <div class="faq-accordion" id="faqExample">
                                <?php $ctn = 1;
                                foreach ($querydesc as $fa) { ?>
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="collapsed" data-toggle="collapse"
                                                data-target="#collapseOne<?php echo $ctn; ?>" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                <?php echo $fa->syllabus_name ?>
                                            </h5>
                                        </div>
                                        <div id="collapseOne<?php echo $ctn; ?>"
                                            class="collapse<?php if ($ctn == 1) { ?>in<?php } ?>"
                                            aria-labelledby="headingOne" data-parent="#faqExample" style="">
                                            <div class="card-body">
                                                <?php echo $fa->syllabus_content ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $ctn++;
                                } ?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in " id="reviews">
                            <div class="participantReviews">
                                <div class="reviews-row odd">
                                    <div class="reviews-row-content">
                                        <div class="quote-icon"> <img
                                                src="<?= base_url(); ?>user_panel/new/images/quote-icon.png" alt="">
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or
                                            randomised words which don't look even slightly believable. If you are going
                                            to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                                            embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                                <img src="<?= base_url(); ?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row even">
                                    <div class="reviews-row-content">
                                        <div class="quote-icon"> <img
                                                src="<?= base_url(); ?>user_panel/new/images/quote-icon.png" alt="">
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by
                                            injected humour, or randomised words which don't look even slightly
                                            believable. <strong>If you are going to use a passage of Lorem Ipsum, you
                                                need to be sure there isn't anything embarrassing hidden in the middle
                                                of text.</strong> All the Lorem Ipsum generators on the Internet tend to
                                            repeat predefined chunks as necessary, making this the first true generator
                                            on the Internet. </p>
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its layout. The point of using
                                            Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                                            opposed to using <strong>'Content here, content here', default model text,
                                                and a search for 'lorem ipsum' will uncover many web sites still in
                                                their infancy.</strong> It is a long established fact that a reader will
                                            be distracted by the readable content of a page when looking at its layout.
                                        </p>
                                        <h4>William </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                                <img src="<?= base_url(); ?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row odd">
                                    <div class="reviews-row-content">
                                        <div class="quote-icon"> <img
                                                src="<?= base_url(); ?>user_panel/new/images/quote-icon.png" alt="">
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or
                                            randomised words which don't look even slightly believable. If you are going
                                            to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                                            embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                                <img src="<?= base_url(); ?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row even">
                                    <div class="reviews-row-content">
                                        <div class="quote-icon"> <img
                                                src="<?= base_url(); ?>user_panel/new/images/quote-icon.png" alt="">
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or
                                            randomised words which don't look even slightly believable. If you are going
                                            to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                                            embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                                <img src="<?= base_url(); ?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row odd">
                                    <div class="reviews-row-content">
                                        <div class="quote-icon"> <img
                                                src="<?= base_url(); ?>user_panel/new/images/quote-icon.png" alt="">
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or
                                            randomised words which don't look even slightly believable. If you are going
                                            to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                                            embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                                <img src="<?= base_url(); ?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row even">
                                    <div class="reviews-row-content">
                                        <div class="quote-icon"> <img
                                                src="<?= base_url(); ?>user_panel/new/images/quote-icon.png" alt="">
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or
                                            randomised words which don't look even slightly believable. If you are going
                                            to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                                            embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                                <img src="<?= base_url(); ?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row odd">
                                    <div class="reviews-row-content">
                                        <div class="quote-icon"> <img
                                                src="<?= base_url(); ?>user_panel/new/images/quote-icon.png" alt="">
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or
                                            randomised words which don't look even slightly believable. If you are going
                                            to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                                            embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                                <img src="<?= base_url(); ?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
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
</section>
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
</script>