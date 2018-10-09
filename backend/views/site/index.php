<?php

/* @var $this yii\web\View */

$this->title = 'AP Advocates';


$this->registerJs('
    $.ajax({
        type: "GET",
        url: "https://apadvocates.com/administrator/api/articles-en",        
        success: function(response){

            $.each(response, function(k, v) {						
                $("#show_details").append(\'<h2>\'+v.title+\'</h2>\'+v.description);          
            });
        }
    });
');

?>
<div class="site-index">
   

    <div class="body-content jumbotron">

        <div class="row ">
            <div class="col-lg-4" id="show_details">
               
            </div>
           
        </div>

    </div>
</div>
