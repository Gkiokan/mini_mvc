<?php
/*
 * Project View.
 *
 */

    $this->template->title('my Projects | Gkiokan.NET');
    $this->template->set('description', 'Discover my Projects and be a part of it');
    template::header($this); ?>

    <h1>my Projects </h1>
    <br>
    Have a look on my recent Projects. <br>
    There are free to use ones, and login required ones to manage your Profile Data.<br>
    Also feel free to try out my Beta Projects and tell me your opinion about it.<br>
    <br>

    <div class='row project_access'>

      <div class='col-xs-12 co-sm-6 col-md-4 col-lg-3'><div class='project animate'>
        <a href="/berichtsheft">
          <div class="project_header" style="background: url(https://www.muenchen.ihk.de/de/bildung/Bilder/berichtsheft-artikel.jpg) center center no-repeat; background-size:cover">
            <div class="title"><h4>Berichtsheft System</h4></div>
          </div>
          <div class='project_footer'>
            <div class='project_status'><div class='project_status_free bg-success text-success'>Free to Use</div></div>
            <div class='project_option'><div class='project_status_default bg-info text-info'> Open Beta v.0.3.2 </div></div>
          </div>
        </a>
      </div></div>

      <div class='col-xs-12 co-sm-6 col-md-4 col-lg-3'><div class='project animate'>
        <a href="http://svr.gkiokan.net/q_generator" target='_blank'>
          <div class="project_header" style="background: url('https://lh5.googleusercontent.com/-D96Rffc27HM/VLKRD4Asc_I/AAAAAAAAAEE/3eEhqpiRn-Y/w1044-h531-no/Q%2BGenerator%2Bopen%2Bbeta%2Bv.0.1.jpg') center center no-repeat; background-size:cover">
            <div class="title"><h4>Q Generator</h4></div>
          </div>
          <div class='project_footer'>
            <div class='project_status'><div class='project_status_free bg-success text-success'> Free to use </div></div>
            <div class='project_option'><div class='project_status_default bg-info text-info'>Open Beta v.0.1.3 </div></div>
          </div>
        </a>
      </div></div>

      <div class='col-xs-12 co-sm-6 col-md-4 col-lg-3'><div class='project animate'>
        <a href="#">
          <div class="project_header" style="background: url('https://lh5.googleusercontent.com/-Rpl0QZ-C3N8/VLKVKRY4w_I/AAAAAAAAAE4/mj1rWsfozqI/w1044-h531-no/dbas.jpg') center center no-repeat; background-size:cover">
            <div class="title"><h4>Database as Service | DBaS</h4></div>
          </div>
          <div class='project_footer'>
            <div class='project_status'><div class='project_status_free bg-warning text-warning'>ReCreating Alpha</div></div>
            <div class='project_option'><div class='project_status_default bg-danger text-danger'> Public Version soon </div></div>
          </div>
        </a>
      </div></div>

      <div class='col-xs-12 co-sm-6 col-md-4 col-lg-3'><div class='project animate'>
        <a href="http://svr.gkiokan.net/js_game_engine" target='_blank'>
          <div class="project_header" style="background: url('https://lh6.googleusercontent.com/dAMjSeeaF45Z0K6m1gcsxRKMBVWAQSvpaAxzD3IRfg=w1044-h700-no') center center no-repeat; background-size:cover">
            <div class="title"><h4>Javascript Game Engine</h4></div>
          </div>
          <div class='project_footer'>
            <div class='project_status'><div class='project_status_free bg-success text-success'> Free to use</div></div>
            <div class='project_option'><div class='project_status_default bg-info text-info'> v.0.0.3 </div></div>
          </div>
        </a>
      </div></div>

    </div>



<?php template::footer(); ?>
