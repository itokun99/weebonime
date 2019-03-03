<?php include 'head.php';?>
<!-- breadcrumbs -->
<div class="col-12 col-sm-12 col-md-12 col-lg-12">
   <div class="breadcrumbs">
      <ul>
         <li><a href="dashboard">Home</a></li>
         /
         <li class="current"><a href="#">Genre List</a></li>
      </ul>
   </div>
</div>
<!-- breadcrumbs -->
<!-- content-->
<div id="parent" class="col-12 col-sm-12 col-md-12 col-lg-12">
   <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-8">
         <div class="flat-card mb-4">
            <div class="flat-card-header">
               <h4 class="flat-card-title">EDITOR TEXT 
                  <button type="button" class="btn btn-primary btn-sm float-right">Publish</button>
               </h4>
            </div>
            <div class="flat-card-body">
               <textarea id="sinop">Next, get a free Tiny Cloud API key!</textarea>
            </div>
         </div>
      </div>
      <!--SIDE NOTIF-->
      <div class="col-12 col-sm-12 col-md-6 col-lg-4">
        <div class="flat-card">
   <div class="flat-card-header">
      <h4 class="flat-card-title">My Notice</h4>
   </div>
   <div class="flat-card-body">
      <div class="notice-board">
         <ul class="notice-board-list">
            <li>
               <div class="notice-list-item">
                  <div class="notice-list-header">
                     <span class="notice-list-date">16 May 2017</span>
                     <span class="notice-list-arrive">5 min ago</span>
                  </div>
                  <h5 class="notice-list-title">Notice Title Here</h5>
                  <p class="notice-list-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae erat a nisl venenatis pellentesque.</p>
               </div>
            </li>
         </ul>
      </div>
   </div>
</div>
      </div>
   </div>
</div>
<!-- content -->
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<?php include 'footer.php';?>