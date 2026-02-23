<?php 
    
    $this->load->view('include/header'); 

?>
<style>
    .card:hover{
        box-shadow: -10px 15px 9px -9px
    }
</style>
<!-- List all products -->
<div class="container">
    <div class="row">
        <?php if(!empty($products)){ 
                foreach($products as $row){
                    $order = isPurchased($row['id']);
                    ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <h4><?= $row['name']; ?></h4>
                    <h5>Price: <?=$row['currency'] == 'AED' ? 'AED ' : '$ ' ?><?=$row['price']?></h5>
                </div>
                <div class="text-center mb-3">
                    <?php if(isset($order) && !empty($order)){   
                        if($order[0]->product_id == $row['id'] ){
                            ?>
                    <a href="javascript:void(0)" class="btn btn-outline-success">Purchased</a>
                        <?php }
                    }else{ ?>
                    <a href="<?php echo base_url('products/purchase/'.$row['id']); ?>" class="btn btn-outline-primary">Purchase</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } }else{ ?> 
            <p>Product(s) not found...</p>
        <?php } ?>
    </div>     
</div>


    
    
<?php $this->load->view('include/footer') ?>