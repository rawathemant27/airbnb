<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Add Blog</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Blog</a>
                        </li>
                        <li class="active">
                            <strong>Add New Blog</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">

                         <?php if ($this->session->flashdata('success')) { 
                             echo getMessage('success', $this->session->flashdata('success'));
                         }  if ($this->session->flashdata('error')) { 
                             echo  getMessage('error', $this->session->flashdata('error'));
                         }  if ($this->session->flashdata('info')) { 
                             echo  getMessage('info', $this->session->flashdata('info'));
                         }?>

                        <div class="ibox-content">
                         <form action="<?php echo site_url('blog/addblog'); ?>" role="form" id="addcategory" method="post" class="validate form-horizontal" enctype="multipart/form-data">

                                  <div class="form-group"><label class="col-sm-2 control-label">Blog Title</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" placeholder="Blog Title" name="blog_title" id="blog_title">
                                      <?php echo form_error('blog_title'); ?>
                                    </div>
                                  </div>

                                  <div class="form-group"><label class="col-sm-2 control-label">Blog content</label>
                                    <div class="col-sm-10">
                                      <textarea placeholder="Write something.." id="blog_body" name="blog_body"></textarea>
                                      <?php echo form_error('blog_body'); ?>
                                    </div>
                                   </div>


                    
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="submit" name="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
        <script type="text/javascript">
             CKEDITOR.replace( 'blog_body' );
        </script>
                 
        <script>
          $().ready(function() {

            // validate signup form on keyup and submit
            $("#addcategory").validate({
              rules: {
                    blog_title:        "required"

              },
              messages: { 
                blog_title: "Please enter blog title"

              },

              debug: false,
              errorClass: 'error error-message',
              validClass: 'success',
              errorElement: 'span',
              highlight: function(element, errorClass, validClass) {
                $(element).parents("div.control-group").addClass(errorClass).removeClass(validClass);
              },
              unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".error").removeClass(errorClass).addClass(validClass);
              }

            });

          });
  </script>