<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
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
                <div class="form-group mx-5">
                    <label for="title">Title:</label>
                    <p><?php echo nl2br($latestNews->news_title);?></p>
                </div>
                <div class="form-group mx-5">
                    <label for="details">Details:</label>
                    <?php echo ($latestNews->news_details)?nl2br($latestNews->news_details):"";?>
                </div>

                <div class="form-group mx-5">
                    <label for="details">Display in:</label>
                    <?php echo $newsDisplay[$latestNews->display_in];?>
                </div>

                <div class="form-group mx-5">
                    <label for="details">Files:</label>
                    <ul>
                        <?php
                            $fileNames = unserialize($latestNews->files);
                            foreach($fileNames as $key => $value){
                                $del = anchor('aicte/latestNewsDelete/'.$latestNews->id.'/'.$key,'<i class="fa fa-times ml-2 text-danger"></i>','class=""');
                                echo '<li>'.anchor('assets/latest_news/'.$value, $value, 'target="_blank"').'&nbsp;'.$del.'</li>';
                            }
                        ?>
                    </ul>
                </div>

                <div class="form-group mx-5">
                    <?php 
                        echo anchor('aicte/editLatestNews/'.$latestNews->id,'<i class="fas fa-edit fa-sm fa-fw"></i> Edit', 'class="btn btn-success btn-sm mr-2" '); 
                        echo anchor('aicte/latestNews','<i class="fas fa-arrow-left fa-sm fa-fw"></i> Cancel', 'class="btn btn-info btn-sm" '); 
                    ?>
                </div>

                </form>
            </div>
        </div>
    </div>
</main>