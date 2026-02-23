<!--<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/application.js"></script>-->

<table class="table table-striped table-bordered">
				                    <thead>
				                        <tr>
				                             <th>Name</th>
                      <th>Video Date</th>
                      <th>Image</th>
                   <!--  <th>Featured</th>-->
                      <th>Action</th>
                                           
				                        </tr>
				                    </thead>
				                    <tbody>
                                    <?php if($videos!='empty') {
			
foreach(@$videos as $video){ 

/*$vid = substr($video->image, strrpos($video->image, '/') + 1);
$thumbnail_medium_url='https://api.dailymotion.com/video/'.$vid.'?fields=thumbnail_medium_url';
$json_thumbnail = file_get_contents($thumbnail_medium_url);
$get_thumbnail = json_decode($json_thumbnail, TRUE);
$thumb=$get_thumbnail['thumbnail_medium_url'];*/


?>
				                        <tr>
				                           
				                            
                    <td><?=$video->title?></td>
                    <td><?=date("m d-Y",$video->add_date)?></td>
                    <td><img src="<?=$video->image?>" width="100" height="100" /></td>
                   
                    <td> <a href="#" class='edit_status' id="<?php echo($video->id);?>" rel="<?php echo($video->featured);?>"> <?=($video->featured == 'yes')?"Yes":"No"?></a></td>
				                            <td>
                                            <a href="<?=base_url()?>admin/videos/edit/<?php echo($video->id);?>" title="edit"><span><i class="icon-clipboard"></i></span></a>
                                            <button class="btn btn-danger" type="button" onClick="del_video(<?=$video->id?>)"><span><i class="icon-remove2"></i></span></button>
                                            </td>
				                        </tr>
				                         <?
}
				  }
				  ?>
				                   
				                      
				                    </tbody>
				                </table>