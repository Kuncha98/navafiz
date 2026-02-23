<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers >> API keys page 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
$config['stripe_api_key']         = 'sk_test_51Jc9A1FsYBNpfs7MVsgxDGldMo8KQViOVdWzcaNtsutedrnTgtCDF5dV31wN1TBHCKiF8PNybSUb5KO10DeZQGMF00fNDw2UCj'; 
$config['stripe_publishable_key'] = 'pk_test_51Jc9A1FsYBNpfs7MRFpmvy7kZf7nbC4DHuJyAW9aTYcIdoi13a6J9USte09RkFH8yjljDhxx8JZI51FB7B6IjdVC00jS5KrbZG'; 
$config['stripe_currency']        = 'usd';