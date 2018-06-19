<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>All Category</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Category</a>
                        </li>
                        <li class="active">
                            <strong>All Category</strong>
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
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Blog title</th>
                                <th>Content</th>
                                <th>Date</th>
                                <th>Active/Inactive</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                               <?php if(count($allblog)){
                                 $i = 1;
                                 foreach ($allblog as $key => $value) {
                                  ?>
                                <tr class="gradeX">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value->blog_title; ?></td>
                                    <td><?php echo $value->blog_body; ?></td>
                                    <td><?php echo $value->blog_createdDateTime; ?></td>
                                    <td>
                                       <?php if(isset($value->Status) && $value->Status == 1){ ?>
                                         <a onclick="changeStatus(<?php echo $value->blog_id; ?>,'blog_id', 'blog', '<?php echo $value->Status; ?>')" class="btn btn-info btn-rounded" href="javascript:void(0)">Active</a>
                                       <?php }else{ ?>
                                         <a onclick="changeStatus(<?php echo $value->blog_id; ?>,'blog_id', 'blog', '<?php echo $value->Status; ?>')" class="btn btn-warning btn-rounded" href="javascript:void(0)">Inactive</a>
                                       <?php } ?>
                                    </td>
                                    <td class="center">
                                        <a href="javascript:void(0)" onclick="deleteItem(<?php echo $value->blog_id; ?>,'blog_id', 'blog', 'Blog')" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>

                                        <a href="<?php echo site_url('blog/edit_blog/').$value->blog_id; ?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </td>
                                </tr>
                                <?php $i++; } } ?>
                      
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
            </div>

        </div>



