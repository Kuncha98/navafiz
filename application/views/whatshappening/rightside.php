<div class="card profile">
    <div class="card-header">
        <b>Upcoming Events</b>
    </div>
    <div class="card-body">
        <?php $upcomming_events = GetUpcomingEventsList();?>
        <?php foreach($upcomming_events as $event){?>
        <div class="event-item" style="border-bottom:solid 1px #ccc;margin: 12px 10px;">
            <p>
                <b><?=$event->title?></b> <br> 
                <?=date("d F Y g:i A",  strtotime($event->event_date));?>                                
            </p>
            <p>
                <?=$event->address?>
            </p>
            <p>
                <a href="<?=site_url('event/view/'.$event->e_id);?>" class="btn btn-primary" style="background-color: #164885!important;border-color: #164885!important;">Register for Event</a>
            </p>
        </div>
        <?php }?>
    </div>                        
</div>                        
            