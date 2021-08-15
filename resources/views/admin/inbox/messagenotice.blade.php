<?php
use Illuminate\Support\Facades\DB;
$notReads = DB::select('SELECT sum(counts) as sum from V_Inbox');
if(!empty($notReads)){
    if($notReads[0]->sum == null || $notReads[0]->sum == 0){
        echo '';
    }else{
        echo '<span class="count bg-primary">'.$notReads[0]->sum.'</span>';
    }
}
?>