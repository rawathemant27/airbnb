<!-- Content -->
        <section id="page-content">
            <div class="container">
                <!-- post content -->

                 <?php if ($this->session->flashdata('success')) { 
                             echo getMessage('success', $this->session->flashdata('success'));
                         }  if ($this->session->flashdata('error')) { 
                             echo  getMessage('error', $this->session->flashdata('error'));
                         }  if ($this->session->flashdata('info')) { 
                             echo  getMessage('info', $this->session->flashdata('info'));
                         }?>

                <!-- Page title -->
                <div class="page-title">
                    <h1>Blog</h1>
                    <div class="breadcrumb float-left">
                        <ul>
                            <li><a href="#">Home</a> </li>
                            <li><a href="#">Blog</a> </li>
                            <li class="active"><a href="#">One Column</a> </li>
                        </ul>
                    </div>
                </div>
                <!-- end: Page title -->

                  <?php // print_r($allblog); ?>
                <!-- Blog -->
                <div id="blog" class="grid-layout post-1-columns m-b-30" data-item="post-item">

                <?php  $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];  ?>

                    <!-- Post item-->
                    <?php 
                    if(!empty($allblog)){

                    foreach ($allblog as $key => $value) {

                    ?>
                    <div class="post-item border">
                        <div class="post-item-wrap">

                           <!--  <div class="post-image">
                                <a href="#"> <img alt="" src="images/blog/12.jpg"> </a> <span class="post-meta-category"><a href="">Lifestyle</a></span> 
                             </div> -->

                            <div class="post-item-description"> <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?php echo $value->blog_createdDateTime; ?></span> <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33 Comments</a></span>
                                <h2><a href="#">
                                <?php echo $value->blog_title; ?> </a>
                                </h2>

                                <p><?php echo substr($value->blog_body,0,500); ?>... </p>
                                <a href="<?php echo base_url('blog/single/').$value->blog_id; ?>" class="item-link">Read More <i class="fa fa-arrow-right"></i></a> </div>
                        </div>
                    </div>
                    <?php } }else{ ?>
                        <p>No blog found!</p>
                    <?php } ?>
                    <!-- end: Post item-->


                </div>
                <!-- end: Blog -->

                <!-- Pagination -->
               <!--  <div class="pagination pagination-simple">
                    <ul>
                        <li>
                            <a href="#" aria-label="Previous"> <span aria-hidden="true"><i class="fa fa-angle-left"></i></span> </a>
                        </li>
                        <li><a href="#">1</a> </li>
                        <li><a href="#">2</a> </li>
                        <li class="active"><a href="#">3</a> </li>
                        <li><a href="#">4</a> </li>
                        <li><a href="#">5</a> </li>
                        <li>
                            <a href="#" aria-label="Next"> <span aria-hidden="true"><i class="fa fa-angle-right"></i></span> </a>
                        </li>
                    </ul>
                </div> -->
                <!-- end: Pagination -->

            </div>
            <!-- end: post content -->

        </section>
<!-- end: Content -->
