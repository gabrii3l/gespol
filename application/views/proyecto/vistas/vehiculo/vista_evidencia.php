
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img style="width:3  0px; height:30px;" src="<?php echo base_url("assets/images/icons/x.png"); ?>" alt="Los Tejos" /></a>   </button>
        <h4 class="modal-title" id="mySmallModalLabel">Evidencia Imágenes</h4>
    </div>
<div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
    
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-captions" data-slide-to="1"></li>

    </ol>
    <div role="listbox" class="carousel-inner">
        <div class="item active">
            <?php if($evidencia1 <> ""){ ?>
            <img src="<?php echo base_url() ?>Evi/<?php echo $evidencia1; ?>" alt="First slide image">
            <?php } ?>
            <!--														<div class="carousel-caption">
                                                                                                                                    <h3 class="text-white font-600">First slide label</h3>
                                                                                                                                    <p>
                                                                                                                                            Nulla vitae elit libero, a pharetra augue mollis interdum.
                                                                                                                                    </p>
                                                                                                                            </div>-->
        </div>													
        <div class="item">
            
            <?php if($evidencia2 <> ""){ ?>
            <img src="<?php echo base_url() ?>evi/<?php echo $evidencia2; ?>" alt="First slide image">
            <?php } ?>
          
            <!--														<div class="carousel-caption">
                                                                                                                                    <h3 class="text-white font-600">Third slide label</h3>
                                                                                                                                    <p>
                                                                                                                                            Praesent commodo cursus magna, vel scelerisque nisl consectetur.
                                                                                                                                    </p>
                                                                                                                            </div>-->
        </div>
    </div>
    <a href="#carousel-example-captions" role="button" data-slide="prev" class="left carousel-control"> <span aria-hidden="true" class="fa fa-angle-left"></span> <span class="sr-only">Previous</span> </a>
    <a href="#carousel-example-captions" role="button" data-slide="next" class="right carousel-control"> <span aria-hidden="true" class="fa fa-angle-right"></span> <span class="sr-only">Next</span> </a>
</div>
