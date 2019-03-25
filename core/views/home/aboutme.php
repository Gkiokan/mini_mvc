<?php template::header($this); ?>
    <style>
        .aboutme {}
        .portrait .image{ height:300px; border: 1px solid #fff; }
        .portrait .timestamp { font-size:small; text-align:right; font-style:italic; }
    </style>


    <h1>About me</h1>
    <br>
    <section>
    <div class='row aboutme'>
        <div class='col-xs-12 col-md-8'>
            Hi guys, there are not many stuff out I could tell you about,
            but for thoose who wanna know more about me, can read it here.
            <br><br>
            I was born in Greek in 1989 and I'm living in Germany since 1990.
            I made my regulary school up to the 10th grade of the middle School
            and finished it in 2006.
            <br><br>
            After some appliying I wouldn't been take as a Programmer as I wish,
            so I've started to programm myself. The very first version of GkiokanNET
            was back in 2006 in almost pure core Javascript, with login functions
            and other networkshare drive options via the Web.
            <br><br>
            However on this Times back noone could think about cloud System or
            even a big Social Community like facebook, twitter, google are now.
            <br><br>
            I also didn't gave up and got a mini-job after my school finish,
            which I have updated quite quickly and changed to BMW in Munich-Freimann
            as a Car Refiner. I worked there for almost 1 Year and expand myself
            again to a Truck Refiner, probably done cuz of the more money for the same job.
            I could even work side by side with SIXT for Mercedes-Benz as a Transferdriver,
            it was really cool and rich in variety.
            <br><br>
            In 2008 I has been called to the Army in greek. Now, after 8 Years
            I can still tell you, it was the best choise I've ever made. I can
            recommend it to everyone who wanna archiev some expanded goals in his life.
            On my turn I was able to use almost all possible opportunities like
            driving a Tank, using a Bazooka, Fire practise with my G3A3 (build 88), etc.
            More to see on my Gallery for the Army.
            <br><br>
            [...]
            <br><br>
            <br><br>
            Now in the Past, I'm a Developer employe since October 2013 by IDH-online,
            and I'm proud to be a Part of the Company.
            <br><br>
            More expanded Autobiographie soon.<br>
            Thanks and best wishes<br>
            Gkiokan.
        </div>
        <div class='col-xs-12 col-md-4'>
            <div class='portrait'>
                <div class='image' style='background:url(<?=$this->picture();?>) center center no-repeat; background-size:cover'></div>
                <div class='timestamp'>&copy Gkiokan 2013 in Munich</div>
            </div>
        </div>
    </div>
    </section>

    <script>
        $(function(){
        var me_skills_desc = $('.me_skills_desc');
        $('.me_skills_content i').hover(function(){
                            var desc = $(this).attr('data-desc');
                            if (!desc) desc = "...";
                            me_skills_desc.fadeOut();
                            me_skills_desc.html(desc);
                            me_skills_desc.fadeIn(800);
                                },
                                function(){
                            me_skills_desc.fadeOut(300);
                            });
    });
    </script>

<?php template::footer(); ?>
