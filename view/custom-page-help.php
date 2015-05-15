<?php get_header(array(
                  'title'=>'My new Title',
                  'sub'=>'Try this additonal Information Array out. now.',
                  'background'=>'assets/images/black_background.jpg',
                  'style'=>'color:#fff'
                  )) ?>

  <div class='container'>
  <h2>You need Help? <small> No Problem! </small></h2>
  <br>
  <br>
  To ensure you get a different Appereance, I've made a little change on this page.<br>
  This page has an additional Header Information Array, which Contains a <br>
  <b>Title</b>, <b>Sub</b>, and a <b>Header Background</b> Image.<br>
  <br>
  This is the pretty code in the beginning of this page.<br>
  <div class='row'>
  <div class='col-xs-12'>
  <pre>
    get_header(array(
                'title'=>'My new Title',
                'sub'=>'Try this additonal Information Array out. now.',
                'background'=>'assets/images/black_background.jpg',
                'style'=>'color:#fff'
              ))
  </pre>
  </div></div>
  <br>
  That works as I prepared the Header for that specific Array to look for the Keys in the Array and use it if isset.<br>
  In this way you can define your keys as you want, you just need to associate it from the array to the header.<br>
  The Example has basic variable names of title, sub, background and style, which will be checked if isset <br>
  and then echoed in the right spot. As the Style is an CSS property at all, it will just append to the background.<br>
  <br>


  </div>
<?php get_footer(); ?>
