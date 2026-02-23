<style type="text/css">
	#companies-list{
		list-style: none;
		padding: 0;
	}
	#companies-list li {
		padding: 4px 6px 4px 4px;
		
	}

	#companies-list li:hover{

		cursor: pointer;
		background: #164885;
		border-radius: 2px;
	}
</style>


<?php


if(!empty($companies_list)) {
?>
<ul id="companies-list">
<?php
foreach($companies_list as $company) {
?>
<li onClick="selectCompany('<?=$company->co_name;?> - <?=$company->co_address; ?>' , '<?= $company->co_id; ?> ');"><a><?=$company->co_name;?> - <?=$company->co_address; ?></a>  </li>


<?php } ?>
</ul>
<?php } ?>


<script type="text/javascript">
	function selectCompany(val , id) {

    $("#search-box").val(val);
    $("#company_id").val(id);
    $("#suggesstion-box").hide();
    }
</script>