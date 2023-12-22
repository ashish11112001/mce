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
                    <?php echo anchor('meriise/addLatestNews','<i class="fas fa-plus fa-sm fa-fw text-danger"></i> Add New', 'class="text-danger" ');?>
                </div>
            </div>
            <div class="card-body px-2">
                <?php 
                    if($latestNews != null){
                        $table_setup = array ('table_open'=> '<table class="table table-hover table-vcenter js-dataTable-full" id="dataTable" width="100%" cellspacing="0">');
                        $this->table->set_template($table_setup);
			            $this->table->set_heading(
							  array('data' => 'S.No', 'width' => "5%"),
							  array('data' => 'Latest News', 'width' => "55%"),
							  array('data' => 'Date', 'width' => "20%"),
							  array('data' => 'Actions', 'width' => "20%")
                              );
                        $i=1;
			            foreach ($latestNews as $latestNews1) {

                            if($latestNews1->new_label){
                                $newStatus = anchor('meriise/updateLatestNewsLabel/'.$latestNews1->id.'/0','<i class="fa fa-bell"></i>','class="text-danger"');
                            }else{
                                $newStatus = anchor('meriise/updateLatestNewsLabel/'.$latestNews1->id.'/1','<i class="fa fa-bell"></i>','class="text-gray"');
                            }

                            if($latestNews1->status){
                                $status = anchor('meriise/updateLatestNewsStatus/'.$latestNews1->id.'/0','<i class="fa fa-check-circle"></i>','class="text-success"');
                            }else{
                                $status = anchor('meriise/updateLatestNewsStatus/'.$latestNews1->id.'/1','<i class="fa fa-check-circle"></i>','class="text-gray"');
                            }

                            $actionItems = ' <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="New Label Status">'.$newStatus.'</button>
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Display Status">'.$status.'</button>
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="View">'.anchor('meriise/viewLatestNews/'.$latestNews1->id,'<i class="fa fa-fw fa-eye"></i>','class="text-dark"').'</button>
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Edit">'.anchor('meriise/editLatestNews/'.$latestNews1->id,'<i class="fa fa-fw fa-pencil-alt"></i>','class="text-dark"').'</button>
                                    <button type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Remove">'.anchor('meriise/deleteLatestNews/'.$latestNews1->id,'<i class="fa fa-fw fa-times"></i>','class="text-dark"').'</button>
                                </div>';
                            $this->table->add_row($i++,
							        anchor('meriise/viewLatestNews/'.$latestNews1->id, $latestNews1->news_title),
                                    date('d-m-Y h:i A', strtotime($latestNews1->news_date)),
                                    $actionItems
					            );
                        }
                         echo $this->table->generate();     
                    }else{
                      echo '<h4 class="text-center text-muted mb-5 mt-5 pb-5 pt-5"> Latest news not yet created..! </h4>';
                    }
                ?>
            </div>
        </div>
    </div>
</main>