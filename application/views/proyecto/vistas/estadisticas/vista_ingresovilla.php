

<div class="row">
    <div class="menumapa">







        <div class="lupacerrar">               

            <img id="btnlupa" src=../assets/images/fondos/lupa.png width=40 height=40></img>
        </div>


        <div class="lupa">
            <h3>Menu de busqueda</h3>
            <div class="card-box">


                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-md-6">

                            <form class="form-horizontal" role="form">
                                <div class="form-group">

                                    <div class="col-md-10">
                                        <button onclick="getPolygonCoords()">coordenadas</button>
                                        <textarea id="infopoligono">  
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea id="infocirculo">  
                                    </textarea>
                                </div>



                            </form>
                        </div>
                    </div>



                </div>
            </div>  

            <div class="row">
                <div class="col-md-10">
                    <div class="card-box">

                        <h4 class="header-title m-t-0">Checkbox</h4>

                        <p class="text-muted font-14 m-b-30">

                        </p>

                        <div class="checkbox checkbox-custom m-t-0">
                            <label>
                                <input type="checkbox" value="" checked>
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                Villas - Mapa
                            </label>
                        </div>
                        <div class="checkbox checkbox-custom m-t-0">
                            <label>
                                <input type="checkbox" value="" checked>
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                Plan Cuadrante - Mapa
                            </label>
                        </div>
                          <div class="checkbox checkbox-custom m-t-0">
                            <label>
                                <input type="checkbox" value="" checked>
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                Infracciones - Mapa
                            </label>
                        </div>

                        <div class="form-group">

                            <div class="col-md-10">
                                <button onclick="getPolygonCoords()">coordenadas</button>
                                <textarea id="infopoligono">  
                                </textarea>
                            </div>
                        </div>

                    </div>
                </div><!-- end col -->


            </div>



        </div>

    </div>

    <div class="map2" id="map">

    </div>    


    <a href="https://waze.com/ul?ll=-33.4684655,-70.7549331&navigate=yes" target="_blank">MAPA1</a>
    <script type="text/javascript">
        start_map();
    </script>

<!--<iframe src="https://embed.waze.com/iframe?zoom=16&lat=-33.468466&lon=-70.754933&ct=livemap" width="600" height="450" allowfullscreen></iframe>-->

