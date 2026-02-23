<div class="col-md-2 col-sm-2 sidebar2">
  <h2 class="padding-top-20">Job Categories</h2>
  <p class="text-danger" id="sidebarloginsms" style="display:none"> </p>
  <ul class="nav">
    <?
  $qry = "select *from jb_categories where c_status = 1";
  $rs = mysql_query($qry);
  while($row = mysql_fetch_array($rs)){
  ?>
    <li class="jobcats" id="<?=$row['c_id']?>" style="border-bottom:1px dashed #FFFFFF; font-weight:600; font-size:12px;"> <a href="javascript:void(0);"> <i class="fa fa-tags"></i>
      <?=$row['c_name']?>
      </a> </li>
    <?
  }
		?>
  </ul>
  <br />
</div>
