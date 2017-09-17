
<?php ?>

<div class="row gallery-row"><!-- Begin Gallery Row --> 

    <div class="span12">
        <h5 class="title-bg">Recent Work 
            <small>That we are most proud of</small>
            <button class="btn btn-mini btn-inverse hidden-phone" type="button">View Portfolio</button>
        </h5>





        <!-- Gallery Thumbnails
        ================================================== -->

        <div class="row clearfix no-margin">
            <ul class="gallery-post-grid holder">

                <?php foreach ($applications as $app) { ?>

                    <!-- Gallery Item  -->
                    <li  class="span3 gallery-item" data-id="id-1" data-type="illustration">
                        <span class="gallery-hover-4col hidden-phone hidden-tablet">
                            <span class="gallery-icons">
                                <a href="img/gallery/gallery-img-1-full.jpg" class="item-zoom-link lightbox" title="Custom Illustration" data-rel="prettyPhoto"></a>
                                <a href="gallery-single.htm" class="item-details-link"></a>
                            </span>
                        </span>
                        <a href="<?php echo $app->getUrl(); ?>"><img src="<?php echo $app->getDisplayImageUrl(); ?>" alt="Gallery"></a>
                        <span class="project-details"><a target="_blank" href="<?php echo $app->getUrl(); ?>"><?php echo $app->title; ?></a> <?php echo $app->short_description; ?></span>
                    </li>

                <?php } ?>

            </ul>
        </div>
    </div>

</div><!-- End Gallery Row -->