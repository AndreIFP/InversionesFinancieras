<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Nav-tabs</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'><link rel="stylesheet" href="./cssperfil/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body>
   <div class="container">
      <div class="page-header">
         <ul class="nav">
            <li class="settings-title">
               <h1>User Settings</h1
            </li>
            <!-- notification dropdown -->      
            <li class="message-nav dropdown">
               <a href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fa fa-bell-o">
                  <span class="badge">2</span>
                  </i>
                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                     <li class="notification-title">
                        <h4>Notification</h4>
                     </li>
                     <ul class="notification-list">
                        <li class="notification-item">
                           <a class="notification-anchor" href="#">
                              <span class="notification-img">
                                 <img src="http://lorempixel.com/output/nature-q-g-640-480-6.jpg"/>
                               </span>
                                 <p class="notification-user">
                                 <strong>Anh Nguyen</strong> |
                                 <span class="timestamp">15 mins ago</span>
                                 </p>
                                 <p class="notification-type">
                                    Robert sent you a message
                                 </p>
                                 <p class="notification-project">
                                    Project <span class="project-name">Videographer - Kickstarter</span>
                                 </p>
                           </a>
                        </li>
                        <li class="notification-item">
                           <a class="notification-anchor" href="#">
                              <span class="notification-img">
                                 <img src="http://lorempixel.com/output/nature-q-g-640-480-6.jpg"/>
                               </span>
                                 <p class="notification-user">
                                 <strong>Anh Nguyen</strong> |
                                 <span class="timestamp">15 mins ago</span>
                                 </p>
                                 <p class="notification-type">
                                    Robert hired you for the project
                                 </p>
                                 <p class="notification-project">
                                    Project <span class="project-name">Videographer - Kickstarter</span>
                                 </p>
                           </a>
                        </li>
                        <li class="notification-item">
                           <a class="notification-anchor" href="#">
                              <span class="notification-img">
                                 <img src="http://lorempixel.com/output/nature-q-g-640-480-6.jpg"/>
                               </span>
                                 <p class="notification-user">
                                 <strong>Anh Nguyen</strong> |
                                 <span class="timestamp">15 mins ago</span>
                                 </p>
                                 <p class="notification-type">
                                    Robert marked project complete
                                 </p>
                                 <p class="notification-project">
                                    Project <span class="project-name">Videographer - Kickstarter</span>
                                 </p>
                           </a>
                        </li>
                        <li class="notification-item">
                           <a class="notification-anchor" href="#">
                              <span class="notification-img">
                                 <img src="http://lorempixel.com/output/nature-q-g-640-480-6.jpg"/>
                               </span>
                                 <p class="notification-user">
                                 <strong>Anh Nguyen</strong> |
                                 <span class="timestamp">15 mins ago</span>
                                 </p>
                                 <p class="notification-type">
                                    Robert archived the project
                                 </p>
                                 <p class="notification-project">
                                    Project <span class="project-name">Videographer - Kickstarter</span>
                                 </p>
                           </a>
                        </li>
                         <li class="notification-item">
                           <a class="notification-anchor" href="#">
                              <span class="notification-img">
                                 <img src="http://lorempixel.com/output/nature-q-g-640-480-6.jpg"/>
                               </span>
                                 <p class="notification-user">
                                 <strong>Anh Nguyen</strong> |
                                 <span class="timestamp">15 mins ago</span>
                                 </p>
                                 <p class="notification-type">
                                    Robert funded the project
                                 </p>
                                 <p class="notification-project">
                                    Project <span class="project-name">Videographer - Kickstarter</span>
                                 </p>
                           </a>
                        </li>
                     </ul>
                     <li class="notification-footer"><h4><a>View All</a></h4></li>
                  </ul>
               </a>
            </li>
            <!-- end -->
            <!-- Filter -->      
            <li class="dropdown filter-sort">
                  <a id="filter-sort-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                   Sort by <i class="fa fa-caret-down">
                  </i>
                  </a>   
                  <ul class="dropdown-menu sorting dropdown-menu-right" aria-labelledby="filter-sort-dropdown">
                     <ul class="filter-sort-list">
                        <li class="filter-sort-item">
                           <a class="">Date - Most recent first</a>
                        </li>
                        <li class="filter-sort-item">
                           <a class="">Date - Oldest first</a>
                        </li>
                        <li class="filter-sort-item">
                           <a class="">Budget - Low to High</a>
                        </li>
                        <li class="filter-sort-item">
                           <a class="">Budget - High to Low</a>
                        </li>
                     </ul>
                  </ul>
               </a>
            </li>
            <!-- end Filter -->      
         </ul> 
      </div>
      <div class="row">
         <div class="col-md-11">
            <div class="panel with-nav-tabs panel-default">
               <div class="panel-heading single-project-nav">
                  <ul class="nav nav-tabs"> 
                   <li class="active">
                      <a href="#user-profile-info" data-toggle="tab">Account Details</a>
                   </li>
                   <li>
                      <a href="#user-profile-payments" data-toggle="tab">Payment</a>
                   </li>
               </ul>
            </div>
               <div class="panel-body">
                 <div class="tab-content">
                  <div class="tab-pane fade in active" id="user-profile-info">
                     <div class="row">
                        <div class="col-sm-4">
                           <label>First Name</label>
                           <input type="text" class="input-md form-control">
                        </div>
                        <div class="col-sm-4">
                           <label>Last Name</label>
                           <input type="text" class="input-md form-control">
                        </div>
                        <div class="col-sm-4">
                           <label>Email</label>
                           <input type="text" class="input-md form-control">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-4">
                           <label>Location</label>
                           <input type="text" class="input-md form-control">
                        </div>
                        <div class="col-sm-4">
                           <label>Website</label>
                           <input type="text" class="input-md form-control">
                        </div>
                        <div class="col-sm-4">
                           <label>Contact Number</label>
                           <input type="text" class="input-md form-control">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-4">
                           <label>Your Short Bio</label>
                           <textarea type="text" row="10" class="input-md form-control"></textarea>
                        </div>
                        <div class="col-sm-4">
                           <label>Profile Photo</label>
                        </div>
                        <div class="col-sm-4">
                           <label>Background Image</label>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="user-profile-payments">
                     <p>
                        We will take care of your payment process so you don’t need to worry about chasing up clients after every single project. We will do our best to ensure that you get paid fairly and on a timely basis.
                      <br>
                      <br>
                       To set up the payment, please click on “Connect with Stripe” button below and follow the instructions. It shouldn’t take more than 15  minutes to do so.
                      <br>
                      <br>
                      If you have any questions, please don’t hesitate to reach out to us at hello@kapcher.co.
                     </p>  
                     <p>
                     <strong>Stripe Escrow Payment:
                       <span class="stripe-status">
                         Connected!
                     </strong>
                   </p>
                   <a class="stripe-connect" href="/auth/stripe_connect"></a>     
                  </div>
                  <div class="tab-pane fade" id="user-profile-examples">
                    <div class="btn-Upload-group">
                        <a class="btn Upload flat btn-create btn-small"><i class="fa fa-camera"></i>  Upload Photo</a>
                        <a href="#upload-video-url" data-toggle="modal" class="btn Upload flat btn-create btn-small"><i class="fa fa-video-camera"></i> Add Video URLs</a>
                   </div>
                    <ul class="asset-list" id="multi">
                     <li class="photo">
                       <div class="asset-loading">
                         <img src="http://lorempixel.com/output/abstract-q-c-640-480-8.jpg">
                       <div class="cta-delete"><i class="fa fa-trash-o"></i></div>
                       </div>   
                     </li>
                     <li class="photo">
                       <div class="asset-loading">
                         <img src="http://lorempixel.com/output/people-q-g-640-480-10.jpg" />
                         <div class="cta-delete video"><i class="fa fa-play"></i></div>
                       </div>
                     </li>
                     <li class="photo">
                       <div class="asset-loading">
                         <img src="http://lorempixel.com/output/people-q-g-640-480-10.jpg" />
                         <div class="cta-delete video"><i class="fa fa-play"></i></div>
                       </div>
                     </li> 
                   </ul> 
                  </div>
                  <div class="tab-pane fade" id="user-profile-skills">
                    <h4>
                       What do you specialise in?
                    </h4>
                     <p>
                      In a few keywords, tell us what your skills are. These tags will be displayed on your portfolio page so make sure you choose wisely.
                     </p>
                     <input class="long" id="skills" name="skill-input" type="text"></input>
                     <a class="btn add-skills flat btn-create btn-small" href="#">
                       Add
                     </a>
                     <div class="skill-zone" style="margin-top: 20px; height:50px">
                        <span class="label label-info">
                           Portrait
                         <i class="fa fa-times remove-skill-profile"></i>
                       </span>
                        <span class="label label-info">
                           Landscape
                         <i class="fa fa-times remove-skill-profile"></i>
                       </span>
                     </div>
                  </div>
              </div>
              <div class="actions">
                 <a class="btn flat btn-create">Save</a>
              </div>
         </div>
         </div>
         </div>
      </div>
   </div>
<!-- modal -->
<div class="modal fade" id="upload-video-url" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body payment">
               <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
               <h3 class="title"><i class="fa fa-video-camera"></i> Add video URLs</h3>
               <p>Add Vimeo and Youtube links of your recent and best videos. These will be displayed on your portfolio page so choose the works that reflects your talents and expertise. First impression is important so make it count.</p>
               <input class="input-form" type="text" placeholder="http://">
               <p class="add-link"><a>+ Add more links</a></p>
               <p class="align-center"><a class="btn flat btn-create">Save</a></p>
            </div>
        </div>
    </div>
</div>  
</body>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.4.2/Sortable.min.js'></script>
</body>
</html>