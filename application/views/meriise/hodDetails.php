<main id="main-container">
    <div class="content">
        <?php if($this->session->flashdata('message')){?>
        <div class="alert <?=$this->session->flashdata('status');?>" id="msg">
            <p class="mb-0"><?php echo $this->session->flashdata('message')?></p>
        </div>
        <?php } ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?=$pageTitle;?></h6>
                <div class="dropdown no-arrow">
                    <?php 
                        echo anchor('dept/editHodDetails','<i class="fas fa-edit fa-sm fa-fw text-danger"></i> Update Details', 'class="text-danger" ');
                        echo "&nbsp; | &nbsp;";
        	            echo anchor('dept/hod_pic/','<i class="fas fa-edit fa-sm fa-fw text-danger"></i> Update Pic', 'class="text-danger" '); 
                        echo "&nbsp; | &nbsp;";
        	            echo anchor('dept/editCV/','<i class="fas fa-edit fa-sm fa-fw text-danger"></i> Update CV', 'class="text-danger" '); 
                    ?>
                </div>
            </div>
            <div class="card-body px-5">
                <div class="form-group row mb-0">
                    <div class="col-sm-3">
                    <?php
                        $img = 'assets/departments/'.$short_name.'/faculty/HOD.jpg';
                        if (file_exists($img)) {
                            $img = base_url().$img;
                        } else {
                            $img = base_url().'assets/departments/avatar.jpg';
                        }
                        echo '<img src="'.$img.'" class="img-thumbnail pic200">';
                    ?>
                    </div>
                    <div class="col-sm-9">
                        <?php echo $departmentsDetails->hod_message;?>
                        <h6 class="mb-1"><?php echo $departmentsDetails->hod_name;?></h6>
                        <p class="mb-1"><?php echo $departmentsDetails->hod_designation;?></p>
                        <p class="mb-1"><?php echo $departmentsDetails->hod_email;?></p>
                        <p>Department of <?=$department_name;?></p>
                        <?php
                            $cv = null;
                            $cv_path = 'assets/departments/'.$short_name.'/CV/HOD_CV.pdf';
                            if (file_exists($cv_path)) {
                                $cv = base_url().$cv_path;
                                echo anchor($cv,'<i class="fas fa-download fa-sm fa-fw"></i> Download Curriculum Vitae', 'class="btn btn-dark btn-sm" target="_blank"');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>