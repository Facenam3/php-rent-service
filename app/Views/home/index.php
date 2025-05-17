<div>
    <div class="hero flex items-center justify-center  text-white">
        <div class="p-3">
            <h1 class="text-3xl ">Welcome to Rent Services</h1>
            <h2 class="text-center">Cars</h2>
            <?php foreach($cars as $car) :?>
                <div class="text-center">
                        <h3> 
                            <a href="/cars/<?= $car->id ?>"> <?= htmlspecialchars($car->brand) ?></a>
                            
                        </h3>
                        <p>
                            <?= htmlspecialchars($car->model) ?>
                        </p>
                        <p>
                            <?= htmlspecialchars($car->type) ?>
                        </p>
                        <p>
                            <?= htmlspecialchars($car->registration_no) ?>
                        </p>
                        <p>
                            <?= htmlspecialchars($car->year) ?>
                        </p>
                </div>                
            <?php endforeach; ?>
        </div>
    </div>
</div>


