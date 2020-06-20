<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Product</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('js/app.js')); ?>"> 
    </head>
    <body>
        <table border="5">    
            <div class="name container">
                <h2> Product </h2>
                <b> New Product </b>
                <?php echo e(csrf_field()); ?>

            <div class="form-group" >
                 <lable for="nama"> Title Product : </lable>
                 <input type="text" class="form-control" id="" placeholder="Enter Product" name="nama_toko">
            </div>
            <div class="form-group" >
                <lable for=" "> Brands : </lable>
                <select id="cars" name="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                </select>
            </div>
            <div class="form-group" >
                <lable for=" "> Gender : </lable>
                <select id="cars" name="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                </select>
            </div>
            <div class="form-group" >
                <lable for=" "> Category : </lable>
                <select id="cars" name="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                </select>
            </div>
            <textarea name="message" rows="10" cols="30" placeholder="Enter Description"></textarea>
            <input type="submit" class="btn btn-primary">
            </div>
        </table>
    </body>
</html><?php /**PATH E:\Laravel\category\resources\views/category.blade.php ENDPATH**/ ?>