<?php include 'header.php' ?>

<!-- Inicio do conteudo -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Painel de Controle</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard > Cadastro Produtos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- INIT CODE -->

        <div class="content mt-3">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="receberProduto.php">

                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-4">
                                        <label class="control-label">Imagem</label>
                                        <input class="form-control" type="file" name="imagem-cad">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <label class="control-label">Nome</label>
                                        <input class="form-control" type="text" name="nome-cad">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <label class="control-label">Descrição</label>
                                        <input class="form-control" type="text" name="descricao-cad">
                                    </div>    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div  class="form-group espaco-topo">
                                    <div class="col-xs-12 col-sm-4">
                                        <label class="control-label">Preço</label>
                                        <input class="form-control" type="text" name="preco-cad" >
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <label class="control-label">Quantidade</label>
                                        <input class="form-control" type="text" name="quantidade-cad" >
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <label class="control-label">Data</label>
                                        <input class="form-control" type="text" name="data-cad" value="<?php echo date("Y-m-d"); ?>">
                                    </div> 
                                </div>
                            </div>    
                        </div>
                        <div class="centralizar-divs">
                            <div class="row espaco-topo">
                                <div  class="form-group  centralizar-divs">
                                    <div class="col-xs-12 col-sm-12">
                                        <input type="submit" value="Cadastrar" class="btn btn-primary">
                                    </div>    
                                    
                                </div>
                            </div>    
                        </div>
					</form>
                </div>
            </div>
        </div>

        <!-- THE END CODE -->

    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/popper.min.js"></script>

    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

</body>
</html>