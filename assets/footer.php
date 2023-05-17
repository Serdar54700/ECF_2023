<?php
$horraire = getHorraire($bdd);
?>
<div class="container-fluid bg-img text-secondary" style="margin-top: 90px">
    <div class="container">
        <div class="row gx-5">

            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <h4 class="text-primary text-uppercase mb-4">Nous trouvez</h4>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">adresse du resto</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">info@quaiantique.com</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">+012 345 67890</p>
                        </div>
                       
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-primary text-uppercase mb-4">Nos liens</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="./index.php"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="./menu.php"><i class="bi bi-arrow-right text-primary me-2"></i>Notre carte</a>
                          
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-primary text-uppercase mb-4">Nos horaires</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <?php foreach ($horraire as $h) { ?>
                            <a class="text-secondary mb-2" href="./index.php"><i class="bi bi-arrow-right text-primary me-2"></i><?= htmlspecialchars($h['jours']) ?> : <?php if($h['matinOuverture'] == NULL){
                                   echo "Fermer"; 
                            }else{
                                   echo $h['matinOuverture'].' - ' . $h['matinFermeture'] ; 
                            } ?> / <?php if ($h['apremOuverture'] == NULL) {
                                         echo "Fermer";
                                     } else {
                                         echo $h['apremOuverture'] . ' - ' . $h['apremFermeture'];
                                     } ?>
                            
                        
                        </a>  
                            <?php } ?>
                            
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>