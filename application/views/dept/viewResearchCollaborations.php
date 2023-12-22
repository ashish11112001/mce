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
                                <label>Collaboration / MoU Title:</label>
                                <p class="mb-0"><?php echo $Details->title; ?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description:</label>
                                <p class="mb-0"><?php echo $Details->description; ?></p>
                            </div>
                            <div class="form-group col-md-12">
                                <label >Select Attachments: (Max: 30MB) </label>
                                 <?php if($Details->file_names) { ?>
                                <ul class="mt-3">
                                    <?php
                                        if($Details->file_names){
                                        $fileNames = unserialize($Details->file_names);
                                        foreach($fileNames as $key => $value){
                                            $del = anchor('dept/deleteResearchCollaborationsFile/'.$eid.'/'.$key,'<i class="fa fa-times ml-2 text-danger"></i>','class=""');
                                            echo '<li>'.anchor('assets/departments/'.$short_name.'/research/'.$value, $value, 'target="_blank"').'&nbsp;'.$del.'</li>';
                                        }
                                        }
                                    ?>
                                </ul>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Reference Weblink:</label>
                                <p class="mb-0"><?php echo $Details->link; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <?php echo anchor('dept/editResearchCollaborations/'.$Details->id,'<i class="fas fa-edit fa-sm fa-fw"></i> Edit', 'class="btn btn-primary btn-sm" '); ?>
                <?php echo anchor('dept/deleteResearchCollaborations/'.$Details->id,'<i class="fas fa-trash fa-sm fa-fw"></i> Delete', 'class="btn btn-danger btn-sm" '); ?>
            </div>
            <div class="col-sm-6 text-right">
                <?php echo anchor('dept/researchCollaborations','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Back to List', 'class="btn btn-dark btn-sm" '); ?>
            </div>
        </div>
    </div>
</main>