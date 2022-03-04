<?php include("template/header.php"); ?>

<?php
include ("administrador/config/db.php");
$statementSQL=$conection->prepare("SELECT *FROM services");
$statementSQL->execute();
$serviceList=$statementSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($serviceList as $service) {?>
    <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="./img/<?php echo $service['image'] ?>" alt="">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $service['service'] ?></h4>
                    <a name="" id="" class="btn btn-primary" href="https://www.linkedin.com/in/federicoluisperez/" role="button">See more</a>
                </div>
            </div>
    </div>
<?php } ?>

    <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" height="180" overflow="hidden" src="./img/desarrollo web.jpg">
                    <div class="card-body">
                        <h4 class="card-title">WEB DEVELOPMENT</h4>
                        <a name="" id="" class="btn btn-primary" href="#" role="button">See more</a>
                    </div>
                </div>
    </div>

    <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" height="180" overflow="hidden" src="./img/estructura-web-seo.jpg">
                <div class="card-body">
                    <h4 class="card-title">SEO POSITIONING</h4>
                    <a name="" id="" class="btn btn-primary" href="#" role="button">See more</a>
                </div>
            </div>
    </div>

    <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" height="180" overflow="hidden" src="./img/marketing.jfif" alt="">
                <div class="card-body">
                    <h4 class="card-title">MARKETING</h4>
                    <a name="" id="" class="btn btn-primary" href="#" role="button">See more</a>
                </div>
            </div>
    </div>

    <div class="col-md-3">
            <div class="card" >
                <img class="card-img-top" height="180" overflow="hidden" src="./img/ideas-disenar-procesos-nuevos-productos.avif" alt="">
                <div class="card-body">
                    <h4 class="card-title">PRODUCT DESIGN</h4>
                    <a name="" id="" class="btn btn-primary" href="#" role="button">See more</a>
                </div>
            </div>
    </div>
    
    <div class="card mb-3 mt-3">
  <h3 class="card-header">Card header</h3>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <h6 class="card-subtitle text-muted">Support card subtitle</h6>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
    <rect width="100%" height="100%" fill="#868e96"></rect>
    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
  </svg>
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>  
</div>

        

<?php include("template/footer.php"); ?>