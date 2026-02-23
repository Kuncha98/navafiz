<?php
class paging_front {
    var $page_no,$total,$limit,$first,$previous,$next,$last,$start,$end;
    //$sql,$records=15,$pages=7,$page_no="" , $total
    public function __constructor($config = array()){
        if(@$config['pages']%2==0)
            @$config['pages']++;           
             
        $first=1;
        $previous   =   @$config['page_no']>1?@$config['page_no']-1:1;
        $next       =   @$config['page_no']+1;
        @$last       =   ceil(@$config['total']/@$config['records']);
        if($next>$last)
            $next   =   $last;         
            
        /*
        The first, previous, next and last page numbers have been calculated
        */
        $start      =   @$config['page_no'];
        $end        =   $start+@$config['pages']-1;
        if($end > $last)
            $end    =   $last;
        /*************************/         
        /*
        The starting and ending page numbers for the paging
        */
        if(($end-$start+1)<@$config['pages']){
            $start  -=  @$config['pages']-($end-$start+1);
            if($start<1)
                $start=1;
        }
        if(($end-$start+1)==@$config['pages']){
            $start  =   @$config['page_no']-floor(@$config['pages']/2);
            $end    =   @$config['page_no']+floor(@$config['pages']/2);
            while($start<$first){
                $start++;
                $end++;
            }
            while($end>$last){
                $start--;
                $end--;
            }
        }
        /*
        The above two IF statements are kinda optional
        These IF statements bring the current page in center
        */
        if(@$page_no == "")
            $page_no  = 1;     
            
        $this->records  =   @$config['records'];
        $this->pages    =   @$config['pages'];
        $this->page_no  =   @$config['page_no'];
        $this->total    =   @$config['total'];
        $this->limit    =   @$limit;
        $this->first    =   $first;
        $this->previous =   $previous;
        $this->next     =   $next;
        $this->last     =   $last;
        $this->start    =   $start;
        $this->end      =   $end;    
             
    } 

    function show_paging(){
        
        $paging="";
        
        
        if((isset($this->records)) && $this->total> $this->records) {
            $page_no=$this->page_no;
            $first=$this->first;
            $previous=$this->previous;
            $next=$this->next;
            $last=$this->last;
            $start=$this->start;
            $end=$this->end;
            
            
            //$paging.="<span class='paging_page_info'>Page $page_no of $last <span> &nbsp; ";
            if($page_no==$first)
                $paging.="<span class='paging_no_page ist'>&nbsp;</span>  ";
            else
                $paging.="<a href='javascript:void(0);' class='paging_page ist' id='".$first."'>&nbsp;</a> ";
            if($page_no==$previous)
                $paging.="<span class='paging_no_page previous'>&nbsp; </span> &nbsp;";
            else
                $paging.="<a href='javascript:void(0);' class='paging_page previous' id='".$previous."'>&nbsp;</a> &nbsp;";
            for($p=$start;$p<=$end;$p++){
                if($page_no==$p)
                    $paging .= " <span class='paging_selected_page paginate_active'>".$p."</span> ";
                else
                    $paging .="<a href='javascript:void(0);'  class='paging_page pages' id=".$p.">$p</a> ";
            }
            if($page_no==$next)
                $paging.="&nbsp; <span class='paging_no_page next'>&nbsp;</span> ";
            else
                $paging.="&nbsp;<a href='javascript:void(0);' id='".$next."' class='paging_page next'>&nbsp;</a> ";
            if($page_no==$last)
                $paging.=" <span class='paging_no_page llast'>&nbsp;</span> ";
            else
                $paging.="<a href='javascript:void(0);'  id='".$last."' class='paging_page llast'>&nbsp;</a>";
        }
        return $paging;
    }     
}
?>
