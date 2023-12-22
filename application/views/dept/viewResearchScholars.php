<main id="main-container">
    <div class="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?=$pageTitle;?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Guide Name</label>
                                <p class="mb-0"><?php echo (set_value('guide_name'))?set_value('guide_name'):$Details->guide_name;?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Student Name</label>
                                <p class="mb-0"><?php echo (set_value('student_name'))?set_value('student_name'):$Details->student_name;?> </p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Field of Study</label>
                                <p class="mb-0"><?php echo (set_value('field_of_study'))?set_value('field_of_study'):$Details->field_of_study;?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Admission Year</label>
                                <?php
                                    $years = array(" " => "Select");
                                    for($i = 1970; $i<=date("Y"); $i++){
                                        $years[$i] = $i;
                                    }
                                    echo "<p class='mb-0'>".$Details->year."</p>"; 
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Scholar Type</label>
                                <?php
                                    $scholar_type_options = array(" " => "Select", "1" => "Part Time", "2" => "Full Time");
                                    echo "<p class='mb-0'>".$scholar_type_options[$Details->scholar_type]."</p>"; 
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Research Type</label>
                                <?php
                                    $research_type_options = array(" " => "Select", "1" => "Ph.D", "2" => "M.Sc (Engg by Research)");
                                    echo "<p class='mb-0'>".$research_type_options[$Details->research_type]."</p>"; 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <?php echo anchor('dept/editResearchScholars/'.$Details->id,'<i class="fas fa-edit fa-sm fa-fw"></i> Edit', 'class="btn btn-primary btn-sm" '); ?>
                <?php echo anchor('dept/deleteResearchScholars/'.$Details->id,'<i class="fas fa-trash fa-sm fa-fw"></i> Delete', 'class="btn btn-danger btn-sm" '); ?>
            </div>
            <div class="col-sm-6 text-right">
                <?php echo anchor('dept/researchScholars','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back to List', 'class="btn btn-dark btn-sm" '); ?>
            </div>
        </div>
    </div>
</main>