<style>
.na0.no_applicable1
{
	display: none !important;
}
</style>

<script>
var ptid = '<?php echo $ptid; ?>';
var is_admin = <?php echo $is_admin; ?>;

var id_project = <?php echo $id_project; ?>;
var id_project_location = <?php echo $details->id_project_location; ?>;

var location_id = '<?php echo $details->location_name . (($details->location_candidate != NULL) ? '_' . $details->location_candidate : ''); ?>';
var location_candidate = '<?php echo $details->location_candidate; ?>';
var vendor = <?php echo $vendor; ?>;

var projects = <?php echo json_encode($this->session->userdata('projects')); ?>;
var username = '<?php echo $username; ?>';

var layout = <?php echo json_encode($layout) ?>;
var locdata = <?php echo json_encode($location_data) ?>;

var mslist = <?php echo json_encode($mslist) ?>;

var plLocked = <?php echo json_encode($plLocked) ?>;
var plLockedText = <?php echo json_encode($plLockedText) ?>;

var access = <?php echo json_encode($access['profile']) ?>;
var vaccess = <?php echo json_encode($vaccess['profile']) ?>;
var naoption = <?php echo json_encode($naoption['profile']) ?>;

var msrules = <?php echo json_encode($ms_rules['rules']) ?>;
var msrulesItems = <?php echo json_encode($ms_rules['ruleItems']) ?>;
var msoffset = <?php echo json_encode($ms_rules['offset']) ?>;

// General detail rules
var gdData = <?php echo json_encode($gd_data) ?>;
var gdrulesItems = <?php echo json_encode($gd_rules) ?>;

var backdate = <?php echo json_encode($backdate) ?>;
var backdate_dt = <?php echo json_encode($backdate_dt) ?>;
var backdate_dt1 = <?php echo json_encode($backdate_dt1) ?>; // Used for datetimepicker
var backdate_ts = <?php echo json_encode($backdate_ts) ?>;
var backdate_access = <?php echo json_encode($backdate_access) ?>;

var backdate_yest = <?php echo json_encode($backdate_yest) ?>;
var backdate_days = <?php echo json_encode($backdate_days) ?>; // Used for datetimepicker

var pace_today = <?php echo json_encode($pace_today) ?>;
var pace_acdate_from = <?php echo json_encode($pace_acdate_from) ?>;

var condFilterArr = <?php echo json_encode($condFilterArr) ?>;
var planned_date_editable = <?php echo json_encode($planned_date_editable) ?>;

var por_no = <?php echo json_encode($por_no) ?>;

var rToken;
var rDocToken;

var plreset = <?php echo json_encode($plreset) ?>;
var fcreset = <?php echo json_encode($fcreset) ?>;
var acreset = <?php echo json_encode($acreset) ?>;

var plcascade = 0;
var fccascade = 0;

var cascadems = <?php echo json_encode($cascadems) ?>;

var siteinfopack = <?php echo json_encode($siteinfopack) ?>;

var max_photo_size = <?php echo $this->config->item('max_photo_size'); ?>;
var max_video_size = <?php echo $this->config->item('max_video_size'); ?>;

var sar_doc = "<?php echo $this->config->item('sar_doc'); ?>";
var tssr_doc = "<?php echo $this->config->item('tssr_doc'); ?>";

// Enable / disable attach doc from button
var sitedoc_attach = <?php echo json_encode($this->config->item('sitedoc_attach')) ?>;
var sitedoc_attach_ext = <?php echo json_encode($this->config->item('sitedoc_attach_ext')) ?>;
var sitedoc_attach_from = <?php echo json_encode($this->config->item('sitedoc_attach_from')) ?>;

var company = <?php echo json_encode($company) ?>;
var pace_task_status = "<?php echo $this->config->item('ms_pace_task_status'); ?>";

var sfoldertype = <?php echo json_encode($this->config->item('sitedoc_folder_type')) ?>;
var milestone_progress_update_confirm = <?php echo json_encode($this->config->item('milestone_progress_update_confirm')) ?>;

var nxBaseAppColor = '<?php echo $this->config->item('base_app_color'); ?>';

$(function () {
    if (plLockedText != '')
        new jBox("Notice", {
            attributes: {
                x: "left",
                y: "bottom"
            },
            width: 325,
            height: 'auto',
            closeButton: '',
            stack: false,
            animation: {
                open: "tada",
                close: "zoomIn"
            },
            onOpen : function () 
                    {
                            var id = $(this)[0]['id'];
                            $('#'+id+ ' .jBox-content').css('background','red');
                            $('#'+id+ ' .jBox-content').css('border','0px');
                    },
            color: "red",
            content: "Warning !!! Following layout locked:<br>" + plLockedText
        });
        
    $('.showFormsList').jBox('Tooltip', {
            trigger: "click",
            closeOnClick: "body",
            closeOnEsc: true,
            width: 400,
            height: 'auto',
            onOpen : function () {
                
                var id = $(this)[0]['id'];
                $('#'+id+' .jBox-content').empty();
                $('#'+id+' .jBox-content').addClass('p-5').css('overflow','auto');

                var detailLocSearchLiForm = {"tag":"li","class":"form-item item p-5","data-id-form":"${id_form}","data-id-project-location":"${id_project_location}","children":[
                    {"tag":"div","class":"product-info","style":"margin-left: 0px;","children":[
                        {"tag":"span","html":"${form_name}"}
                      ]}
                ]};
                $('#'+id+' .jBox-content').html('<ul class="products-list product-list-in-box detailloclist"></ul>');
                $('#'+id+' .jBox-content .detailloclist').json2html(formsList, detailLocSearchLiForm);

        },
        onClose: function () {
                var id = $(this)[0]['id'];
                $('#'+id+' .jBox-content').empty();
        },
    });
    
    $('body').on('click', 'li.form-item', function() {
        var formId = $(this).data('id-form');
        var id_project_location = $(this).data('id-project-location');
        var el_title = $(this).text();
        $.fancybox.open({
            padding : 0,
            openEffect  : 'none',
            closeEffect : 'none',
            href: 'projectone/form?ajax=1&id_form='+formId+'&id_project_location='+id_project_location,
            type: 'iframe',
            iframe: {
                preload: false // fixes issue with iframe and IE
            }
        },
        {
            padding     : 0,
            width	: '95%',
            height	: '100%',
            margin	: [10, 10, 10, 10], // top, right, bottom, left
            closeClick  : false,
            afterClose: function () {

            },
            beforeLoad: function() {
                this.title = '<h3 style="color:'+nxBaseAppColor+'; margin:2px 15px 12px;">'+el_title+'</h3>';
            },
            helpers     : { 
                overlay : {
                    closeClick: false
                },
                title: {
                    type: 'inside',
                    position: 'top'
                }
            },
            tpl: {
                    error: '<div class="error-page m-10 m-b-20 text-center">' +
                                '<div class="error-content m-l-0">' +
                                        '<h4 class="text-orange m-5 m-t-20"><i class="fa fa-warning text-orange"></i> No control menu has been set!.</h4>' +
                                        '<p>Please contact administrator or drop a mail to support@nexsysone.com.</p>' +
                                '</div>' +
                        '</div>'
                }
        });
    });
    
    
    
    $('.showQmsList').jBox('Tooltip', {
            trigger: "click",
            closeOnClick: "body",
            closeOnEsc: true,
            width: 400,
            height: 'auto',
            onOpen : function () {
                
                var id = $(this)[0]['id'];
                $('#'+id+' .jBox-content').empty();
                $('#'+id+' .jBox-content').addClass('p-5').css('overflow','auto');

                var detailQmsList = {"tag":"li","class":"qms-item item p-5","data-id-qms":"${id_qms}","data-id-project-location":"${id_project_location}","children":[
                    {"tag":"div","class":"product-info","style":"margin-left: 0px;","children":[
                        {"tag":"span","html":"${qms_name}"}
                      ]}
                ]};
                $('#'+id+' .jBox-content').html('<ul class="products-list product-list-in-box detailloclist"></ul>');
                $('#'+id+' .jBox-content .detailloclist').json2html(qmsList, detailQmsList);

        },
        onClose: function () {
                var id = $(this)[0]['id'];
                $('#'+id+' .jBox-content').empty();
        },
    });
    
    $('body').on('click', 'li.qms-item', function() {
        var id_qms = $(this).data('id-qms');
        var id_project_location = $(this).data('id-project-location');
        var el_title = $(this).text();
        $.fancybox.open({
            padding : 0,
            openEffect  : 'none',
            closeEffect : 'none',
            href: 'projectone/qms?ajax=1&id_qms='+id_qms+'&id_project_location='+id_project_location,
            type: 'iframe',
            iframe: {
                preload: false // fixes issue with iframe and IE
            }
        },
        {
            
            padding     : 0,
            width	: '95%',
            height	: '100%',
            margin	: [10, 10, 10, 10], // top, right, bottom, left
            closeClick  : false,
            afterClose: function () {

            },
            beforeLoad: function() {
                this.title = '<h3 style="color:'+nxBaseAppColor+'; margin:2px 15px 12px;">'+el_title+'</h3>';
            },
            helpers     : { 
                overlay : {
                    closeClick: false
                },
                title: {
                    type: 'inside',
                    position: 'top'
                }
            },
            tpl: {
                    error: '<div class="error-page m-10 m-b-20 text-center">' +
                                '<div class="error-content m-l-0">' +
                                        '<h4 class="text-orange m-5 m-t-20"><i class="fa fa-warning text-orange"></i> No control menu has been set!.</h4>' +
                                        '<p>Please contact administrator or drop a mail to support@nexsysone.com.</p>' +
                                '</div>' +
                        '</div>'
                }
        });
    });
});

function getHistory(id_layout_item) 
{
	var ldata = $.grep(locdata, function ( o ) {
			return ( o.id_layout_item == id_layout_item );	
		});
	
    showWaitMe('.content-body');
    $.ajax({
        url: 'projectone/ctrldetail/msprogress/getHistory', // preview.php
        data: {
            id_project_location: id_project_location,
            layout_item_id: id_layout_item,
            item_code: ldata[0].item_code
        },
        success: function(data) 
        {
            hideWaitMe('.content-body');
			showHistory(data);
        }
    }); 
}

function switchMsView(msview)
{
	// https://gtac.nexsysone.com/nexsysonev3/projectone/ctrldetail/msprogresslist/?nxtoken=63e8263a5d95292ef94fa32237e5b9f6&sparam=T1ZZTERWR3pqNGliaU9uRkdRbWVyZUo0Um9sdHU3VmNlTjBLZ0RJdXlLRzdDSFlqWTd0YWdBcENVeGdHdENVRGRldDRuM1ZSRlJYbnRyUDZBQ1czdnc9PQ==
	var sparam = getParameterByName('sparam');
	window.location = window.location.protocol + '//' + window.location.host + '/' + window.location.pathname.split('/')[1] + '/projectone/ctrldetail/msprogress?nxtoken='+nxtoken+'&sparam='+sparam+'&msview='+msview;
}

function showHistory(data)
{
	$('#mainmodallgx').modal({
	    backdrop: 'static',
	    keyboard: false
	})
	
	$('#mainmodallgx .modal-body').empty();
	$('#mainmodallgx .modal-body').html(data);
	$('#mainmodallgx .modal-body div').css('max-height', $(window).height() - 320);
	
	$('#mainmodallgx .modal-body .tooltips').tooltip({html: true});
	
	// $('#mainmodallgx .modal-body .fa-undo').first().remove();
	$('#mainmodallgx .modal-body .fa-undo').click( function () 
	{
		var id_log_counter = $(this).closest('tr').attr('id_log_counter');
		var item_code = $(this).closest('tr').attr('item_code');
		var last_modified = $(this).closest('tr').attr('last_modified');
		
		alertify.confirm("Confirm to restore data to " + last_modified + "?", function (e) {
			if (e) 
			{
				showWaitMe('.modal-content');;
				$.ajax({
					url: 'projectone/ctrldetail/msprogress/restore', 
					type: 'POST',
					data: { nxtoken : nxtoken,
							nxcsrf : getNxCsrf(),
							id_log_counter : id_log_counter,
							item_code : item_code
						},
					success: function( response ) 
					{
						hideWaitMe('.modal-content');;
						var result = jQuery.parseJSON(response);
						
						if (result.status)
						{
							
							showHistory(result.history);
							refreshUI(result.data, true);
							
						} else {
							
							alertify.error("Failed to restore data. Please try again.")   
							
						}
					},
					error: function (request, status, error) 
					{
						hideWaitMe('.modal-content');;
						alertify.error("Failed to restore data. Please try again.")   	   
				   	}
				});
			} 
			return false;
		});	
	})
	
	$('#mainmodallgx .modal-footer').empty();
}

function fieTracDownload()
{
	$('.fileDownloadBtn').attr('disabled', true);
	
	showWaitMe('.content-body');
	$.ajax({
		url: 'projectone/doc/sitedoc/fileTracDownload',
		type: 'POST',
		data: { nxtoken : nxtoken,
				nxcsrf : getNxCsrf(), 
				id_project_location : id_project_location,
				por_no : por_no
			},
		success: function( response ) 
		{
			$('.fileDownloadBtn').attr('disabled', false);
			
			hideWaitMe('.content-body');
			var result = jQuery.parseJSON(response);
			
			if (result.length == 0)
			{
				alertify.error("No file downloaded");
				return;
			}
			
			$('#mainmodallgx').modal({
			    backdrop: 'static',
			    keyboard: false
			})
			
			$('#mainmodallgx .modal-title').text('FileTrac Documents');
			
			$('#mainmodallgx .modal-body').empty();
			$('#mainmodallgx .modal-body').json2html([0], lDocFileStructureTableForm);
			
			$('#mainmodallgx .modal-body ul').css('max-height', $(window).height() - 220 )
			$('#mainmodallgx .modal-body ul').css('overflow', 'auto' )

			$('#mainmodallgx .modal-body ul').json2html(result, lDocFileStructureTbodyForm);
			
			$('#mainmodallgx .modal-body ul .filecert0').remove();
			$('#mainmodallgx .modal-body ul .siteinfopack0').remove();
			$('#mainmodallgx .modal-body img').lazyload();
			
			$('#mainmodallgx .modal-body ul li[data-type="doc"] img').click(function () 
			{
				$('.jBox-Tooltip').hide();

				var id_sitedoc_file = $(this).closest('li').attr('id');
				var doc = $.grep(result, function ( o ) {
								return ( o.id_sitedoc_file == id_sitedoc_file );	
							})[0];
							
				$.fancybox.open({
					padding : 0,
					openEffect  : 'none',
					closeEffect : 'none',
					href:"viewer/doc/?f=" + doc.path,
					height: '100%',
					width: '100%',
					type: 'iframe',
					iframe: {
						preload: false // fixes issue with iframe and IE
					}
				})
			})
			
			$('#mainmodallgx .modal-body ul li[data-type!="doc"] img').jBox('Tooltip', 
			{
				trigger: "click",
				closeOnClick: "body",
				closeOnEsc: true,
				onOpen : function () 
				{
					var target = $(this)[0]['target'];
					
					var id = $(this)[0]['id'];
					
					$('#'+id).css('z-index','11000');
					
					$('#'+id+' .jBox-content').empty();
					$('#'+id+' .jBox-content').addClass('p-5');
					
					$('#'+id+' .jBox-content').css('width','').css('height','');
					
					switch($(target).closest('li').data('type'))
					{
						case 'audio':
							$('#'+id+' .jBox-content').css('width','320px').css('height','70px');
							$('#'+id+' .jBox-content').html('<audio controls controlsList="nodownload"><source src="viewer/audio?f='+$(target).data('value')+'" type="audio/mpeg"></audio>');
							break;
						
						case 'video':
							$('#'+id+' .jBox-content').css('width','800px').css('height','455px');
							$('#'+id+' .jBox-content').html('<video autoplay="" controls controlsList="nodownload" width="100%" height="435px" poster="data:image/gif,AAAA"><source src="videostream?file='+$(target).data('value')+'" type="video/mp4"></video>');
							break;

						default:
							$('#'+id+' .jBox-content').css('width','800px').css('height','550px');
							$('#'+id+' .jBox-content').html('<div class="text-center zoom" style="line-height: 530px;cursor: pointer;"><img class="imgloading" src="./viewer/photo?f='+$(target).data('value')+'&s=100&p=1&tn=0" style="max-height: 530px;padding-bottom: 5px;"></img></div>');
							$('#'+id+' .jBox-content .zoom').zoom({ on:'toggle' });
							break;
					}
				},
				onClose: function () 
				{
					var id = $(this)[0]['id'];
					$('#'+id+' .jBox-content').empty();

					var target = $(this)[0]['target'];
		        },
			});
			
			$('#mainmodallgx .modal-body ul .tooltips').tooltip({html: true, container: 'body'}); 
			$('#mainmodallgx .modal-body ul .fileremark[data-original-title=""]').remove();
			
			$('#mainmodallgx .modal-footer').empty();
			
		},
		error: function (request, status, error) 
		{
			$('.fileDownloadBtn').attr('disabled', false);

			hideWaitMe('.content-body');
			alertify.error("Failed to download FileTrac. Please try again.")
	   	}
	});
}

function openMastecScopingUrl(url)
{
	$.ajax({
		url: url,
		success: function( response ) 
		{
			hideWaitMe('.content-wrapper');
	        $.fancybox.open({
	            padding : 0,
	            openEffect  : 'none',
	            closeEffect : 'none',
	            href: response,
	            type: 'iframe',
	            iframe: {
	                preload: false // fixes issue with iframe and IE
	            }
	        },
	        {
	        	padding     : 0,
	        	width		: '100%',
	         	height		: '100%',
	         	//margin		: [10, 10, 10, 10], // top, right, bottom, left
	            closeClick  : false,
	            afterClose: function () 
	            {
	            	// Reset back to selected project once fancybox is closed
	            	/*$.ajax({
						url: 'projectone/sitesrepository/resetToSelecteddProject',
						type: 'POST',
						data: { nxtoken : nxtoken,
								nxcsrf : getNxCsrf(),
								id_project : selectedProject }
					});*/
	            },
	            helpers     : { 
	                overlay : {
	                    closeClick: false
		            },
		            title: null
	            }	        });								
		},
		error: function (request, status, error) 
		{
			hideWaitMe('.content-wrapper');
			alertify.error('Failed to open link. Please try again.')
	   	}
	   	
	});
}

var optCascadeForm = {"tag":"option","value":"${id_layout_item}","html":"${text}"};

var trCascadeForm = {"tag":"tr","children":[
    {"tag":"td","style":function () {
    	if (this.curr_forecast_date == '-')
    		return;
    		
		if (parseInt(this.forecast_date_gap) > 7)
			return "background-color: #4CAF50; color: white;"
		
		if (parseInt(this.forecast_date_gap) > 0)
			return "background-color: #FF9800; color: white;"
		
		return "background-color: #ff460c; color: white;"
	},"html":"${ms_name}"},
    {"tag":"td","style":function () {
    	if (this.curr_forecast_date == '-')
    		return "width: 100px;";

		if (parseInt(this.forecast_date_gap) > 7)
			return "background-color: #4CAF50; color: white;width: 100px;"
		
		if (parseInt(this.forecast_date_gap) > 0)
			return "background-color: #FF9800; color: white;width: 100px;"
		
		return "background-color: #ff460c; color: white;width: 100px;"
	},"html":"${leadtime}"},
    {"tag":"td","style":function () {
    	if (this.curr_forecast_date == '-')
    		return "width: 150px;";

		if (parseInt(this.forecast_date_gap) > 7)
			return "background-color: #4CAF50; color: white;width: 150px;"
		
		if (parseInt(this.forecast_date_gap) > 0)
			return "background-color: #FF9800; color: white;width: 150px;"
		
		return "background-color: #ff460c; color: white;width: 150px;"
	},"html":"${cascade_date}"},
    {"tag":"td","style":function () {
    	if (this.curr_forecast_date == '-')
    		return "width: 150px;";

		if (parseInt(this.forecast_date_gap) > 7)
			return "background-color: #4CAF50; color: white;width: 150px;"
		
		if (parseInt(this.forecast_date_gap) > 0)
			return "background-color: #FF9800; color: white;width: 150px;"
		
		return "background-color: #ff460c; color: white;width: 150px;"
	},"html":"${curr_forecast_date}"}
  ]}
  
var trNoRecordCascadeForm = {"tag":"tr","children":[
    {"tag":"td","html":"No milestone found"}
  ]}
    
function cascadeOverview()
{
	$('#modalcascade').modal({
	    backdrop: 'static',
	    keyboard: false
	})
	
	var csForm = [
		  {"tag":"div","class":"col-md-12 p-0","children":[
		  	{"tag":"div","class":"col-md-8 p-0","style":"padding-right: 2px;","children":[
		  		{"tag":"select","name":"cascadems","class":"select-chosen","html":""}
		  	]},
		  	{"tag":"div","class":"col-md-4 p-0","children":[
		  		{"tag":"div","class":"input-group m-b-5","children":[
					{"tag":"div","class":"input-icon datetime-pick date-only","style":"cursor: pointer;","children":[
                      {"tag":"input","name":"cascadedate","data-format":app_date_js_format,"type":"text","class":"form-control","readonly":"readonly","html":""},
                      {"tag":"span","class":"add-on","style":"z-index: 1000;padding: 5px 7px;margin-top: 1px;","children":[
                          {"tag":"i","class":"sa-plus","html":""}
                        ]}
                    ]},
				    {"tag":"span","class":"input-group-addon cascadebackwardbtn","style":"cursor: pointer;","children":[
				        {"tag":"i","class":"fa fa-undo","html":""}
				      ]},
				    {"tag":"span","class":"input-group-addon cascadesubmitbtn","style":"cursor: pointer;","children":[
				        {"tag":"i","class":"fa fa-eye","html":""}
				      ]},
				    {"tag":"span","class":"input-group-addon cascadeexportbtn","style":"cursor: pointer;","children":[
				        {"tag":"i","class":"fa fa-file-excel-o","html":""}
				      ]},
				  ]},
		  	]}
		  ]},
		  {"tag":"table","class":"tile table table-bordered table-striped","children":[
		      {"tag":"thead","children":[
		          {"tag":"tr","children":[
		              {"tag":"th","html":"Milestone"},
		              {"tag":"th","style":"width: 100px;","html":"Leadtime"},,
		              {"tag":"th","style":"width: 155px;","html":"Cascade Date"},
		              {"tag":"th","style":"width: 155px;","html":"Forecast Date"}
		            ]}
		        ]}
		    ]},
		  {"tag":"div","class":"cascadedetail","style":"overflow: auto;","children":[
		      {"tag":"table","id":"cascadetable","class":"table table-bordered table-striped","children":[
			  	  {"tag":"thead","style":"display: none;","children":[
			          {"tag":"tr","children":[
			              {"tag":"th","html":"Milestone"},
			              {"tag":"th","style":"width: 100px;","html":"Leadtime"},
			              {"tag":"th","style":"width: 155px;","html":"Cascade Date"},
			              {"tag":"th","style":"width: 155px;","html":"Forecast Date"}
			            ]}
			        ]},
		          {"tag":"tbody","html":""}
		        ]}
		    ]}
		];
	
	$('#modalcascade .modal-title').text('Cascade Projection');
	if (cascadems.length != 0)
		$('#modalcascade .modal-title').text('Cascade Projection [' + cascadems[0].leadtime_name + ']');

	$('#modalcascade .modal-body').empty();
	$('#modalcascade .modal-body').json2html([0], csForm);
	$('#modalcascade .modal-body .tooltips').tooltip({html: true});
	$('#modalcascade .modal-body .cascadedetail').height($(window).height() - 370)
	
	$('#modalcascade .modal-body input[name="cascadedate"]').val(backdate_dt);
	$('#modalcascade .modal-body input[name="cascadedate"]').closest('div').datetimepicker({
																pickTime: false,
													    	});
	
	$('#modalcascade .modal-body .cascadebackwardbtn').click( function () 
	{
		if ($(this).hasClass('btn-primary'))
			$(this).removeClass('btn-primary').addClass('btn-success')
		else
			$(this).removeClass('btn-success').addClass('btn-primary')
	})
	
	$('#modalcascade .modal-body .cascadeexportbtn').click( function () 
	{
		if (csResultArr.length != 0)
		{
			var _csResultArr = [];
			$.each(csResultArr, function(index, o) 
			{
				var obj = new Object;
				obj['Milestone'] = o.ms_name;
				obj['Leadtime'] = o.leadtime;
				obj['Cascade Date'] = o.cascade_date;
				obj['Forecast Date'] = o.curr_forecast_date;
				
				_csResultArr.push(obj)
			});

			JSONToCSVConvertor(_csResultArr, 'cascadeprojection', true)
		}
	})
	
	var csResultArr = [];
	
	$('#modalcascade .modal-body .cascadesubmitbtn').click( function () 
	{
		var backward = 0;
		if ($('#modalcascade .modal-body .cascadebackwardbtn').hasClass('btn-success'))
			backward = 1;
			
		showWaitMe('.modal-content');
		$.ajax({
			url: 'projectone/ctrldetail/msprogress/cascade',
			type: 'POST',
			data: { nxtoken : nxtoken,
					nxcsrf : getNxCsrf(),
					id_project_location : id_project_location,
					id_layout_item : $('#modalcascade .modal-body select[name="cascadems"]').val(),
					forecast_date :  $('#modalcascade .modal-body input[name="cascadedate"]').val(),
					backward : backward
				},
			success: function( response ) 
			{
				hideWaitMe('.modal-content');

				csResultArr = jQuery.parseJSON(response);
				
				$('#modalcascade .modal-body .cascadedetail').show();
				$('#modalcascade .modal-body .cascadedetail tbody').empty();
				if (csResultArr.length > 0)
				{

					$('#modalcascade .modal-body .cascadedetail tbody').json2html(csResultArr, trCascadeForm);

				} else {
					
					$('#modalcascade .modal-body .cascadedetail tbody').json2html([0], trNoRecordCascadeForm);

				}
			},
			error: function (request, status, error) 
			{
				hideWaitMe('.modal-content');
		   	}
		});
	})
	
	$('#modalcascade .modal-body .select-chosen').empty();
	$('#modalcascade .modal-body .select-chosen').json2html(cascadems, optCascadeForm);
	$('#modalcascade .modal-body .select-chosen').chosen({ search_contains: true })
	
	$('#modalcascade .modal-body .cascadedetail tbody').empty();
}
</script>
