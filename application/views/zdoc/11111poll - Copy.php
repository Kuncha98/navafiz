<?php $this->load->view('header.php'); ?>
<body>
<div class="page category-page">
  <?php $this->load->view('pagetop.php'); ?>
  <div class="clearfix"></div>
  <div class="clearfix"></div>
  <section class="job-breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
          <h3>Poll</h3>
        </div>
        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
          <div class="bread">
            <ol class="breadcrumb">
              <li><a href="#">Home</a> </li>
              <li><a href="#">Poll</a> </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="categories-list-page light-grey">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
             <p><Strong>Note:</Strong>User must login. <a href="<?=base_url()?>login" class="btn btn-default" ><i class="fa fa-user"></i>Click for login</a> </p>
              
        
          <div class="col-md-12 col-sm-12 col-xs-12">
            <h1>Which is the best job search website in UAE ?</h1>
            <div id="posts-masonry" class="posts-masonry">
              <div id = "presult">
                <form class="form-horizontal" role="form" action="<?=base_url()?>pollresult" method="post">
                  <input type="hidden" id="refer_user_id" name="refer_user_id" value="<?=$this->uri->segment(4)?>"/>
                  <div class="form-group"> 
                    <!-- <h3></h3>-->
                    <?php if($answers!='empty') {
				 
foreach(@$answers as $answer){ 


?>
                    <div class="col-sm-offset-1 col-sm-9">
                      <div class="checkbox checkbox-primary" id="checkboxGroup">
                        <input  id="<?=$answer->id?>" value="<?=$answer->id?>" name="checkboxpoll" class="messageCheckbox" type="radio">
                        <label for="checkbox2">
                          <?=$answer->answer?>
                        </label>
                      </div>
                    </div>
                    <?
}
			  }
			 ?>
                  </div>
                  <?php
		 
              if($this->session->userdata('user_id') != "")
		{
			?>
                  <div class="form-group m-b-0">
                    <div class="col-sm-offset-3 col-sm-9">
                      <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}"/>
                      <button type="submit" class="btn btn-info waves-effect waves-light" >Submit</button>
                    </div>
                  </div>
                  <?php
		}
			?>
                </form>
              </div>
              <?php
		 
              if($this->session->userdata('user_id') == "")
		{
			?>
              <h2>Note: For poll submission user must be login</h2>
              <?php
		}
								?>
            </div>
            <h3>Referral Link</h3>
            <p>Dear Professionals, we are conducting a survey about best job portal in UAE.
              We would be thankful for your participation and voting, moreover you will also win a AED-30 gift voucher, if you forward it to 21 friends.</p>
            <?php
		 
              if($this->session->userdata('user_id') != "")
		{
			?>
            <p>Below is the link</p>
            
          
            
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <input id="copyTarget" class="form-control" value="<?=base_url()."poll/referral/".time()."/".$this->session->userdata('user_id')?>">
                 
                <br>
                <button id="copyButton">Copy</button>
               <br>
                <br>
                <!-- <span id="copyTarget2">Some Other Text</span>
                <button id="copyButton2">Copy</button>
                <br>
                <br>-->
                <input id="pasteTarget" class="form-control">
                Click in this Field and hit Ctrl+V to see what is on clipboard<br>
                <br>
                <span id="msg"></span><br>
              </div>
            </div>
            <?
		}
							?>
            
          
          </div>
        </div>
      </div>
    </div>
  </section>
  <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a> 
  
  <!-- JAVASCRIPT JS  -->
  <?php $this->load->view('footer.php'); ?>
  <?php $this->load->view('footerbottom.php'); ?>
</div>
</body>
</html><script>
document.getElementById("copyButton").addEventListener("click", function() {
    copyToClipboardMsg(document.getElementById("copyTarget"), "msg");
});

document.getElementById("copyButton2").addEventListener("click", function() {
    copyToClipboardMsg(document.getElementById("copyTarget2"), "msg");
});

document.getElementById("pasteTarget").addEventListener("mousedown", function() {
    this.value = "";
});


function copyToClipboardMsg(elem, msgElem) {
	  var succeed = copyToClipboard(elem);
    var msg;
    if (!succeed) {
        msg = "Copy not supported or blocked.  Press Ctrl+c to copy."
    } else {
        msg = "Text copied to the clipboard."
    }
    if (typeof msgElem === "string") {
        msgElem = document.getElementById(msgElem);
    }
    msgElem.innerHTML = msg;
    setTimeout(function() {
        msgElem.innerHTML = "";
    }, 2000);
}

function copyToClipboard(elem) {
	  // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}


</script>