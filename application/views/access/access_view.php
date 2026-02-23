<?php $this->load->view('include/header-ind');

$session_user_id= $this->session->userdata('user_id');
$loggedin_name = $this->session->userdata('name') =='' ? 0: $this->session->userdata('name');

// Check if profile data exists
if ($profile_data) {
    // Access profile data properties using object syntax
    echo "<h1 class='pl-4 text-center'>" . $profile_data->m_name . "</h1>";
} else {
    // Handle the case where profile data is not found
    echo "<p>No profile data found.</p>";
}
?>
<?php 
if($session_user_id > 0){
    $class = '';
}else{
    $class = 'disabled';
}?>

<?php
// Check if profile data exists
if ($profile_data) {
// Get the phone number from profile data
$phone_number = $profile_data->m_phone;

// Add a plus sign at the beginning if there's no plus or '00' at the start
if (substr($phone_number, 0, 2) !== '00' && substr($phone_number, 0, 1) !== '+') {
    $phone_number = '+' . $phone_number;
} elseif (substr($phone_number, 0, 2) == '00') {
    // Replace '00' with '+'
    $phone_number = '+' . substr($phone_number, 2);
}

// Constructing the profile link
$profile_link = "https://navafiz.com/n/" . $profile_data->m_id;
?>
    <div class="text-center">
        <a href="https://api.whatsapp.com/send/?phone=971554465332&text=Hi <?php echo $loggedin_name ; ?>, wants to download cv or profile for :<?php echo $profile_link ?>&type=phone_number&app_absent=0" class="btn btn-outline-success col-3 m-4 $class" target="_blank"><i class="bi bi-whatsapp"></i> Click here to Whatsapp for downlaading CV Or Profile information</a>
      </div>";
<?php 
} else {
    // Handle the case where profile data is not found
    echo "<p>No profile data found.</p>";
}
?>


<?php $this->load->view('include/footer');?>
