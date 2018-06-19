<!-- Inspiro Slider -->
<?php  $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];  ?>
<section id="page-title" data-parallax-image="images/parallax/5.jpg">
    <div class="container">
        <div class="page-title">
            <h1>About Us</h1>
            <span>About Us</span>
        </div>
        <div class="breadcrumb">
                    <ul>
                <li><a href="#">Home</a>
                </li>
                
               
                <li class="active"><a href="#">About Us</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!--end: Inspiro Slider -->

<section>
	<div class="container">
      <p><?php echo $pagesdata->about_us; ?></p>
	</div>
</section>
