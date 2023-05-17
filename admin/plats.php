<?php
require('./assets/co_bdd.php');

require('./functions.php');

$categories = getCategories($bdd);
$plats = getPlats($bdd); 
require('./assets/header.php'); 
?>


        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">


                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Ajouter un plats
                        </button>
 
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nouveaux plat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./assets/platBack.php?action=add" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Titre</label>
                                                <input type="text" name="titre" class="form-control" id="exampleFormControlInput1" placeholder="Titre du plat">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="">Description</label>
                                              <textarea  class="form-control"  name="description" id="" cols="30" rows="10"></textarea>
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleFormControlInput1">Prix</label>
                                                <input type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Prix du plat">
                                            </div>
                                            <select name="id_categorie" id="">
                                                <?php foreach ($categories as $key) { ?>
                                                 <option value="<?= htmlspecialchars($key['id']) ?>"><?= htmlspecialchars($key['categorie']) ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="form-group">

                                                <input type="submit">
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
                <div class="row justify-content-center pt-5">
                    <div class="col-12">
                        <h1>Notre galerie</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Description</th>
                                     <th scope="col">Prix</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($plats as $plat) { ?>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><?= htmlspecialchars($plat['titre']); ?></td>
                                        <td><?= htmlspecialchars($plat['description']); ?></td>
                                        <td><?= htmlspecialchars($plat['prix']); ?></td>
                                        <td>
                                            <a href="./assets/deletePlat.php?id=<?= htmlspecialchars($plat['id']) ?>" type="button" class="btn btn-outline-danger my-2">Supprimer</a>

                                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="[data-bg='<?= htmlspecialchars($plat['id']) ?>']">
                                                Modifier
                                            </button>
                                        </td>
                                    </tr>





                                    <div class="modal fade" id="exampleModal" data-bg='<?= htmlspecialchars($plat['id']) ?>' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
        $unPlat = getPlat($bdd,$plat['id']); 
        
        ?>
        <form action="./assets/platBack.php?action=modif" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $unPlat['id'] ?>">
                    <div class="form-group">

                    <label for="exampleFormControlInput1">Titre</label>
                    <input type="text" name="titre" class="form-control" id="exampleFormControlInput1" value="<?= $unPlat['titre'] ?>" placeholder="Titre de l'image">
                </div>
                <div class="form-group">


                    <label for="exampleFormControlInput1">Description</label>
                    <textarea name="description" id="" cols="30" class="form-control" rows="10"><?= htmlspecialchars($unPlat['description']) ?></textarea>
             
                </div>
                 <div class="form-group">

                    <label for="exampleFormControlInput1">Prix (€)</label>
                    <input type="text" name="price" class="form-control" id="exampleFormControlInput1" value="<?= $unPlat['prix'] ?>" value="<?= htmlspecialchars($unPlat['prix']) ?>">
                </div>

                 <select name="id_categorie" id="">
                                                <?php foreach ($categories as $key) { ?>
                                                 <option value="<?= htmlspecialchars($key['id']) ?>"><?= htmlspecialchars($key['categorie']) ?></option>
                                                <?php } ?>
                                            </select>

                                           
            <div class="form-group">

                <input type="submit">
            </div>         
        </form>
      </div>
      
    </div>
  </div>
</div>
                                   
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- .container-fluid -->


        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/d3.min.js"></script>
    <script src="js/topojson.min.js"></script>
    <script src="js/datamaps.all.min.js"></script>
    <script src="js/datamaps-zoomto.js"></script>
    <script src="js/datamaps.custom.js"></script>
    <script src="js/Chart.min.js"></script>
    <script>
        /* defind global options */
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="js/gauge.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/apexcharts.min.js"></script>
    <script src="js/apexcharts.custom.js"></script>
    <script src='js/jquery.mask.min.js'></script>
    <script src='js/select2.min.js'></script>
    <script src='js/jquery.steps.min.js'></script>
    <script src='js/jquery.validate.min.js'></script>
    <script src='js/jquery.timepicker.js'></script>
    <script src='js/dropzone.min.js'></script>
    <script src='js/uppy.min.js'></script>
    <script src='js/quill.min.js'></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        $('.time-input').timepicker({
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
        cb(start, end);
        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0,00", {
            reverse: true
        });
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            },
            placeholder: "___.___.___.___"
        });
        // editor
        var editor = document.getElementById('editor');
        if (editor) {
            var toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [{
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [{
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction
                [{
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [{
                    'align': []
                }],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        var uptarg = document.getElementById('drag-drop-area');
        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
        }
    </script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>