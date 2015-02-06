<header>
<div class="top">
    <div class="row">
        <div class="col-xs-2 logo1"></div>
        <div class="col-xs-2 logo2"></div>
         <div class="col-xs-8">
          <div class="row">
              <div class="col-xs-9">
              </div>
              <div class="col-xs-1">
                  <div class="site_home"> <?php echo $this->html->link('Home', array('controller'=>'Posts','action'=>'index')); ?></div>
              </div>
              <div class="col-xs-2 site_map">
                  <a href="#"> site map</a>
              </div>
          </div>
          <div class="row">
              <div >
                  <form id="custom-search-form" class="form-search form-horizontal pull-right">
                      <div class="input-append">
                          <input type="text" class="search-query " placeholder="Search">
                          <button type="submit" class="btn">
                              <?php
                                echo $this->Html->image('search.png');
                              ?> 
                          </button>
                      </div>
                  </form> 
              </div>
          </div>
        </div>
    </div>
</div>
<div class="banner"></div>
</header>

<nav class="navbar navbar-default">
<div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header"> 
  </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a class="navbar-brand active" ><?php echo $this->html->link('Welcome(by Atlas)', array('controller'=>'Posts/view/6','action'=>'index')); ?></a></li>
        <li><a href="#">Program <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Travel Iformation</a></li>
        <li><a href="#">Paper Submission</a></li>
        <li><a href="#">Pre confrence activities</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Contact</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>