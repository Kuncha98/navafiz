<!DOCTYPE html>
<html>
  <head>
     <title>DataTables AJAX Pagination with Search and Sort in CodeIgniter</title>

     <!-- Datatable CSS -->
     <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
      crossorigin="anonymous">
     <!-- jQuery Library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <!-- Datatable JS -->
     <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  </head>
  <body>
<ul class="nav nav-tabs">
    <ul class="nav nav-tabs">

       <li><a href="<?= site_url('admin/members/add_member')?>" id="" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Member</a></li>
       <li><a href="<?=base_url()?>admin/member/excelexport" id="exportexcel" class="btn btn-primary m-4"><i class="fas fa-file-export"></i> Export</a></li>
    </ul>
</ul>
     <!-- Table -->
     <table id='empTable' class='display dataTable'>

       <thead>
         <tr>
             <th>Id</th>
           <th>Name</th>
           <th>CV</th>
           <th>Email</th>
           <th>Profile Picture</th>
            <th>Edit</th>
           <th>Delete</th> 
           <th>View</th>
         </tr>
       </thead>

     </table>

     <!-- Script -->
     <script type="text/javascript">
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':base_url+'admin/member2/empList'
          },
          'columns': [
             {data: 'm_id'},
             { data: 'm_name' },
             { data: function(row, type, val, meta){
                return row.member_cv+'<br> <a href="<?=site_url('admin/members/AddCV/')?>/'+row.m_id+'" class="btn btn-success" style="height: 27px;font-size: 11px;">Upload</a>';
             } },
             { data: 'm_email' },
             { data: function(row, type, val, meta){
              return '<img src="http://localhost:82/test/ncode/assets/uploads/members/temp/'+row.m_avatar+'"width="90" height="75"><br />\n\
                     <a href="<?=site_url('admin/members/UpdateProfilePhoto')?>/'+row.m_id+'" style="height: 27px;font-size: 11px;" class="btn btn-success">Update Picture</a>'
                }
             },
             { data:function(row,type,val,meta){
               return '<a href="<?=site_url('admin/member2/edit_member')?>/'+row.m_id+'" class="btn btn-success" title="edit">Edit</a>'      
                }
             },
             {
               data: function(row,type,val,meta){
                return '<td><a href="<?=site_url('admin/member2/delete_member')?>/'+row.m_id+'" onclick="return confirm(`Are You Sure want To Delete ?`)" class="btn btn-danger" title="delete">Delete</a></td>'   
               }  
             },
            { data: function(row,type,val,meta){
              return '<td><a href="<?=site_url('admin/members/viewProfile')?>/'+row.m_id+'" class="btn btn-info" title="view">View</a></td>'      
            },
        
            }     
                
         
          ]
        });
        // console.log(data);
     });
     
     
     
     function showEditForm(member_id)
{
	$("#loading").show();
		var form_data = {
				ajax	 			: '1',
				member_id			:  member_id,
				actioncall  		: 'showeditform'
			};
			$.ajax({
				url  	: "<?php echo(base_url().'admin/ajaxDataManagementMember'); ?>",
				type 	: 'POST',
				data 	: form_data,
				success : function(data){
					$("#loading").hide();
					$('#loadData').html(data);
				}
			});			
	
}


function delForm(id){
			
			var form_data = {
				ajax	 		: '1',
				actioncall  	: 'delform',
				id				: id,
			};
			if(confirm('Are you sure to delete this data and its related data'))
				{	
				$("#loading").show();	
				$.ajax({
					url  	: "<?php echo(site_url().'admin/ajaxDataManagementMember'); ?>",
					type 	: 'POST',
					data 	: form_data,
					success : function(data){
						$("#loading").hide();
						init(2);
						}
					});
				}
		}
     
     
     </script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  </body>
</html>