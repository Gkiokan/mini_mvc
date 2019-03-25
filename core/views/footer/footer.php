<?php /* * * * * * * * * * * * *
       * Project: Gkiokan NET v5.1 - Simple Styling Promote
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net
       * Date: 09.09.2014
       * * * * * * * * * * * * */
?>
        </div>
    </div>

    <footer class='footer'>
        <div class='container'>
        <div class='row'>
            <div class='col-xs-6 col-sm-3'>
                <b>Basic Information</b>
                <br>
                Gkiokan.NET v5.1<br>
                &copy; by Gkiokan Sali 2006 - <?=date('Y', time());?><br>
                All rights reserved.<br>

            </div>
            <div class='col-xs-6 col-sm-3'>
                <b>Date & Time & Server Info</b><br>
                <span id='footer_time'><?=date('d.m.Y H:i:s', time());?></span><br>
                <span id='footer_server_status'>Server Status <span class='label label-success'>On</span></span><br>
                <span id='footer_server_api'>Server API <span class='label label-danger'>Off</span></span><br>
                <span id='footer_server_register'>Register <span class='label label-danger'>Off</span></span><br>
                <span id='footer_server_login'>Login <span class='label label-danger'>Off</span></span><br>

            </div>
            <div class='col-xs-6 col-sm-3'>
                <b></b>
            </div>
            <div class='col-xs-6 col-sm-3'>
                <b>Sitemap</b><br>
                <ul class='footer_sitemap'>
                    <li><a href='/'>Home</a></li>
                    <li><a href='/aboutme'>About Me</a></li>
                    <li><a href='/project'>Projects</a></li>
                    <li class='hide'><a href='/#updates'>Updates</a></li>
                    <li class='hide'><a href='/dev/'>Developing Enviroment</a></li>
                </ul>
            </div>
        </div>
        </div>
    </footer>

    <script src='<? get_base_url();?>/assets/js/gkiokan_parallex.js'></script>
    <script src='<? get_base_url();?>/assets/js/gkiokan_clock.js'></script>
    <script src='<? get_base_url();?>/assets/js/gkiokan_navigation.js'></script>
    <script src='<? get_base_url();?>/assets/js/gkiokan_js_launch.js'></script>
    </body>
</html>
