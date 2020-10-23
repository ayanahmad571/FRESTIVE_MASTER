<?php
require_once('server_fundamentals/SessionHandler.php');
if(isset($_GET['l1']) or isset($_GET['l2']) or isset($_GET['l3'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <style>
            body,html {
                height: 100%;

            }
            body{
                display: none;
            }
            .card{
                cursor: pointer;
                height: 250px;
                font-family: 'Cantora One', Serif;

            }
            .card:hover{
                background-color: #ffdb90;
            }
            .text_head{
                position: absolute;
                top:40%;
                text-align: center;
                font-size:2em;
            }
            .text_sec{
                position: absolute;
                top:40%;
                text-align: center;
                font-size:2em;
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css"  />
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Cantora+One">

    </head>
    <body>

    <div class="row" style="padding-left: 20px; background-color: #0b2e13">
        <div class="pull-left mt-2 mb-2"><a href="home"><button class="btn btn-danger"> Back To Dashboard</button></a></div>
    </div>
    <div style="margin-top:50px; padding-left:20px" class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="col-12 mx-auto">
                <div class="h-100 my-auto row ">
                    <?php

                    if(isset($_GET['l1'])) {
                        $getAll = mysqlSelect("SELECT * FROM `virtual_booth_types` ");
                        if(!is_array($getAll)){
                            die("No Booths Found");
                        }else{

                                foreach($getAll as $OneType) {
                                    ?>

                                    <div onclick="window.location = 'virtualstreet2?l2=<?php echo md5('KNWRJGKIRNJS' . $OneType['vbt_id']) ?>'"
                                         class="card col-6">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h1 class="text_head">
                                                        <?php echo $OneType['vbt_name']; ?>
                                                    </h1>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }

                    else if(isset($_GET['l2'])) {
                        if (!ctype_alnum($_GET['l2'])) {
                            die("CTE");
                        }


                        $checkVB = mysqlSelect("SELECT * FROM `virtual_booth_types` where md5(concat('KNWRJGKIRNJS', vbt_id)) = '" . $_GET['l2'] . "' ");
                        if (!is_array($checkVB)) {
                            die("No Virtual Booth Found");
                        }else{
                         if($checkVB[0]['vbt_id'] == 1) {
                        $getAll = mysqlSelect("SELECT * FROM `virtual_booth_types_subtypes` where vst_vbt_id = 1");
                        foreach ($getAll as $OneType) { ?>

                            <div onclick="window.location = 'virtualstreet2?l3=<?php echo md5('sefseRNJS' . $OneType['vst_id']) ?>'"
                                 class="card col-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="text_head">
                                                <?php echo $OneType['vst_name']; ?>
                                            </h1>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php
                        }

                    }
                         else if($checkVB[0]['vbt_id'] == 2) {
                                $getAll = mysqlSelect("SELECT * FROM `virtual_booths` where vb_vbt_id = 2 and vb_paid =1 and vb_valid =1");
                                foreach ($getAll as $OneType) { ?>

                                    <div onclick="window.location = 'sponsor_page?id=<?php echo md5('SALTINGSALTINGEHEIUNOIU*****siufniue' . $OneType['vb_id']) ?>'"
                                         class="card col-6">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h1 class="text_head">
                                                        <?php echo $OneType['vb_name']; ?>
                                                    </h1>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                }

                            }
                         else if($checkVB[0]['vbt_id'] == 3) {
                             $getAll = mysqlSelect("SELECT * FROM `virtual_booths` where vb_vbt_id = 3 and vb_paid =1 and vb_valid =1");
                             foreach ($getAll as $OneType) { ?>

                                 <div onclick="window.location = 'other_booths_page?id=<?php echo md5('SALTINGSALTINGEHEIUNOIU*****siufniue' . $OneType['vb_id']) ?>'"
                                      class="card col-6">
                                     <div class="card-body">
                                         <div class="row">
                                             <div class="col-12">
                                                 <h1 class="text_head">
                                                     <?php echo $OneType['vb_name']; ?>
                                                 </h1>

                                             </div>
                                         </div>
                                     </div>
                                 </div>


                                 <?php
                             }

                         }
                         else if($checkVB[0]['vbt_id'] == 4) {
                             $getAll = mysqlSelect("SELECT * FROM `virtual_rooms` where  vr_active =1");
                             foreach ($getAll as $OneType) { ?>

                                 <div onclick="window.location = 'rooms_chat?id=<?php echo md5('TINGEHEIUNOIU*****siufniue' . $OneType['vr_id']) ?>'"
                                      class="card col-6">
                                     <div class="card-body">
                                         <div class="row">
                                             <div class="col-12">
                                                 <h1 class="text_head">
                                                     <?php echo $OneType['vr_title']; ?>
<br>
                                                     <i style="font-size: 20px"><?php echo $OneType['vr_tagline']; ?></i>
                                                 </h1>

                                             </div>
                                         </div>
                                     </div>
                                 </div>


                                 <?php
                             }

                         }
                         else{

                         }


                        }
                    }
                    #l2end
                    else if(isset($_GET['l3'])){

                        $checkVB = mysqlSelect("SELECT * FROM `virtual_booth_types_subtypes` where vst_vbt_id = 1 and md5(concat('sefseRNJS',vst_id)) = '".$_GET['l3']."'");
                        if (!is_array($checkVB)) {
                            die("No Virtual Booth Sub Type");
                        }
                        $getAll = mysqlSelect("SELECT * FROM `virtual_booths` 
where vb_vbt_id = 1 and vb_paid =1 and vb_valid =1 and vb_vst_id = ".$checkVB[0]['vst_id']);
                        if (!is_array($checkVB)) {
                            die("No Virtual Booth Found");
                        }

                        foreach ($getAll as $OneType) { ?>

                            <div onclick="window.location = 'society_page?id=<?php echo md5('SALTINGSALTINGEHEIUNOIU*****siufniue' . $OneType['vb_id']) ?>'"
                                 class="card col-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="text_head">
                                                <?php echo $OneType['vb_name']; ?>
                                            </h1>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php
                        }
                    }




                    ?>

                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery.min.js"></script>
    <script>
        $( document ).ready(function() {

            $("body").fadeIn(1500);

        });



    </script>

    <script src="assets/js/bootstrap.min.js"></script>

    </body>
    </html>

    <?php
} else{
        ?>
        <html lang="en">
        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
        </head>
        <body style="display: none">

        <br><br>
        <br><br>
        <br><br>
        <h1 class="text-center">Frestive Virtual Experience</h1>
        <h3 class="text-center">Navigational Ease is a moment away ...</h3>
        <div data-role="cube"></div>

        <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>

        <script src="assets/js/jquery.min.js"></script>
        <script>
            $( document ).ready(function() {
                $("body").fadeIn("slow");
            });
            var delay = 3000;
            setTimeout(function(){
                $("body").fadeOut("slow");
            }, delay);

            var delay = 4000;
            setTimeout(function(){ window.location = "virtualstreet2?l1"; }, delay);
        </script>

        <br>
        </body>
        </html>

        <?php

}
?>