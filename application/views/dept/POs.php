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
            </div>
            <div class="card-body">
                <?php
                    if($POs){
                        $table_setup = array ('table_open'=> '<table class="table table-hover" width="100%" cellspacing="0">');
                        $this->table->set_template($table_setup);
                        $this->table->set_heading(array('data' => 'ID', 'width' => "10%"),
                                                        array('data' => 'Details', 'width' => "70%"),
                                                        array('data' => 'Action', 'width' => "20%")
                                                    );
                            
                        $i=1;
                        foreach ($POs as $POs1) {
                                $this->table->add_row("PO".$i++." : ",
                                        array('data' => $POs1->outcome_name, 'class' => 'text-justify'),
                                        anchor('dept/editPOs/'.$POs1->id.'/'.$pid,'<i class="fas fa-edit"></i> Edit', 'class="btn btn-success btn-sm"').'&nbsp;'.
                                        anchor('dept/deletePOs/'.$POs1->id.'/'.$pid,'<i class="fas fa-times"></i> Delete', 'class="btn btn-danger btn-sm"')
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

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add / Edit Details</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <?php echo form_open($action, 'class="user"'); ?>
                        <div class="form-group col-md-12">
                            <label for="outcome_name">Outcome Details:</label>
                            <textarea name="outcome_name" id="outcome_name" class="form-control"
                                rows="5"><?php echo (set_value('outcome_name'))?set_value('outcome_name'):$outcome_name;?></textarea>
                            <?php echo form_error('outcome_name', '<div class="error">', '</div>'); ?>
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-danger btn-sm" name="Update" id="Update"><i
                                    class="fas fa-save"></i> Submit </button>
                            <?php echo anchor('dept/viewProgramme/'.$pid,'<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-dark btn-sm" ');?>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</main>