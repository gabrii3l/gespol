
<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-purple">
            <i class="mdi dripicons-document-edit widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase text-white font-600 font-secondary text-overflow" title="Statistics">Infracciones</p>
                <h2 class="text-white"><span data-plugin="counterup"><?php echo $cantinfraccion->CONTADOR ?></span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                <!--<p class="text-white m-0"><b>10%</b> From previous period</p>-->
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-info">
            <i class="mdi mdi mdi-car widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-white text-uppercase font-600 font-secondary text-overflow" title="User Today">Cantidad Vehiculos</p>
                <h2 class="text-white"><span data-plugin="counterup"><?php echo $cantinvehiculos->CONTADOR ?></span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                <!--<p class="text-white m-0"><b>5.6%</b> From previous period</p>-->
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-pink">
            <i class="mdi mdi mdi-car widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase text-white font-600 font-secondary text-overflow" title="Request Per Minute">Patentes Nacionales</p>
                <h2 class="text-white"><span data-plugin="counterup"><?php echo $cantinvehiculosNacionales->CONTADOR ?></span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                <!--<p class="text-white m-0"><b>7.02%</b> From previous period</p>-->
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-success">
            <i class="mdi mdi mdi-car widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-white text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Patentes Extranjeras</p>
                <h2 class="text-white"><span data-plugin="counterup"><?php echo $cantinvehiculosExtranjeros->CONTADOR ?></span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                <!--<p class="text-white m-0"><b>9.9%</b> From previous period</p>-->
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-inverse">
            <i class="mdi mdi mdi-car widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-white text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Sin Patentes</p>
                <h2 class="text-white"><span data-plugin="counterup"><?php echo $cantinvehiculosSinPatente->CONTADOR ?></span> <small><i class="mdi mdi-arrow-up text-white"></i></small></h2>
                <!--<p class="text-white m-0"><b>9.9%</b> From previous period</p>-->
            </div>
        </div>
    </div>
</div>

<!--<div class="row">
    <div class="col-md-15">
        <div class="card-box">
            <div class="map" id="map3"></div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-15">
        <div class="card-box">
            <div class="map" id="hotmap"></div>         
        </div>
    </div>
</div>
<script type="text/javascript">
    start_map3();
</script>-->

<div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <h4 class="m-t-0 m-b-20 header-title"><b>Vista Mapa</b></h4>

            <div class="map" id="map3" ></div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box">
            <h4 class="m-t-0 m-b-20 header-title"><b>Mapa de Calor</b></h4>

           <div class="map" id="hotmap"></div> 
        </div>
    </div>

    <script type="text/javascript">
        start_map3();
    </script>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">Grafico Torta Tipo Infracción</h4>
<!--                                    <p class="text-muted font-14 text-overflow m-b-15">
                If you set the <code>is3D</code> option to <code>true</code>, your
pie chart will be drawn as though it has three dimensions:
            </p>-->

            <div class="google-chart text-center">
                <div class="chart" id="pie-3d-chart"></div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">Grafico Torta Explorado Tipo Infracción</h4>
<!--                                    <p class="text-muted font-14 text-overflow m-b-15">
                You can separate pie slices from the rest of the chart with the <code>offset</code> property of
the <code>slices</code> option:
            </p>-->

            <div class="google-chart text-center">
                <div class="chart" id="3d-exploded-chart"></div>
            </div>
        </div>
    </div>
</div>
end row 

<div class="row">
    <div class="col-lg-4">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">Total Revenue share</h4>
            <div>
                <div id="combine-chart" class="ct-chart ct-golden-section dash-chart"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">Total Revenue share</h4>
            <div class="">
                <div id="roated-chart" class="ct-chart ct-golden-section dash-chart"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">Last 30 days statistics</h4>

            <div class="">
                <div id="donut-chart" class="ct-chart ct-golden-section dash-chart"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">Line chart</h4>
            <p class="text-muted font-14 text-overflow m-b-15">
                You can smooth the lines by setting the <code>curveType</code> option
                to <code>function</code>:
            </p>

            <div class="chart" id="line-chart"></div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">Area Chart</h4>
            <p class="text-muted font-14 text-overflow m-b-15">
                An area chart that is rendered within the browser using
                <code>SVG</code> or
                <code>VML</code>.
                Displays tips when hovering over points.
            </p>

            <div class="chart" id="area-chart"></div>
        </div>
    </div>
</div>
end row 



<div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">Column Chart</h4>
            <p class="text-muted font-14 text-overflow m-b-15">
                A column chart is a vertical bar chart rendered in the browser using SVG or VML, whichever is appropriate for the user's browser.
            </p>

            <div class="chart" id="column-chart"></div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">Bar Charts</h4>
            <p class="text-muted font-14 text-overflow m-b-15">
                Google bar charts are rendered in the browser using SVG or VML, whichever is appropriate for the user's browser.
            </p>

            <div class="chart" id="bar-chart"></div>
        </div>
    </div>
</div>
end row 


<div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">Stacked column charts</h4>
            <p class="text-muted font-14 text-overflow m-b-15">
                A stacked column chart is a column chart that places related values atop one another. If there are any negative values, they are stacked in reverse order below the chart's baseline.
            </p>

            <div class="chart" id="column-stacked-chart"></div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">Stacked bar charts</h4>
            <p class="text-muted font-14 text-overflow m-b-15">
                A stacked bar chart is a bar chart that places related values atop one another. If there are any negative values, they are stacked in reverse order below the chart's axis baseline.
            </p>

            <div class="chart" id="bar-stacked-chart"></div>
        </div>
    </div>
</div>
end row 



<div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">Pie Chart</h4>
            <p class="text-muted font-14 text-overflow m-b-15">
                A pie chart that is rendered within the browser using SVG or VML. Displays tooltips when hovering over slices.
            </p>

            <div class="google-chart text-center">
                <div class="chart" id="pie-chart"></div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title m-t-0">Donut Chart</h4>
            <p class="text-muted font-14 text-overflow m-b-15">
                A <i>donut</i> chart is a pie chart with a hole in the center.  You
                can create donut charts with the <code>pieHole</code> option:
            </p>

            <div class="google-chart text-center">
                <div class="chart" id="donut-chart2"></div>
            </div>
        </div>
    </div>
</div>
end row 




<!-- end row -->

