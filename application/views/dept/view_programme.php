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
                            <div class="form-group col-md-4">
                                <label for="course_type">Type:</label>
                                <p class="mb-0"><?php echo $courseTypes[$Programme->course_type]; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="yearOfApproval">Year of Approval:</label>
                                <p class="mb-0"><?php echo $Programme->year_of_approval; ?></p>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="intake">Intake:</label>
                                <p class="mb-0"><?php echo $Programme->intake; ?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="course_name">Course Name:</label>
                                <p class="mb-0"><?php echo $Programme->course_name; ?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="accreditations">Accreditation:</label>
                                <p class="mb-0"><?php echo nl2br($Programme->accreditations); ?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="collaborations">Collaborations:</label>
                                <p class="mb-0"><?php echo nl2br($Programme->collaborations); ?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="memberships">Memberships:</label>
                                <p class="mb-0"><?php echo nl2br($Programme->memberships); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Program Educational Objectives (PEOs)</h6>
                <div class="dropdown no-arrow">
                    <?php echo anchor('dept/managePEOs/'.$Programme->id,'<i class="fas fa-edit fa-sm fa-fw text-danger"></i> Manage', 'class="text-danger"'); ?>
                </div>
            </div>
            <div class="card-body">
                <?php
                    if($PEOs){
                        $table_setup = array ('table_open'=> '<table class="table table-hover" width="100%" cellspacing="0">');
                        $this->table->set_template($table_setup);
                        $this->table->set_heading(array('data' => 'ID', 'width' => "10%"),
                                                array('data' => 'Details', 'width' => "90%")
                                                );
                        $i=1;
                        foreach ($PEOs as $PEOs1) {
                            $this->table->add_row("PEO".$i++." : ",
                                    array('data' => $PEOs1->objective_name, 'class' => 'text-justify')
                                );
                        }
                        $data['PEOsTable']=$this->table->generate();
                    }else{
                        $data['PEOsTable']='<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> PEOs not yet created..! </h4>';
                    }

                    print_r($data['PEOsTable']);
                ?>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Program Specific Outcomes (PSOs)</h6>
                <div class="dropdown no-arrow">
                    <?php echo anchor('dept/managePSOs/'.$Programme->id,'<i class="fas fa-edit fa-sm fa-fw text-danger"></i> Manage', 'class="text-danger"'); ?>
                </div>
            </div>
            <div class="card-body">
                <?php
                    if($PSOs){
                        $table_setup = array ('table_open'=> '<table class="table table-hover" width="100%" cellspacing="0">');
                        $this->table->set_template($table_setup);
                        $this->table->set_heading(array('data' => 'ID', 'width' => "10%"),
                                                array('data' => 'Details', 'width' => "90%")
                                                );
                        $i=1;
                        foreach ($PSOs as $PSOs1) {
                            $this->table->add_row("PSO".$i++." : ",
                                    array('data' => $PSOs1->outcome_name, 'class' => 'text-justify')
                                );
                        }
                        $data['PSOsTable']=$this->table->generate();
                    }else{
                        $data['PSOsTable']='<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> PSOs not yet created..! </h4>';
                    }

                    print_r($data['PSOsTable']);
                ?>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Program Outcomes (POs)</h6>
                <div class="dropdown no-arrow">
                    <?php echo anchor('dept/managePOs/'.$Programme->id,'<i class="fas fa-edit fa-sm fa-fw text-danger"></i> Manage', 'class="text-danger"'); ?>
                </div>
            </div>
            <div class="card-body">
                <?php
                    if($POs){
                        $table_setup = array ('table_open'=> '<table class="table table-hover" width="100%" cellspacing="0">');
                        $this->table->set_template($table_setup);
                        $this->table->set_heading(array('data' => 'ID', 'width' => "10%"),
                                                array('data' => 'Details', 'width' => "90%")
                                                );
                        $i=1;
                        foreach ($POs as $POs1) {
                            $this->table->add_row("PO".$i++." : ",
                                    array('data' => $POs1->outcome_name, 'class' => 'text-justify')
                                );
                        }
                        $data['POsTable']=$this->table->generate();
                    }else{
                        $data['POsTable']='<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> POs not yet created..! </h4>';
                    }

                    print_r($data['POsTable']);
                ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
                <?php echo anchor('dept/editProgramme/'.$Programme->id,'<i class="fas fa-edit fa-sm fa-fw"></i> Edit', 'class="btn btn-primary btn-sm" '); ?>
                <?php echo anchor('dept/deleteProgramme/'.$Programme->id,'<i class="fas fa-trash fa-sm fa-fw"></i> Delete', 'class="btn btn-danger btn-sm" '); ?>
            </div>
            <div class="col-sm-6 text-right">
                <?php echo anchor('dept/programmes','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back to List', 'class="btn btn-dark btn-sm" '); ?>
            </div>
        </div>
    </div>
</main>