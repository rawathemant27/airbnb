    <!-- Page Content -->
        <section id="page-content" class="sidebar-right">
            <div class="container">
                <div class="row">
                    <!-- content -->
                    <div class="content col-md-12">
                        <!-- Blog -->
                        <div id="blog" class="single-post">
                            <!-- Post item-->
                            <div class="post-item">
                                <div class="post-item-wrap">
                                    <div class="post-image">
                                        <a href="#">
                                            <img alt="" src="images/blog/1.jpg">
                                        </a>
                                    </div>
                                    <div class="post-item-description">
                                       <?php // print_r($blog); ?>
                                        <h2><?php echo $blog->blog_title; ?></h2>
                                        <div class="post-meta">

                                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?php echo $blog->blog_createdDateTime; ?></span>


                                            <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33 Comments</a></span>

                                          <!--   <span class="post-meta-category"><a href=""><i class="fa fa-tag"></i>Lifestyle, Magazine</a></span> -->

                                            <div class="post-meta-share">
                                                <a class="btn btn-xs btn-slide btn-facebook" href="#">
                                                    <i class="fa fa-facebook"></i>
                                                    <span>Facebook</span>
                                                </a>
                                                <a class="btn btn-xs btn-slide btn-twitter" href="#" data-width="100">
                                                    <i class="fa fa-twitter"></i>
                                                    <span>Twitter</span>
                                                </a>
                                                <a class="btn btn-xs btn-slide btn-instagram" href="#" data-width="118">
                                                    <i class="fa fa-instagram"></i>
                                                    <span>Instagram</span>
                                                </a>
                                                <a class="btn btn-xs btn-slide btn-googleplus" href="mailto:#" data-width="80">
                                                    <i class="fa fa-envelope"></i>
                                                    <span>Mail</span>
                                                </a>
                                            </div>
                                        </div>
                                       <p><?php echo $blog->blog_body; ?></p>
                                    </div>
                                   <!--  <div class="post-tags">
                                        <a href="#">Life</a>
                                        <a href="#">Sport</a>
                                        <a href="#">Tech</a>
                                        <a href="#">Travel</a>
                                    </div> -->
                                    <div class="comments" id="comments">
                                        <div class="comment_number">
                                            Comments <span>(2)</span>
                                        </div>

                                        <div class="comment-list">
                                            <!-- Comment -->
                                            <div class="comment" id="comment-1">
                                                <div class="image"><img alt="" src="images/blog/author.jpg" class="avatar"></div>
                                                <div class="text">
                                                    <h5 class="name">John Doe</h5>
                                                    <span class="comment_date">Posted at 15:32h, 06 December</span>
                                                    <!-- <a class="comment-reply-link" href="#">Reply</a> -->
                                                    <div class="text_holder">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <!-- end: Comment -->
                                            <!-- Comment -->
                                            <div class="comment" id="comment-2">
                                                <div class="image"><img alt="" src="images/blog/author2.jpg" class="avatar"></div>
                                                <div class="text">
                                                    <h5 class="name">John Doe</h5>
                                                    <span class="comment_date">Posted at 15:32h, 06 December</span>
                                                    <!-- <a class="comment-reply-link" href="#">Reply</a> -->
                                                    <div class="text_holder">
                                                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end: Comment -->
                                        </div>
                                    </div>

                                    <div class="respond-form" id="respond">
                                        <div class="respond-comment">
                                            Leave a <span>Comment</span></div>
                                        <form class="form-gray-fields">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="upper" for="name">Name</label>
                                                        <input class="form-control required" name="senderName" placeholder="Enter name" id="name" aria-required="true" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="upper" for="email">Email</label>
                                                        <input class="form-control required email" name="senderEmail" placeholder="Enter email" id="email" aria-required="true" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="upper" for="website">Website</label>
                                                        <input class="form-control website" name="senderWebsite" placeholder="Enter Website" id="website" aria-required="false" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="upper" for="comment">Your comment</label>
                                                        <textarea class="form-control required" name="comment" rows="9" placeholder="Enter comment" id="comment" aria-required="true"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group text-center">
                                                        <button class="btn" type="submit">Submit Comment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Post item-->
                    </div>
                    <!-- end: content -->
                </div>
            </div>
        </section>
        <!-- end: Page Content -->