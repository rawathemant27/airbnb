<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>All Subcategory</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Subcategory</a>
                        </li>
                        <li class="active">
                            <strong>All Subcategory</strong>
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
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Tier</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                               <?php if(count($allsubCat)){
                                 $i = 1;
                                 foreach ($allsubCat as $key => $value) {
                                  ?>
                                <tr class="gradeX">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value->categoryName; ?></td>
                                    <td><?php echo $value->subCategoryName; ?></td>
                                    <td><?php echo $value->tier; ?></td>
                                    <td>
                                       <?php if(isset($value->subStatus) && $value->subStatus == 1){ ?>
                                         <a onclick="changeStatus(<?php echo $value->subCategoryId; ?>,'subCategoryId', 'subcategory', '<?php echo $value->subStatus; ?>')" class="btn btn-info btn-rounded" href="javascript:void(0)">Active</a>
                                       <?php }else{ ?>
                                         <a onclick="changeStatus(<?php echo $value->subCategoryId; ?>,'subCategoryId', 'subcategory', '<?php echo $value->subStatus; ?>')" class="btn btn-warning btn-rounded" href="javascript:void(0)">Inactive</a>
                                       <?php } ?>
                                    </td>
                                    <td class="center">
                                        <a href="javascript:void(0)" onclick="deleteItem(<?php echo $value->subCategoryId; ?>,'subCategoryId', 'subcategory', 'sub category')" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>

                                        <a href="<?php echo site_url('subCategory/edit_subcategory/').$value->subCategoryId; ?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
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



