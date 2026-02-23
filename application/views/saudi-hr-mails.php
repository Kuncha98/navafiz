<?php $this->load->view('include/header.php'); 
$profile_id= $this->session->userdata('user_id');
?>

<style>
    label{
        font-size: 12px !important;
    }
    tbody a {
        text-decoration: none !important;
        color: black;
    }
    tr > td:first-child {
    /* Your styles here */
    font-weight: bold; /* Example style */
    text-align: center; /* Example style */
}

</style>
<!-- Action Buttons -->
            <?php if($profile_id > 0){
                $class = '';
            }else{
                $class = 'disabled';
            } ?>
<div class="container">
    <?php $this->load->view('notification/notification-messages');?>
<div class="container my-5">
        <h2 class="text-center mb-4">Saudi Companies HR Emails</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" style="width:6%;">#</th>
                    <th>Company Email</th>
                </tr>
            </thead>
            <tbody>
    <tr><td>1</td><td><a href="mailto:CV@Arabianfal.com">CV@Arabianfal.com</a></td></tr>
    <tr><td>2</td><td><a href="mailto:Cv@aldawaa.com.sa">Cv@aldawaa.com.sa</a></td></tr>
    <tr><td>3</td><td><a href="mailto:Hr.qrm@hotmail.com">Hr.qrm@hotmail.com</a></td></tr>
    <tr><td>4</td><td><a href="mailto:Rec@alojaimi.com">Rec@alojaimi.com</a></td></tr>
    <tr><td>5</td><td><a href="mailto:Recruitment@rawabiholding.com">Recruitment@rawabiholding.com</a></td></tr>
    <tr><td>6</td><td><a href="mailto:Job.s6@hotmail.com">Job.s6@hotmail.com</a></td></tr>
    <tr><td>7</td><td><a href="mailto:Careers@dnata.com">Careers@dnata.com</a></td></tr>
    <tr><td>8</td><td><a href="mailto:Hr@alesayi_motors.com">Hr@alesayi_motors.com</a></td></tr>
    <tr><td>9</td><td><a href="mailto:Hr@alarayan.com">Hr@alarayan.com</a></td></tr>
    <tr><td>10</td><td><a href="mailto:Recruiting.ksa@mcmermott.com">Recruiting.ksa@mcmermott.com</a></td></tr>
    <tr><td>11</td><td><a href="mailto:Recruitment@aytb.com">Recruitment@aytb.com</a></td></tr>
    <tr><td>12</td><td><a href="mailto:Wadaef@gtecorp.com">Wadaef@gtecorp.com</a></td></tr>
    <tr><td>13</td><td><a href="mailto:Careers@nesr.com">Careers@nesr.com</a></td></tr>
    <tr><td>14</td><td><a href="mailto:Recruit@farm.com.sa">Recruit@farm.com.sa</a></td></tr>
    <tr><td>15</td><td><a href="mailto:Info@alhumamlaw.com">Info@alhumamlaw.com</a></td></tr>
    <tr><td>16</td><td><a href="mailto:Hr1@gulfteksaudi.com">Hr1@gulfteksaudi.com</a></td></tr>
    <tr><td>17</td><td><a href="mailto:Catcosa@catcosa.com">Catcosa@catcosa.com</a></td></tr>
    <tr><td>18</td><td><a href="mailto:Cv@tafear.com">Cv@tafear.com</a></td></tr>
    <tr><td>19</td><td><a href="mailto:Recruitment@sraco.com.sa">Recruitment@sraco.com.sa</a></td></tr>
    <tr><td>20</td><td><a href="mailto:Career@sidco.com.sa">Career@sidco.com.sa</a></td></tr>
    <tr><td>21</td><td><a href="mailto:Info@atco.com.sa">Info@atco.com.sa</a></td></tr>
    <tr><td>22</td><td><a href="mailto:HRdepartmental@sa.yokogawa.com">HRdepartmental@sa.yokogawa.com</a></td></tr>
    <tr><td>23</td><td><a href="mailto:Recruitment@shadeco.com">Recruitment@shadeco.com</a></td></tr>
    <tr><td>24</td><td><a href="mailto:Klc.hr@alkafaa.com">Klc.hr@alkafaa.com</a></td></tr>
    <tr><td>25</td><td><a href="mailto:Kbr-amcdehr@kbr.com">Kbr-amcdehr@kbr.com</a></td></tr>
    <tr><td>26</td><td><a href="mailto:Recruitment@batook.com">Recruitment@batook.com</a></td></tr>
    <tr><td>27</td><td><a href="mailto:Career@shawarmer.com">Career@shawarmer.com</a></td></tr>
    <tr><td>28</td><td><a href="mailto:Hrsupport@archirodon.net">Hrsupport@archirodon.net</a></td></tr>
    <tr><td>29</td><td><a href="mailto:Jobs@binajinah.com">Jobs@binajinah.com</a></td></tr>
    <tr><td>30</td><td><a href="mailto:Marketing.np@nesma.com">Marketing.np@nesma.com</a></td></tr>
    <tr><td>31</td><td><a href="mailto:Wadaef2019@abdulla-fouad.com">Wadaef2019@abdulla-fouad.com</a></td></tr>
    <tr><td>32</td><td><a href="mailto:Careers@innosoft.sa">Careers@innosoft.sa</a></td></tr>
    <tr><td>33</td><td><a href="mailto:M@startime.com.sa">M@startime.com.sa</a></td></tr>
    <tr><td>34</td><td><a href="mailto:job@musk.sa.com">job@musk.sa.com</a></td></tr>
    <tr><td>35</td><td><a href="mailto:Shababwatansa@gmail.com">Shababwatansa@gmail.com</a></td></tr>
    <tr><td>36</td><td><a href="mailto:j@sabksa.com">j@sabksa.com</a></td></tr>
    <tr><td>37</td><td><a href="mailto:al.alshaikh@bonyan.sa">al.alshaikh@bonyan.sa</a></td></tr>
    <tr><td>38</td><td><a href="mailto:ymohammed@innovest.com.sa">ymohammed@innovest.com.sa</a></td></tr>
    <tr><td>39</td><td><a href="mailto:s.alwadi@nhc.sa">s.alwadi@nhc.sa</a></td></tr>
    <tr><td>40</td><td><a href="mailto:i.atassi@artar.com.sa">i.atassi@artar.com.sa</a></td></tr>
    <tr><td>41</td><td><a href="mailto:oalkhunaizi@darwaemaar.com">oalkhunaizi@darwaemaar.com</a></td></tr>
    <tr><td>42</td><td><a href="mailto:jobs@almasah.net">jobs@almasah.net</a></td></tr>
    <tr><td>43</td><td><a href="mailto:recruitment.amjad@gmail.com">recruitment.amjad@gmail.com</a></td></tr>
    <tr><td>44</td><td><a href="mailto:jobrydlaw@gmail.com">jobrydlaw@gmail.com</a></td></tr>
    <tr><td>45</td><td><a href="mailto:Job@almoosahospital.com.sa">Job@almoosahospital.com.sa</a></td></tr>
    <tr><td>46</td><td><a href="mailto:recruitment@almoosahospital.com.sa">recruitment@almoosahospital.com.sa</a></td></tr>
    <tr><td>47</td><td><a href="mailto:jobs@sghgroup.net">jobs@sghgroup.net</a></td></tr>
    <tr><td>48</td><td><a href="mailto:career.dmm@sghgroup.net">career.dmm@sghgroup.net</a></td></tr>
    <tr><td>49</td><td><a href="mailto:talent.acquisition@drsulaimanalhabib.com">talent.acquisition@drsulaimanalhabib.com</a></td></tr>
    <tr><td>50</td><td><a href="mailto:Careers@jhah.com">Careers@jhah.com</a></td></tr>
    <tr><td>51</td><td><a href="mailto:hrd@alahsahospital.com.sa">hrd@alahsahospital.com.sa</a></td></tr>
    <tr><td>52</td><td><a href="mailto:career@almanahospital.com.sa">career@almanahospital.com.sa</a></td></tr>
    <tr><td>53</td><td><a href="mailto:info@familycare.com.sa">info@familycare.com.sa</a></td></tr>
    <tr><td>54</td><td><a href="mailto:info@ramclinics.com">info@ramclinics.com</a></td></tr>
    <tr><td>55</td><td><a href="mailto:HR.DSFHR@fakeeh.care">HR.DSFHR@fakeeh.care</a></td></tr>
    <tr><td>56</td><td><a href="mailto:career@mouwasat.com">career@mouwasat.com</a></td></tr>
    <tr><td>57</td><td><a href="mailto:careers@dallah-hospital.com">careers@dallah-hospital.com</a></td></tr>
    <tr><td>58</td><td><a href="mailto:hr.phc@drsulaimanalhabib.com">hr.phc@drsulaimanalhabib.com</a></td></tr>
    <tr><td>59</td><td><a href="mailto:careers@almurjanhospital.com">careers@almurjanhospital.com</a></td></tr>
    <tr><td>60</td><td><a href="mailto:hiringnow.ksa@gmail.com">hiringnow.ksa@gmail.com</a></td></tr>
    <tr><td>61</td><td><a href="mailto:recruitment@wecareksa.com">recruitment@wecareksa.com</a></td></tr>
</tbody>
        </table>
    </div></div>
<?php $this->load->view('include/footer.php'); ?> 