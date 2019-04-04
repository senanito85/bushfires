

         <!-- Main Header End -->
         <!-- Sidebar Start -->
         <aside class="seipkon-main-sidebar">
            <nav id="sidebar">
               <!-- Sidebar Profile Start -->
               <div class="sidebar-profile clearfix">
                  <div class="profile-avatar">
                     <img src="<?php echo base_url("includes/assets/img/avatar.jpg") ?>" alt="profile" />
                  </div>
                  <div class="profile-info">
                     <h3>Jhon Doe</h3>
                     <p>Welcome Admin !</p>
                  </div>
               </div>
               <!-- Sidebar Profile End -->
               <!-- Menu Section Start -->
               <div class="menu-section">
                  <h3>General</h3>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="../../demos/seipkon-admin-template/index.html">
                        <i class="fa fa-dashboard"></i>
                        Dashboard
                        </a>
                     </li>
                     <li>
                        <a href="#customer" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-user"></i> Customers 
                        </a>
                        <ul  class="list-unstyled collapse" id="customer" aria-expanded="false" style="height: 0px;">
                           <li><a href="<?php echo site_url('Customers/Add'); ?>">Add New Customer</a></li>

                           <li><a href="<?php echo site_url('Customers'); ?>">View All Customers</a></li>
                        </ul>
                     </li>
                      <li>
                        <a href="#product" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-user"></i> Products 
                        </a>
                        <ul  class="list-unstyled collapse" id="product" aria-expanded="false" style="height: 0px;">
                           <li><a href="<?php echo site_url('Products/Add'); ?>">Add New Product</a></li>

                           <li><a href="<?php echo site_url('Products'); ?>">View All Product</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#salesman" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-user"></i> Salesman 
                        </a>
                        <ul  class="list-unstyled collapse" id="salesman" aria-expanded="false" style="height: 0px;">
                           <li><a href="<?php echo site_url('Salesman/Add'); ?>">Add New Salesman</a></li>

                           <li><a href="<?php echo site_url('Salesman'); ?>">View All Salesman</a></li>
                        </ul>
                     </li>                     
     

      
                  </ul>
               </div>

            </nav>
         </aside>