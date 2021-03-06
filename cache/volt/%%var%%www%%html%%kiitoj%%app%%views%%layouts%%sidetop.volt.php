
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="http://localhost/KiitOJ/dashboard" class="logo"><b>KIIT Online Judge</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li class="dropdown"><a class="logout" href="http://localhost/KiitOJ/logout">Logout</a></li>
            	</ul>
            </div>

        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a><img src="http://localhost/KiitOJ/public/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $name; ?></h5>
              	  	
                  <li class="mt">
                      <a class="active" href="http://localhost/KiitOJ/dashboard">
                          <i class="fa fa-desktop"></i>
                          <span>Feed</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Practice</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="http://localhost/KiitOJ/dashboard/display/1">Warmup</a></li>
                          <li><a  href="http://localhost/KiitOJ/dashboard/display/2">Beginner</a></li>
			  <li><a  href="http://localhost/KiitOJ/dashboard/display/3">Implementation</a></li>
			  <li><a  href="http://localhost/KiitOJ/dashboard/display/4">Sorting</a></li>
			  <li><a  href="http://localhost/KiitOJ/dashboard/display/5">Greedy</a></li>
			  <li><a  href="http://localhost/KiitOJ/dashboard/display/6">Bit Manipulation</a></li>
			  <li><a  href="http://localhost/KiitOJ/dashboard/display/7">Dynamic programming</a></li>
			  <li><a  href="http://localhost/KiitOJ/dashboard/display/8">Graphs</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-dashboard"></i>
                          <span>Contests</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="http://localhost/KiitOJ/list/contestview/1">Open Contests</a></li>
                          <li><a  href="http://localhost/KiitOJ/list/contestview/2">Archived Contests</a></li>
                          <li><a  href="http://localhost/KiitOJ/list/contestview/3">Upcoming Contests</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

<?php echo $this->getContent(); ?>
