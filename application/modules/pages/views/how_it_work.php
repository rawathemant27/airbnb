<?php  $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];  ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>How it work</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>How it work</a>
                        </li>
                        <li class="active">
                            <strong>How it work</strong>
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
                         <form action="<?php echo site_url('pages/how_it_work'); ?>" role="form" id="addcategory" method="post" class="validate form-horizontal" enctype="multipart/form-data">

                                  <div class="form-group"><label class="col-sm-2 control-label">How it work</label>
                                    <div class="col-sm-10">
                                      <textarea placeholder="How it work" id="how_it_work" name="how_it_work"><?php echo $how->how_it_work; ?></textarea>
                                      <?php echo form_error('how_it_work'); ?>
                                    </div>
                                   </div>

                    
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
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
             CKEDITOR.replace( 'how_it_work' );
        </script>
                 
        <script>
          $().ready(function() {

            // validate signup form on keyup and submit
            $("#addcategory").validate({
              rules: {
                    how_it_work:        "required"

              },
              messages: { 
                how_it_work: "Please enter content"

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