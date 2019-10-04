<?php require 'templates/header.php'; ?>
<!-- divider -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="blankline">
            </div>
        </div>
    </div>
</div>
<!-- end divider -->
<!-- parallax  -->
<div id="parallax1" class="parallax text-light text-center marginbot50" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row appear stats">
            <div class="col-xs-6 col-sm-3">
                <div class="align-center color-white txt-shadow">
                    <div class="icon">
                        <i class="fa fa-file-text-o fa-5x"></i>
                    </div>
                    <strong id="counter-coffee" class="number">10</strong><br />
                    <span class="text">Blogs</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4">
                <div class="align-center color-white txt-shadow">
                    <div class="icon">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <strong id="counter-music" class="number">5</strong><br />
                    <span class="text">Categories</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4">
                <div class="align-center color-white txt-shadow">
                    <div class="icon">
                        <i class="fa fa-trophy fa-5x"></i>
                    </div>
                    <strong id="counter-clock" class="number">20</strong><br />
                    <span class="text">Leads</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-6">
                    <div id="chart_div" style="position: relative;width: 100%; height: 500px"></div>
                </div>
                <div class="col-sm-6">
                    <div id="chart_div2" style="position: relative;width: 100%; height: 500px"></div>
                </div>
            </div>
            
<!--            <div class="row" style="margin-top: 50px">
                <div class="col-sm-6">
                    <h4>Testimonials</h4>
                    <div class="testimonialslide clearfix flexslider">
                        <ul class="slides">
                            <li>
                                <blockquote>
                                    Usu ei porro deleniti similique, per no consetetur necessitatibus. Ut sed augue docendi alienum, ex oblique scaevola inciderint pri, unum movet cu cum. Et cum impedit epicuri
                                </blockquote>
                                <h4>Daniel Dan <span>&#8213; MA System</span></h4>
                            </li>
                            <li>
                                <blockquote>
                                    Usu ei porro deleniti similique, per no consetetur necessitatibus. Ut sed augue docendi alienum, ex oblique scaevola inciderint pri, unum movet cu cum. Et cum impedit epicuri
                                </blockquote>
                                <h4>Mark Wellbeck <span>&#8213; AC Software </span></h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#one" data-toggle="tab"><i class="icon-briefcase"></i> One</a></li>
                        <li><a href="#two" data-toggle="tab">Two</a></li>
                        <li><a href="#three" data-toggle="tab">Three</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="one">
                            <p><img src="img/dummy1.jpg" class="pull-left" alt="" />
                                <strong>Augue iriure</strong> dolorum per ex, ne iisque ornatus veritus duo. Ex nobis integre lucilius sit, pri ea falli ludus appareat. Eum quodsi fuisset id, nostro patrioque qui id. Nominati eloquentiam in mea.
                            </p>
                            <p>
                                No eum sanctus vituperata reformidans, dicant abhorreant ut pro. Duo id enim iisque praesent, amet intellegat per et, solet referrentur eum et.
                            </p>
                        </div>
                        <div class="tab-pane" id="two">
                            <p><img src="img/dummy1.jpg" class="pull-right" alt="" /> Tale dolor mea ex, te enim assum suscipit cum, vix aliquid omittantur in. Duo eu cibo dolorum menandri, nam sumo dicit admodum ei. Ne mazim commune honestatis cum, mentitum phaedrum sit
                                et.
                            </p>
                            <p>Lorem ipsum dolor sit amet, vel laoreet pertinacia at, nam ea ornatus ocurreret gubergren. Per facete graecis eu.</p>
                        </div>
                        <div class="tab-pane" id="three">
                            <p>Lorem ipsum dolor sit amet, vel laoreet pertinacia at, nam ea ornatus ocurreret gubergren. Per facete graecis eu. </p>
                            <p>
                                Cu cum commodo regione definiebas. Cum ea eros laboramus, audire deseruisse his at, munere aeterno ut quo. Et ius doming causae philosophia, vitae bonorum intellegat usu cu.
                            </p>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>

<!-- divider -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="solidline">
            </div>
        </div>
    </div>
</div>
<!-- end divider -->
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart','bar']});
google.charts.setOnLoadCallback(drawVisualization);
function drawVisualization() {
    // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Leads','Average'],
        ['Jan\'19',  10,10],
        ['Feb\'19',  20,20],
        ['Mar\'19',  30,30],
        ['Apr\'19',  40,40],
        ['May\'19',  25,25],
        ['Jun\'19',  60,60],
        ['Jul\'19',  79,79],
        ['Aug\'19',  55,55],
        ['Sep\'19',  66,66],
        ['Oct\'19',  82,82],
        ['Nov\'19',  99,99],
        ['Dec\'19',  115,115]
    ]);

    var options = {
        title : 'Monthly Leads',
        vAxis: {title: 'Numbers'},
        hAxis: {title: 'Month'},
        seriesType: 'bars',
        chartArea: {'width': '100%', 'height': '80%'},
        series: {1: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

function drawColumns() {
    var data = google.visualization.arrayToDataTable([
        ['Months','Un-Subscriptions', 'Subscriptions' ],
        ['Jan\'19',  10,5],
        ['Feb\'19',  20,6],
        ['Mar\'19',  30,0],
        ['Apr\'19',  40,10],
        ['May\'19',  25,20],
        ['Jun\'19',  60,0],
        ['Jul\'19',  79,3],
        ['Aug\'19',  55,5],
        ['Sep\'19',  66,8],
        ['Oct\'19',  82,10],
        ['Nov\'19',  99,0],
        ['Dec\'19',  115,4]
    ]);

    var options = {
        title : 'Subscriptions',
//        chart: {
//            title: 'Subscriptions',
//            subtitle: 'Number of subscribers and unsubscribers',
//        },
        chartArea: {
            'width': '100%',
            'height': '80%'
        },
        legend: { position: 'top' },
        colors: ['#9575cd', '#33ac71'],
    };

    var chart = new google.charts.Bar(document.getElementById('chart_div2'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
}

google.charts.setOnLoadCallback(drawColumns);
</script>
<?php require 'templates/footer.php';